<?php
class sponsoredController extends BaseController{

    function getChildren(){
        $data = Input::all();
        $children = Children::where("institucion_id", "=", $data)->where('active', '=', 1)->get();
        $folder = DB::table('instituciones')->where('id', '=', $data)->first();
        return ["children" => $children, "folder" => Curiosity::clean_string($folder->nombre)];
    }

    function hide_show_home(){
        try {
            $data = Input::all();
            $home = Institute::where("id", "=", $data["id"])->first();
            if ($home->visible === 1){ $home->visible = 0; }
            else if ($home->visible === 0){ $home->visible = 1; }
            $home->save();
            return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $home));
        } catch (Exception $e) {
            return Response::json(array("status" => 0, 'statusMessage' => "Error", "data" => $e));
        }
    }

    function save(){
        $data = Input::all();
        $file = $data['agf_photo'];
        $rules = array(
            'nombre'            => 'required',
            'apellidos'         => 'required',
            'sexo'              => 'required',
            'institucion_id'    => 'required',
            'apadrinado'        => 'required'
		);
        $msjs = Curiosity::getValidationMessages();
        $validation = Validator::make($data, $rules, $msjs);
        if( $validation->fails()){
            return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
        else {
            $inst = DB::table('instituciones')->where('id', '=', $data["institucion_id"])->first();
            $destinationPath = public_path()."/packages/assets/media/images/padrino_curiosity/".Curiosity::clean_string($inst->nombre)."/";
            $imgName = Curiosity::clean_string($data["nombre"]." ".$data["apellidos"]).".".$file->getClientOriginalExtension();
            $file->move($destinationPath, $imgName);
            $child = new Children($data);
			$child->foto = $imgName;
            $child->save();
            $folder = DB::table('instituciones')->where('id', '=', $child->institucion_id)->first();
			return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => [
                "child"     =>$child,
                "folder"    =>Curiosity::clean_string($folder->nombre)
            ]));
        }
    }

    function update(){
        $data = Input::all();
        $file = $data['agf_photo'];
        $rules = array(
            'nombre'            => 'required',
            'apellidos'         => 'required',
            'sexo'              => 'required',
            'institucion_id'    => 'required',
            'apadrinado'        => 'required'
		);
        $msjs = Curiosity::getValidationMessages();
        $validation = Validator::make($data, $rules, $msjs);
        if( $validation->fails()){
            return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
        else {
            $child = Children::where("id", "=", $data["id"])->first();
            if ($file != null){
                $inst = DB::table('instituciones')->where('id', '=', $data["institucion_id"])->first();
                $destinationPath = public_path()."/packages/assets/media/images/padrino_curiosity/".Curiosity::clean_string($inst->nombre)."/";
                unlink($destinationPath.$child->foto);
                $imgName = Curiosity::clean_string($data["nombre"]." ".$data["apellidos"]).".".$file->getClientOriginalExtension();
                $file->move($destinationPath, $imgName);
                $child->foto = $imgName;
            }
            $child->nombre = $data["nombre"];
            $child->apellidos = $data["apellidos"];
            $child->sexo = $data["sexo"];
            $child->apadrinado = $data["apadrinado"];
            $child->save();
            $folder = DB::table('instituciones')->where('id', '=', $child->institucion_id)->first();
			return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => [
                "child"     => $child,
                "folder"    => Curiosity::clean_string($folder->nombre)
            ]));
        }
    }

    function delete(){
        $data = Input::all();
        $child =  Children::where("id", "=", $data["id"])->first();
        $child->active = 0;
        $child->save();
        return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => ["child" => $child]));
    }

    function paySponsored(){
        $rules = array(
			'nombre' => 'required',
            'email' => 'required|email'
		);
        $validator = Validator::make(Input::all(), $rules, Curiosity::getValidationMessages());
        if($validator->fails()){
            return Response::json(array(
                "status" => "CU-104",
                'statusMessage' => "Validation Error",
                "data" => $validator->messages()
            ));
        }
        else{
            \Conekta\Conekta::setApiKey(Payment::KEY()->_private()->conekta->production);
            \Conekta\Conekta::setLocale('es');
            try{
                /*$customer = \Conekta\Customer::create(array(
                    "name" => Input::get('nombre'),
                    "email" => Input::get('email'),
                    'payment_sources' => array(array(
                        'token_id' => Input::get('conektaTokenId'),
                        'type' => "card"
                    ))
                ));
                // $plan = Plan::where("reference", "=", "prueba_padrino_cu")->first();
                // if(!$plan){
                //     return Response::json(array(
                //         'status' => 404,
                //         'statusMessage' => 'El plan no fue encontrado'
                //     ));
                // }
                // $subscription = $customer->createSubscription(array(
                //   "plan_id" => $plan->reference
                // ));
                $amountChargue = 15;
                $payChargue = \Conekta\Order::create(array(
                    'currency' => 'MXN',
                    'customer_info' => array(
                        'customer_id' => $customer->id
                    ),
                    'line_items' => array(
                        array(
                            'name' => 'Padrino Curiosity',
                            'unit_price' => $amountChargue * 100,
                            'quantity' => 1
                        )
                    ),
                    'charges' => array(
                        array(
                            'payment_method' => array(
                                'type' => 'default'
                            )
                        )
                    )
                ));*/
                // if ($subscription->status == 'active' || $subscription->status == 'in_trial') {
                    // la suscripción inicializó exitosamente!
                    try {
                        // Cambiamos el estatus del niño que fue apadrinado
                        $childSpon = Children::where('id', '=', Input::get('child'))->first();
                        $childSpon->apadrinado = 1;
                        $childSpon->save();
                    } catch (Exception $e) {
                        $executionTime = round(((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000), 3);
                        Log::info('Falló al cambiar de estado al niño al momento de apadrinar: ' . $executionTime . ' | ' .  $e->getMessage());
                    }
                    try {
                        // Uncomment for production
                        $childSpon = Children::where('id', '=', Input::get('child'))->first();
                        $home = Institute::where('id', '=', $childSpon->institucion_id)->first();
                        $dataSend = [
                            "name" => "Equipo Curiosity",
                            "client" => Input::get('nombre'),
                            "email" => Input::get('email'),
                            "subject" => "Padrino Curiosity",
                            "child" => $childSpon->nombre.' '.$childSpon->apellidos,
                            "child_image" => '/packages/assets/media/images/padrino_curiosity/'.Curiosity::clean_string($home->nombre).'/'.$childSpon->foto,
                            "home" => $home->nombre,
                            "home_image" => "/packages/assets/media/images/institutions/".$home->logo
                        ];
                        $toEmail = $dataSend["email"];
                        $toName  = $dataSend["email"];
                        $subject = $dataSend["subject"];
                        Mail::send('emails.padrinoCuriosity', $dataSend, function($message) use($toEmail, $toName, $subject){
                            $message->to($toEmail, $toName)->subject($subject);
                            // ->cc('willy.ramirez@curiosity.com.mx');
                        });
                        $sentEmail = 1;
                    } catch (Exception $e) {
                        $executionTime = round(((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000), 3);
                        Log::info('Falló al enviar el email al padrino, una vez que pago: ' . $executionTime . ' | ' .  $e->getMessage());
                    }
                    return Response::json(array(
                        'status' => 200,
                        'statusMessage' => 'success'
                        // 'data' => $payChargue
                    ));
                // }
                // else{
                //     if ($subscription->status == 'past_due') {
                //         // la suscripción falló al inicializarse
                //         return Response::json(array(
                //             'status'=>105,
                //             'statusMessage'=>'PAST_DUE',
                //             'data' => $subscription,
                //             'message'=>'A ocurrido un error al momento de hacer el cobro de la suscripción. No se ha podido hacer el pago.'
                //         ));
                //     }
                // }
            }catch (\Conekta\Error $e){
              return Response::json(["message"=>$e->message_to_purchaser]);
             //el cliente no pudo ser creado
            }
            catch(\Conekta\ErrorList $errorList){
                $error = array();
                foreach($errorList->details as &$errorDetail) {
                    array_push($error, $errorDetail->getMessage());
                }
                return Response::json(array(
                    'status' => 'CUE-00101',
                    'statusMessage' => 'Error en el pago',
                    'data' => $error
                ));
            }
        }
    }

}
