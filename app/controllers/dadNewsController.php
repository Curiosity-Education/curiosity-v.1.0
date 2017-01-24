<?php
class dadNewsController extends BaseController{

	function get(){
		$novedades = DB::table('novedades_papa')
			->select('*')
			->where('status','=','1')
			->limit(8)
			->orderBy('id','DESC')
			->get();

		 return Response::json(array(
           'status'        =>  200,
           'statusMessage' => 'success',
           'message'       => 'chido',
           'data'          =>  $novedades
        ));
	}

	function save(){

	}

	function update(){

	}

	function delete(){

	}
}
?>
