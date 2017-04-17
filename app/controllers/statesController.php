<?php
class statesController extends BaseController{

	function all(){
		$state = State::all();
		return $state;
	}

	function get(){
    return estado::where('pais_id', '=', pais::where('pais', '=', $pais)->pluck('id'))->get();
	}
	function save(){

	}
	function update(){

	}
	function delete(){

	}
}

?>
