<?php
class parentsController extends BaseController{


  public function remoteEmail(){
    if(padre::where("email","=",Input::get("email"))->first())
      return "false";
    else return "true";
  }
  public function tourFirst(){
		return Response::json(["respuesta" => "true"]);
	}

  public function getDataPerfil(){
    if(Auth::User()){
      $data = Auth::User()->Person->Parent;
    }
    return null;
  }
  public function save(){
        $data = Input::all();
        $dateNow = date("Y-m-d");
        $date_min =strtotime("-18 year",strtotime($dateNow));
        $date_min=date("Y-m-d",$date_min);
        $today= date("Y-m-d");
        $rules = [
            "password"          =>"required|min:8|max:100",
            "nombre"            =>"required|letter|max:50",
            "apellidos"  =>"required|letter|max:50",
            "sexo"              =>"required|string|size:1",
            "email"             =>"required|email|unique:padres,email",
            "telefono"          =>"required"
        ];
        try {
         $validator = Validator::make($data,$rules,Curiosity::getValidationMessages());
        } catch (Exception $e) {
           return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $e));
        }
        if($validator->fails()){
            return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validator->messages()));
        }
        else {
                DB::transaction(function () {
                    try {
                        $user = new User($data);
                        $user->password=Hash::make($data["password"]);
                        $user->username = $data['email'];
                        $user->token=sha1($data['email']);
                        $user->save();
                        $myRole = DB::table('roles')->where('name', '=', 'parent')->pluck('id');
                        $user->attachRole($myRole);
                        $person = new Person($data);
                        $person->user_id=$user->id;
                        $person->save();
                        $dad = new Dad();
                        /*-------------------------------
                            Get LADA of country selected
                        --------------------------------*/
                        //$lada = LadaCountry::where("name","=",$data["pais"])->select("phone_code")->get()[0];
                        /*------------------------------*/
                        $dad->email = $data['email'];
                        $dad->persona_id = $person->id;
                        //if($lada){
                            $dad->telefono = $data['telefono'];
                        //}
                        $dad->save();
                    }
                    catch (PDOException $pdoException){
                        return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $pdoException->getMessage()));
                    }
                    catch (Exception $e){
                        return $e;
                        return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $e->getMessage()));
                    }

                }, 5);


            /* Uncomment for production */
            //  $dataSend = [
            //      "name"     =>       "Equipo Curiosity",
            //      "client"   =>       $persona->nombre." ".$persona->apellido_paterno." ".$persona->apellido_materno,
            //      "email"    =>       $padre->email,
            //      "subject"  =>       "¡Bienvenido a Curiosity Eduación!",
            //      "msg"      =>       "La petición de registro al sistema Curiosity que realizo ha sido realizada con exito, para confirmar y activar su cuenta siga el enlace que esta en la parte de abajo",
            //      "token"    =>       $user->token
            //  ];
            //  $toEmail=$padre->email;
            //  $toName=$dataSend["email"];
            //  $subject =$dataSend["subject"];
            //  try {
            //      Mail::send('emails.confirmar_registro',$dataSend,function($message) use($toEmail,$toName,$subject){
            //          $message->to($toEmail,$toName)->subject($subject);
            //      });
            //      return "OK";
            //  } catch (Exception $e) {
            //      $user->delete();
            //      // $direccion->delete();
            //      // $membresia->delete();
            //      $code = $e->getCode();
            //      return $code;
            //  }
            $dataset = [
                'username'  =>  $data['email'],
                'password'  =>  $data['password']
            ];
            return Response::json(array(
                'status'    =>  200,
                'statusMessage' =>  'success',
                'data'  => $dataset
            ));

        }

    }
    public function payment_suscription(){
        $padreRole = Auth::user()->roles[0]->name;
            /*
                Configuración con Conekta

            */
            Conekta::setApiKey("key_SGQHzgrE12weiDWjkJs1Ww");
            Conekta::setLocale('es');
            try{
                if($padreRole == "parent"){
                    $customer = Conekta_Customer::create(array(
                        "name" => Input::get('nombre'),
                        "email" => Auth::user()->Person()->first()->Parent()->first()->email,
                        "phone" => Auth::user()->Person()->first()->Parent()->first()->telefono,
                        "cards"=> array(Input::get('conektaTokenId'))
                    ));

                    $plan = Plan::find(Input::get('plan_id'));
                    $subscription = $customer->createSubscription(array(
                      "plan_id"=> $plan->reference
                    ));
                    if ($subscription->status == 'active') {
                            $membresia_plan = new MembershipPlan();
                            $membresia = new Membership(array(
                                "token_card" => $subscription->id,
                                "fecha_registro" => Date('Y-m-d'),
                                "active"    => 1,
                                "padre_id"  => Auth::user()->Person()->first()->Parent()->first()->id
                            ));
                            $membresia->save();
                         //la suscripción inicializó exitosamente!
                        return Response::json(array('status'=>200,'statusMessage'=>'success','data'=>$subscription));

                    }
                    elseif ($subscription->status == 'past_due') {
                     //la suscripción falló a inicializarse
                      return Response::json(array(0=>'error'));
                    }
                }
                else{
                    return Response::json(array('success',"Como es Padre demo no se realiza el cobro"));
                }
            }catch (Conekta_Error $e){
              echo $e->getMessage();
             //el cliente no pudo ser creado
            }
    }
    public function confirm($token){
        $user = User::where("token","=",$token)->first();
        if($user){
            $user->active=1;
            $user->save();
            return Redirect::to("/");
        }else{
          return Redirect::to("/");
        }
    }
    public function getSons(){
        $idDad = Auth::user()->Person()->first()->Parent()->first()->id;
        return DB::select("Select users.username, hijos.id,concat(personas.nombre,' ',personas.apellido_paterno) as 'nombre_completo', max(hijo_realiza_actividades.promedio) 'max_promedio' , actividades.nombre as 'actividad'
         from padres inner join hijos on hijos.padre_id = padres.id
        inner join hijo_realiza_actividades on hijos.id = hijo_realiza_actividades.hijo_id
        inner join actividades on hijo_realiza_actividades.actividad_id = actividades.id
        inner join personas on hijos.persona_id = personas.id
        inner join users on users.id = personas.user_id where padres.id = '2'");
    }
    public function sendMensaje(){
        try{
            $mensaje = new SonReminder();
             $message->hijo_recuerda=User::where('username','=',Input::get('hijo_recuerda'))->join('personas','personas.user_id','=','users.id')->join('hijos','hijos.persona_id','=','personas.id')->select('hijos.id')->get()[0]->id;
            $message->mensaje=Input::get('mensaje');
            $message->is_read = 0;
            $message->padre_avisa=Input::get('padre_avisa');
            $message->save();
            return Response::json(array("message"=>"El mensaje se envio al hijo","estado"=>"200"));
        }catch(Exception $e){return $e;}
    }

    public function getCountSons(){
      return Persona::join('padres', "personas.id", "=", "padres.persona_id")
      ->join("hijos", "padres.id", "=", "hijos.padre_id")
      ->where("user_id", "=", Auth::user()->id)
      ->count('hijos.padre_id');
    }

    public function followingUpSon(){
      $son = Parent::join('hijos', 'padres.id', '=', 'hijos.padre_id')
      ->join('personas', 'hijos.persona_id', '=', 'personas.id')
      ->where('padres.id', '=', Auth::user()->Person()->first()->Parent()->first()->id)
      ->select('hijos.id', 'personas.nombre', 'personas.apellido_paterno', 'personas.apellido_materno')
      ->get();
      $followingUps = [];
      foreach ($son as $key => $value) {
        $follActsSon = padre::join('hijos', 'padres.id', '=', 'hijos.padre_id')
        ->join('hijos_metas_diarias', 'hijos.id', '=' , 'hijos_metas_diarias.hijo_id')
        ->join('avances_metas', 'hijos_metas_diarias.id', '=', 'avances_metas.avance_id')
        ->where('hijos.id' ,'=', $value['id'])
        ->select('avances_metas.fecha', 'avances_metas.avance as cantidad')
        ->orderBy('avances_metas.fecha', 'desc')
        ->limit(7)
        ->get();
        $name = $value['nombre']." ".$value['apellido_paterno']." ".$value['apellido_materno'];
        array_push($followingUps, array('seguimiento' => $follActsSon, 'hijo' => $name, 'id' => $value['id']));
      }
      return $followingUps;
    }

    public function getScore(){
      return View::make('vista_papa_puntajes');
    }

    public function getAlertsNow(){
      return View::make('vista_papa_alertas');
    }
    public function getUsePlataform(){
        $now = date("Y-m-d");
        $idDad = Auth::user()->Person()->first()->Parent()->first()->id;
        return DB::select(
             "SELECT hijos.id, metas_diarias.meta, count(hijo_realiza_actividades.hijo_id) as 'total_jugados'
             FROM hijos
             inner join hijos_metas_diarias
             on hijos_metas_diarias.hijo_id = hijos.id
             inner join metas_diarias
             on metas_diarias.id = hijos_metas_diarias.meta_diaria_id
             inner join hijo_realiza_actividades on hijo_realiza_actividades.hijo_id = hijos.id
             inner join padres on  hijos.padre_id = padres.id
             where hijos.padre_id = $idDad and hijo_realiza_actividades.created_at
             between  '$now 00:00:00' and '$now 23:59:59'
             group by(hijo_realiza_actividades.hijo_id)"
        );
    }
}
?>
