<?php 
class citiesController extends BaseController{
	
	public function all(){

	}
    public function get(){
        $estadoId = Input::get('estado');
        $pais = Input::get('pais');
        $query = DB::table('ciudades')->join('estados', 'estado_id', '=', 'estados.id')
        ->join('paises', 'pais_id', '=', 'paises.id')
        ->where('estados.id', '=', $estadoId)
        ->where('paises.pais', '=', $pais)
        ->select('ciudades.*')
        ->get();
        return $query;
    }
	function save(){
		
	}
	function update(){
		
	}
	function delete(){
		
	}
}
?>
