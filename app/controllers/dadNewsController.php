<?php
class dadNewsController extends BaseController{

	function get(){

		$Parent_News = DB::table('novedades_papa')
			->select('*')
			->where('status', '=', '1')
			->limit(5)
			->orderBy('id','DESC')
			->get();

		return $Parent_News;

	}
	function save(){

	}
	function update(){

	}
	function delete(){

	}
}
?>
