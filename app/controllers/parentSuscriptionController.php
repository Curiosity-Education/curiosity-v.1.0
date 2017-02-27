<?php

class parentSuscriptionController extends BaseController{

    public static function get(){
        $idDad = Auth::user()->Person->Dad->id;
        $tokenCard = Membership::where("padre_id", "=", $idDad)->select("token_card")->first()["token_card"];
        Conekta::setApiKey(Payment::KEY()->_private()->conekta->production);
        $customer = Conekta_Customer::find($tokenCard);
        $subscription = $customer->subscription;
        return $subscription;
    }

    public static function getObj(){
        $idDad = Auth::user()->Person->Dad->id;
        $tokenCard = Membership::where("padre_id", "=", $idDad)->select("token_card")->first()["token_card"];
        Conekta::setApiKey(Payment::KEY()->_private()->conekta->production);
        $customer = Conekta_Customer::find($tokenCard);
        $subscription = $customer->subscription;
        $data = "$subscription";
        return json_decode($data);
    }

    private static function enabledMembership($active){
        $idDad = Auth::user()->Person->Dad->id;
        Membership::where("padre_id", "=", $idDad)->update(array('active' => $active));
    }

    public static function status(){
        try{
            return self::SUCCESS_RESPONSE("Current_suscription_status",self::getObj()->status);
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
            self::enabledMembership(3);
            membershipsPlansController::activeMembershipToChildren(self::getObj()->customer_id, 0);
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
            self::enabledMembership(1);
            membershipsPlansController::activeMembershipToChildren(self::getObj()->customer_id, 1);
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
            self::enabledMembership(0);
            return self::SUCCESS_RESPONSE("Suscripción cancelada con éxito.",null);
        }
        catch(Conekta_Error $con_err){
            return self::ERROR_CONEKTA_RESPONSE($con_err);
        }
        catch(Exception $e){
            return self::SERVER_ERROR_RESPONSE($e);
        }
    }
    public static function getUserSuscriptionPlan(){
        try{
            $currentPlan = Membership
                            ::where('membresias.padre_id','=',Auth::user()->Person->Dad->id)
                                ->join('membresias_planes','membresia_id','=','membresias.id')
                                ->join('planes','planes.id','=','plan_id')
                                ->select('planes.*')
                                ->get();
            $plans = Plan
                    ::where('visible','=', 1)
                        ->where('id','!=',$currentPlan[0]->id)
                        ->where('active', "=", 1)
                        ->get();
            $dataset = [
                'current_plan' => $currentPlan,
                'plans' => $plans
            ];
            return $dataset;
        }
        catch(Exception $e){
            return self::SERVER_ERROR_RESPONSE($e->getMessage());
        }
        catch(MySqlException $e){
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

    public static function infoClient(){
        $idDad = Auth::user()->Person->Dad->id;
        $tokenCard = Membership::where("padre_id", "=", $idDad)->select("token_card")->first()["token_card"];
        Conekta::setApiKey(Payment::KEY()->_private()->conekta->production);
        $customer = Conekta_Customer::find($tokenCard);
        $plans = self::getUserSuscriptionPlan();
        return [
           "client" => json_decode($customer),
           "plansObj" => $plans
        ];
    }

    public static function changePlan(){
        try{
             $data = Input::all();
             $idDad = Auth::user()->Person->Dad->id;
             $tokenCard = Membership::where("padre_id", "=", $idDad)->select("token_card")->first()["token_card"];
             Conekta::setApiKey(Payment::KEY()->_private()->conekta->production);
             $customer = Conekta_Customer::find($tokenCard);
             $subscription = $customer->subscription;
             $plan = $data["reference"];
             $customerUpd = $subscription->update( array( 'plan_id'  => $plan ) );
             $currentPlan = Membership::where('membresias.padre_id','=',Auth::user()->Person->Dad->id)
             ->join('membresias_planes','membresia_id','=','membresias.id')
             ->join('planes','planes.id','=','plan_id')
             ->select('planes.*')
             ->first();
             $myMembership = Membership::where("padre_id", "=", $idDad)->first();
             $myPlan = MembershipPlan::where("membresia_id", "=", $myMembership->id)->first();
             $plan = Plan::where("reference", "=", $data["reference"])->first();
             $myPlan->plan_id = $plan->id;
             $myPlan->save();
             return self::SUCCESS_RESPONSE("Plan cambiado con éxito.", json_decode($customerUpd));
        }
        catch(Conekta_Error $con_err){
             return self::ERROR_CONEKTA_RESPONSE($con_err);
        }
        catch(Exception $e){
             return self::SERVER_ERROR_RESPONSE($e);
        }
    }
}
