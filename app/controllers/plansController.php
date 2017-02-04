<?php

class plansController extends BaseController{

	public function __construct(){

    }

    public function save(){
            if(Request::method() == 'POST'){
                    try{
                        Conekta::setApiKey("key_ed4TzU6bqnX9TvdqqTod4Q");
                        $plan = Conekta_Plan::create(array(
                          "id" => Input::get('reference'),
                          "name"=> Input::get('name'),
                          "amount"=> Input::get('amount').'00',
                          "currency"=> Input::get('currency'),
                          'trial_period_days' => Input::get('trial_period_days'),
                          "interval"=> Input::get('interval')
                        ));
                        $newPlan = new Plan(Input::all());
								$newPlan->visible = 0;
                        $newPlan->active = 1;
                        $newPlan->save();
                        return Response::json(array('statusMessage'  =>  "success",'status' => 200,'data'=>$newPlan));
                    }
                    catch(Exception $e){
                            return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $e));
                    }
            }
            else{

            }
    }

    public function update(){
            if(Request::method() == 'POST'){
                try{
                    Conekta::setApiKey("key_ed4TzU6bqnX9TvdqqTod4Q");
                    $plan = Conekta_Plan::find(Input::get('reference'));
                    $plan->update(array(
                      "name"=> Input::get('name'),
                      "amount"=> Input::get('amount').'00'
                    ));
                    $newPlan = Plan::find(Input::get('id'))->update(array(
                      "name"=> Input::get('name'),
                      "amount"=> Input::get('amount').'00'
                    ));
                    return Response::json(array('statusMessage'  =>  "success",'status' => 200,'data'=>$newPlan));
                }
                catch(Exception $e){
                    return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $e));
                }
            }
    }

    public function delete(){
        if(Request::method() == 'POST'){
            try{
                Conekta::setApiKey("key_ed4TzU6bqnX9TvdqqTod4Q");
                Conekta::setLocale('es');
                $plan = Conekta_Plan::find(Input::get('id')['reference']);
                $id = Input::get('id')['id'];
                Plan::find($id)->delete();
                $plan->delete();
                return Response::json(array('statusMessage'  =>  "success",'status' => 200,'data' => array('id' => $id)));
            }
            catch(Exception $e){
                return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $e));
            }
        }
        else{
        }
    }

    public function showView(){
            if(Request::method() == 'GET')
                    return View::make('vista_planes_admin');
    }

    public function get(){
        if(Request::method() == Method::POST){
            return Plan::find(Input::get('id'));
        }
    }

    public function all(){
            return Plan::where("active", "=", 1)->get();
    }

	 public function getHidden(){
            return Plan::where("active", "=", 1)
            ->where("visible", "=", 0)
            ->get();
	 }

}
?>
