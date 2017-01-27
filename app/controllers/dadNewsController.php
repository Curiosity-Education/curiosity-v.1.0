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
		$validation = Validator::make(Input::all(),$rules);

		if($validation -> fails()){
			return Response::json(array("status" => "CU-104",
										'statusMessage' => "Validation Error",
										"data" => $validation -> messages()));
		}else{
			$new = new ParentNew($data);
			$new -> titulo = $data['title_new'];
			$new -> pdf = $nameRandom.$data['nw_pdf'] -> getClientOriginalExtension();
			$new -> status = (1);
			$new -> administrativo_id = $id_admin;
			$new -> save();

			$data['nw_pdf']->move(public_path()."/packages/assets/pdf/", $nameRandom.$data['nw_pdf'] -> getClientOriginalExtension());

			return Response::json(array("status" => 200,
									   	'statusMessage' => "success",
									   	"data" => $new));
		}

	}

	function update($id){
		$data = Input::all();

		$id_admin = DB::table('users')
			->select('administrativos.id')
			->join('personas','personas.user_id', '=', 'users.id')
			->join('administrativos','administrativos.persona_id', '=', 'personas.id')
			->where('users.id', '=', Auth::user()->id)
			->first()->id;

		$rules = array(
			'title_newEdit'  => 'required',
			'nw-pdfEdit'	 => 'mimes:pdf'
		);

		$validation = Validator::make(Input::all(),$rules);

		if($validation -> fails()){
			return $validation -> messages();
		}else{
			$new = ParentNew::find($id);
			$new -> titulo = $data['title_newEdit'];
				if(Input::hasFile('pdf_edit')){

					$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
					$quantity = 5;
					$nameRandom = "";

					for($i = 0; $i < $quantity; $i++){

						$nameRandom .= substr($characters,rand(0,strlen($characters)),1);

					}

					$nameRandom = $nameRandom.".";

					$data['pdf_edit']->move(public_path()."/packages/assets/pdf", $nameRandom.$data['pdf_edit'] -> getClientOriginalExtension());

					$new -> pdf = $nameRandom.$data['pdf_edit'] -> getClientOriginalExtension();

				}

				$new -> status = (1);
				$new -> administrativo_id = $id_admin;
				$new -> save();

				return Response::json(array(
				   'status'        =>  200,
				   'statusMessage' => 'success',
				   'message'       => 'Exito, novedad editada'
			));

		}

	}

	function delete($id){

		$new = ParentNew::find($id);
		$new -> status(0);
		$new -> save();
		sleep(1);

		return Response::json(array(
			'status'        =>  200,
			'statusMessage' => 'success',
			'message'       => 'Exito, novedad eliminada'
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
