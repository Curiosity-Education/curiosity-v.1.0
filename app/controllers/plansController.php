<?php
use \Stripe\Plan;

class plansController extends BaseController{

	public function __construct(){

}

public function createPlan(){
		if(Request::method() == 'POST'){
				Stripe::setApiKey('sk_test_TaoOe9Er8wZhp4nqBB46V7fO');

				Plan::create(array(
					"amount" => Input::get('amount'),
					"interval" => Input::get('interval'),
					"name" => Input::get('name'),
					"currency" => Input::get('currency'),
					"id" => Input::get('type'))
				);
				try{
						$newPlan = new Plan(Input::all());
						$newPlan->save();
						return array(0  =>  "success");
				}
				catch(Exception $e){
						return $e;
				}
		}
}

public function showView(){
		if(Request::method() == 'GET')
				return View::make('vista_planes_admin');
}

public function getPlans(){
		return [];
}

	function get(){

	}
	function save(){

	}
	function update(){

	}
	function delete(){

	}
}
?>
