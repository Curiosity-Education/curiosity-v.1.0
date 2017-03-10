<?php
use Carbon\Carbon;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
class CronRunCommand extends Command {
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cron:run';
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run the scheduler';
	/**
	 * Current timestamp when command is called.
	 *
	 * @var integer
	 */
	protected $timestamp;
	/**
	 * Hold messages that get logged
	 *
	 * @var array
	 */
	protected $messages = array();
	/**
	 * Specify the time of day that daily tasks get run
	 *
	 * @var string [HH:MM]
	 */
	protected $runAt = '03:00';
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->timestamp = time();
	}
	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        /*
        * Obtengo la fecha actual
        */
        $current = Carbon::now()->toDateTimeString();
        $datesPayments = Membership
                            ::join('padres','membresias.padre_id','=','padres.id')
                                ->join('personas','personas.id','=','padres.persona_id')
                                ->join('membresias_planes','membresias.id','=','membresias_planes.membresia_id')
                                ->join('planes','planes.id','=','membresias_planes.plan_id')
                                    ->where('membresias.active',1)
                                        ->get();
        foreach($datesPayments as $datePayment){
            $daysBefore = Carbon::createFromFormat('Y-m-d H:i:s', $datePayment->fecha_corte, 'America/Monterrey')->subDays(3);
            if($current->diffInDays($daysBefore) === 0 && $datePayment->payment_option === 'oxxo'){
                \Conekta\Conekta::setApiKey(Payment::KEY()->_private()->conekta->production);
                  $order = \Conekta\Order::create(
                    array(
                      "line_items" => array(
                        array(
                          "name"       => 'Curiosity '.$datesPayments->name,
                          "unit_price" => (integer)$datesPayments->amount. '00',
                          "quantity"   => 1
                        )//first line_item
                      ), //line_items
                      "currency"      => "MXN",
                      "customer_info" => array(
                        "name" =>  $datesPayments->nombre.' '.$datesPayments->apellidos,
                        "email" => $datesPayments->email,
                        "phone" => $datesPayments->telefono
                      ), //customer_info
                      "shipping_contact" => array(
                        "phone"     => $datesPayments->telefono,
                        "receiver"  => $datesPayments->nombre.' '.$datesPayments->apellidos,
                        "address"   => array(
                          "street1" => "Calle 123 int 2 Col. Chida",
                          "city"    => "Cuahutemoc",
                          "state"   => "Ciudad de Mexico",
                          "country" => "MX",
                          "postal_code" => "06100",
                          "residential" => true
                        )//address
                      ), //shipping_contact
                      "charges" => array(
                        array(
                          "payment_method" => array(
                            "type" => "oxxo_cash"
                          )//payment_method
                        ) //first charge
                      ) //charges
                    )//order
                  );
                $dataSend = (object)[
                    "name"     =>       "Equipo Curiosity",
                    "client"   =>       $datePayment->nombre.' '.$datePayment->apellidos,
                    "email"    =>       $datePayment->email,
                    "subject"  =>       "¡Curiosity Eduación!",
                    "msg"      =>       "No dejes de vivir la experiencia Curiosity, tienes seleccionado el método de pago por oxxo, para seguir disfrutando del contenido Curiosity, por favor dirigete a pagar la cantidad de $ {$datePayment->amount} MXN dando este numero de referencia <center><h2> {$order->$order->charges[0]->payment_method->reference} </h2></center>"
                ];
                $this->sendEmail($dataSend);
            }
        }

	}
    protected function sendEmail(object $dataSend){
        $toEmail=$dataSend->email;
        $toName=$dataSend->email;
        $subject =$dataSend->subject;
        try {
            Mail::send('emails.referencia_oxxo_pay',$dataSend,function($message) use($toEmail,$toName,$subject){
                $message->to($toEmail,$toName)->subject($subject);
            });
            $sentEmail = 1;
            Membership::where();
        } catch (Exception $e) {
            $executionTime = round(((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000), 3);
            Log::info('SendMail-CronJob: failed time: ' . $executionTime . ' | ' . implode(', ',  $e->getMessage()));
        }
    }
	protected function finish()
	{
		// Write execution time and messages to the log
		$executionTime = round(((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000), 3);
		Log::info('Cron: execution time: ' . $executionTime . ' | ' . implode(', ', $this->messages));
	}
	/**
	 * AVAILABLE SCHEDULES
	 */
	protected function everyFiveMinutes(callable $callback)
	{
		if((int) date('i', $this->timestamp) % 5 === 0) call_user_func($callback);
	}
	protected function everyTenMinutes(callable $callback)
	{
		if((int) date('i', $this->timestamp) % 10 === 0) call_user_func($callback);
	}
	protected function everyFifteenMinutes(callable $callback)
	{
		if((int) date('i', $this->timestamp) % 15 === 0) call_user_func($callback);
	}
	protected function everyThirtyMinutes(callable $callback)
	{
		if((int) date('i', $this->timestamp) % 30 === 0) call_user_func($callback);
	}
	/**
	 * Called every full hour
	 */
	protected function hourly(callable $callback)
	{
		if(date('i', $this->timestamp) === '00') call_user_func($callback);
	}
	/**
	 * Called every hour at the minute specified
	 *
	 * @param  integer $minute
	 */
	protected function hourlyAt($minute, callable $callback)
	{
		if((int) date('i', $this->timestamp) === $minute) call_user_func($callback);
	}
	/**
	 * Called every day
	 */
	protected function daily(callable $callback)
	{
		if(date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	/**
	 * Called every day at the 24h-format time specified
	 *
	 * @param  string $time [HH:MM]
	 */
	protected function dailyAt($time, callable $callback)
	{
		if(date('H:i', $this->timestamp) === $time) call_user_func($callback);
	}
	/**
	 * Called every day at 12:00am and 12:00pm
	 */
	protected function twiceDaily(callable $callback)
	{
		if(date('h:i', $this->timestamp) === '12:00') call_user_func($callback);
	}
	/**
	 * Called every weekday
	 */
	protected function weekdays(callable $callback)
	{
		$days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
		if(in_array(date('D', $this->timestamp), $days) && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	protected function mondays(callable $callback)
	{
		if(date('D', $this->timestamp) === 'Mon' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	protected function tuesdays(callable $callback)
	{
		if(date('D', $this->timestamp) === 'Tue' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	protected function wednesdays(callable $callback)
	{
		if(date('D', $this->timestamp) === 'Wed' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	protected function thursdays(callable $callback)
	{
		if(date('D', $this->timestamp) === 'Thu' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	protected function fridays(callable $callback)
	{
		if(date('D', $this->timestamp) === 'Fri' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	protected function saturdays(callable $callback)
	{
		if(date('D', $this->timestamp) === 'Sat' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	protected function sundays(callable $callback)
	{
		if(date('D', $this->timestamp) === 'Sun' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	/**
	 * Called once every week (basically the same as using sundays() above...)
	 */
	protected function weekly(callable $callback)
	{
		if(date('D', $this->timestamp) === 'Sun' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	/**
	 * Called once every week at the specified day and time
	 *
	 * @param  string $day  [Three letter format (Mon, Tue, ...)]
	 * @param  string $time [HH:MM]
	 */
	protected function weeklyOn($day, $time, callable $callback)
	{
		if(date('D', $this->timestamp) === $day && date('H:i', $this->timestamp) === $time) call_user_func($callback);
	}
	/**
	 * Called each month on the 1st
	 */
	protected function monthly(callable $callback)
	{
		if(date('d', $this->timestamp) === '01' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
	/**
	 * Called each year on the 1st of January
	 */
	protected function yearly(callable $callback)
	{
		if(date('m', $this->timestamp) === '01' && date('d', $this->timestamp) === '01' && date('H:i', $this->timestamp) === $this->runAt) call_user_func($callback);
	}
}
