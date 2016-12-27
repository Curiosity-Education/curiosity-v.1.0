<?php

class userSuscriptionController extends BaseController{

    public function save(){
        if(Request::method() == "GET")
            return View::make('vista_payment_card');
        else{
            $padreRole = Auth::user()->roles[0]->name;
            /*
            *
            *   Conekta Settings
            *
            */
            Conekta::setApiKey("key_SGQHzgrE12weiDWjkJs1Ww");
            Conekta::setLocale('es');
            try{
                if($padreRole == "demo_padre"){
                    $customer = Conekta_Customer::create(array(
                        "name" => Auth::user()->persona()->first()->nombre,
                        "email" => Auth::user()->persona()->first()->padre()->first()->email,
                        "phone" => Auth::user()->persona()->first()->padre()->first()->telefono,
                        "cards"=> array(Input::get('conektaTokenId'))
                    ));


                    $subscription = $customer->createSubscription(array(
                      "plan_id"=> "curiosity-basico"
                    ));
                    if ($subscription->status == 'active') {
                        // Started success the suscription
                        Session::put('sub_id',$subscription->id);
                        return Response::json(array('status'=>'200','statusMessage'=>'success',"message" => "Se ha realizado el cobro con exito"));

                    }
                    elseif ($subscription->status == 'past_due') {
                      // Fail suscription
                      return Response::json(array(0=>'error'));
                    }
                }
                else{
                    return Response::json(array('status'=>'CU-101','statusMessage'=>'father demo',"message" => "La cuenta demo no puede adquirir una versión premium"));
                }
            }catch (Conekta_Error $e){
                return Response::json(array('statusMessage'=>'Conekta ERROR',"message" => $e->getMessage()));
            }


        }
    }

    public function webhook_check_pay(){
        // Analizar la información del evento en forma de json
        $body = @file_get_contents('php://input');
        $event_json = json_decode($body);
        http_response_code(200); // Return 200 OK

        if ($event_json->type == 'subscription.paid'){
            if($event_json->object->status != "paid"){
                $membresia = membresia::where("token_card","=",$event_json->object->customer_id);
                $membresia->active = 0;
                $membresia->save();

            }
        }
    }
}
