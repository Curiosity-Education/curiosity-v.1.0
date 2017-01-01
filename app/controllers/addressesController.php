<?php
class addressesController extends BaseController{

	function getState($pais){
    return estado::where('pais_id', '=', pais::where('pais', '=', $pais)->pluck('id'))->get();
  }

  function getTowns(){
    $stateId = Input::get('estado');
    $country = Input::get('pais');
    $query = DB::table('ciudades')->join('estados', 'estado_id', '=', 'estados.id')
    ->join('paises', 'pais_id', '=', 'paises.id')
    ->where('estados.id', '=', $stateId)
    ->where('paises.pais', '=', $country)
    ->select('ciudades.*')
    ->get();
    return $query;
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
