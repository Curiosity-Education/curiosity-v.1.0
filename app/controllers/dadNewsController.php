<?php
class dadNewsController extends BaseController{

	function get(){
		$news = DB::table('novedades_papa')
			->select('*')
			->where('status','=','1')
			->limit(8)
			->orderBy('id','DESC')
			->get();

		return View::make('administer.admin-news')->with('news',$news);

		 /*return Response::json(array(
           'status'        =>  200,
           'statusMessage' => 'success',
           'message'       => 'chido',
           'data'          =>  $novedades
        )); */
	}

	function save(){
		$data = Input::all();

		$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$quantity = 5;
		$nameRandom = "";

		for($i = 0; $i < $quantity; $i++){

			$nameRandom .= substr($characters,rand(0,strlen($characters)),1);

		}

		$nameRandom = $nameRandom.".";

		$id_admin = DB::table('users')
			->select('administrativos.id')
			->join('personas','personas.user_id', '=', 'users.id')
			->join('administrativos','administrativos.persona_id', '=', 'personas.id')
			->where('users.id', '=', Auth::user()->id)
			->first()->id;

		$rules = array(
			'titulo_papa'  => 'required|max:20',
			'pdf'          => 'required'
		);

		$messages = ["mimes" => "el archivo debe ser extensión PDF"];
		$validation = Validator::make(Input::all(),$rules);

		if($validation -> fails()){
			return $validation -> messages();
		}else{
			$new = new ParentNew($data);
			$new -> titulo = $datos['titulo_papa'];
			$new -> pdf = $nameRandom.$data['pdf'] -> getClientOriginalExtension();
			$new -> status = (1);
			$new -> administrativo_id = $id_admin;
			$new -> save();

			$data['pdf']->move(public_path()."/packages/assets/pdf", $nameRandom.$data['pdf'] -> getClientOriginalExtension());
		}

	}

	function update(){

	}

	function delete(){

	}
}
?>
