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

		$id_admin = DB::table('administrativos')
			->select('administrativos.id')
			->join('users','administrativos.user_id', '=', 'users.id')
			->where('users.id', '=', Auth::user()->id)
			->first()->id;

		$rules = array(
			'title_new'  => 'required|max:20',
			'nw_pdf'     => 'required'
		);

		$messages = ["mimes" => "el archivo debe ser extensión PDF"];
		$validation = Validator::make($data,$rules,$messages);

		if($validation -> fails()){
			return Response::json(array("status"          => "CU-104",
										'statusMessage'   => "Validation Error",
										"data"            => $validation -> messages()));
		}else{
			$new = new ParentNew($data);
			$new -> titulo 			  = $data['title_new'];
			$new -> pdf    			  = $nameRandom.$data['nw_pdf'] -> getClientOriginalExtension();
			$new -> status 		      = (1);
			$new -> administrativo_id = $id_admin;
			$new -> descripcion       = $data['description_new'];
			$new -> save();

			$data['nw_pdf']->move(public_path()."/packages/assets/pdf/", $nameRandom.$data['nw_pdf'] -> getClientOriginalExtension());

			return Response::json(array("status"        => 200,
									   	'statusMessage' => "success",
									   	"message"       => 'Novedad Agregada'));
		}

	}

	function update(){
		$data = Input::all();

		$id_admin = DB::table('administrativos')
			->select('administrativos.id')
			->join('users','administrativos.user_id', '=', 'users.id')
			->where('users.id', '=', Auth::user()->id)
			->first()->id;

		$rules = array(
			'title_newEdit'  => 'required|max:20'
		);

		$messages = ["required" => "El titulo es requerido"];
		$validation = Validator::make(Input::all(),$rules,$messages);

		if($validation -> fails()){
			return Response::json(array("status" => "CU-104",
										'statusMessage' => "Validation Error",
										"data" => $validation -> messages()));
		}else{
			$new = ParentNew::find($data['id']);
			$new -> titulo      = $data['title_newEdit'];
			$new -> descripcion = $data['description_newEdit'];
				if(Input::hasFile('nw_pdfEdit')){

					$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
					$quantity = 5;
					$nameRandom = "";

					for($i = 0; $i < $quantity; $i++){

						$nameRandom .= substr($characters,rand(0,strlen($characters)),1);

					}

					$nameRandom = $nameRandom.".";

					$data['nw_pdfEdit']->move(public_path()."/packages/assets/pdf", $nameRandom.$data['nw_pdfEdit'] -> getClientOriginalExtension());

					$new -> pdf = $nameRandom.$data['nw_pdfEdit'] -> getClientOriginalExtension();

				}

				$new -> status = (1);
				$new -> administrativo_id = $id_admin;
				$new -> save();

				return Response::json(array(
				   'status'        =>  200,
				   'statusMessage' => 'success',
				   'message'       => 'Novedad editada'));

		}

	}

	function delete(){
		$id = Input::all();
		$new = ParentNew::find($id['id']);
		$new -> status = (0);
		$new -> save();

		return Response::json(array(
			'status'        =>  200,
			'statusMessage' => 'success',
			'message'       => 'Novedad eliminada'
		));
	}

	function titleExists(){

		$new = DB::table('novedades_papa')
			->where("titulo","=",Input::get("title_new"))
			->where("status", "=", "1")->first();

		if($new || $new){
			return "false";
		}else{
			return "true";
		}

	}
}
?>
