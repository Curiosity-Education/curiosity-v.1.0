<?php
class teachersController extends BaseController{

	public function all(){
		$th = Teacher::where("active", "=", 1)->get();
		return $th;
	}

	public function getWithSchool(){
		$th = Teacher::join("escuelas_apoyo", "profesores_apoyo.escuela_id", "=" , "escuelas_apoyo.id")
		->where("profesores_apoyo.active", "=", 1)
		->where("escuelas_apoyo.active", "=", 1)
		->select(
			"profesores_apoyo.*",
			"escuelas_apoyo.nombre as escuelaNombre",
			"escuelas_apoyo.id as escuelaId")
		->orderBy("profesores_apoyo.id", "desc")
		->get();
		return $th;
	}

	function save(){
		$data = Input::all();
      $rules = array(
			'nombre' => 'required',
			'apellidos' => 'required',
			'email' => 'required|email',
			'escuela' => 'required'
		);
      $msjs = Curiosity::getValidationMessages();
      $validation = Validator::make($data, $rules, $msjs);
      if($validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
      }
		else{
			if($data['ateach_photo'] != null){
				$destinationPath = public_path()."/packages/assets/media/images/teachersAsc/";
				$file = $data['ateach_photo'];
				$phName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
				$file->move($destinationPath, $phName);
			}
			else{
				$phName = 'teacherDefProfileImage.png';
			}
			$teacher = new Teacher($data);
			$teacher->foto = $phName;
			$teacher->escuela_id = $data["escuela"];
			$teacher->active = 1;
			$teacher->save();
			return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $teacher));
		}
	}

  function update(){
    $form = Input::all();
	 $file = $form['ateach_photo'];
	 $rules = array(
		 'nombre' => 'required',
		 'apellidos' => 'required',
		 'email' => 'required|email',
		 'escuela' => 'required'
	 );
    $msjs = Curiosity::getValidationMessages();
    $validate = Validator::make($form, $rules, $msjs);
    if($validate->fails()){
      return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
    }
    else{
		$teacherUpd = Teacher::where("id", "=", $form['id'])->first();
      if($file != null){
        $destinationPath = public_path()."/packages/assets/media/images/teachersAsc/";
		  $phName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
        $file->move($destinationPath, $phName);
		  if ($teacherUpd->foto != "teacherDefProfileImage.png"){
		  	unlink($destinationPath.$teacherUpd->foto);
		  }
		  $teacherUpd->foto = $phName;
      }
		$teacherUpd->nombre = $form['nombre'];
		$teacherUpd->apellidos = $form['apellidos'];
		$teacherUpd->email = $form['email'];
		$teacherUpd->escuela_id = $form['escuela'];
		$teacherUpd->save();
      return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $teacherUpd));
    }
  }

	function delete(){
		$id = Input::all();
		Teacher::where("id", "=", $id)->update(array(
			"active" => 0
		));
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
	}
}
?>
