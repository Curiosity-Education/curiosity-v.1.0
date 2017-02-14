<?php

class parentSuscriptionController extends BaseController{

    public static function get(){
        $idDad = Auth::user()->Person->Dad->id;
        $tokenCard = Membership::where("padre_id", "=", $idDad)->select("token_card")->first()["token_card"];
        Conekta::setApiKey("key_ed4TzU6bqnX9TvdqqTod4Q");
        $customer = Conekta_Customer::find($tokenCard);
        $subscription = $customer->subscription;
        return $subscription;
    }

    public static function status(){
        try{
            return self::SUCCESS_RESPONSE("Current_suscription_status",self::get()->status);
        }
        catch(Conekta_Error $con_err){
            return self::ERROR_CONEKTA_RESPONSE($con_err);
        }
        catch(Exception $e){
            return self::SERVER_ERROR_RESPONSE($e);
        }

    }

    public static function pause(){
        try{
            self::get()->pause();
            return self::SUCCESS_RESPONSE("Suscripción pausada con éxito.",null);
        }
        catch(Conekta_Error $con_err){
            return self::ERROR_CONEKTA_RESPONSE($con_err);
        }
        catch(Exception $e){
            return self::SERVER_ERROR_RESPONSE($e);
        }

    }
    public static function resume(){
        try{
            self::get()->resume();
            return self::SUCCESS_RESPONSE("Suscripción reanudada con éxito.",self::get());
        }
        catch(Conekta_Error $con_err){
            return self::ERROR_CONEKTA_RESPONSE($con_err);
        }
        catch(Exception $e){
            return self::SERVER_ERROR_RESPONSE($e);
        }

    }
    public static function cancel(){
        try{
            self::get()->cancel();
            return self::SUCCESS_RESPONSE("Suscripción cancelada con éxito.",null);
        }
        catch(Conekta_Error $con_err){
            return self::ERROR_CONEKTA_RESPONSE($con_err);
        }
        catch(Exception $e){
            return self::SERVER_ERROR_RESPONSE($e);
        }
    }
    public static function SUCCESS_RESPONSE($message,$dataset){
        return Response::json(array('statusMessage'  =>  "Success",'status' => 200,'message' => $message,'data' => $dataset));
    }
    public static function ERROR_CONEKTA_RESPONSE($error){
        return Response::json(array('statusMessage'  =>  "Conekta Error",'status' => 500,'message' => $error));
    }
    public static function SERVER_ERROR_RESPONSE($error){
        return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $error));
    }
}
