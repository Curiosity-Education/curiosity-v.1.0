<?php 
class citiesController extends BaseController{
	
	public function get(){
		$state_id = Input::get('estado_id');
		$cities = ciudad::where("estado_id","=",$state_id)->get();
		return $cities;
	}
	function save(){
		
	}
	function update(){
		
	}
	function delete(){
		
	}
}
?>
