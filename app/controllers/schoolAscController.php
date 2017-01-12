<?php
class schoolAscController extends BaseController{

	function all(){
		$sch = SchoolAsc::where('active', '=', 1)->get();
		return $sch;
	}

	function save(){
		$data = Input::all();
		$file = $data['asch_logo'];
		$rules = array(
			'nombre' => 'required',
			'asch_logo' => 'required'
		);
		$messages = Curiosity::getValidationMessages();
		$validate = Validator::make($data, $rules, $messages);
		if($validate->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validate->messages()));
		}
		else{
			if ($this->NameActiveExist($data['nombre'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$path = public_path()."/packages/assets/media/images/schools/";
				$nameLogo = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
				$file->move($path, $nameLogo);
				$school = new SchoolAsc($data);
				$school->logotipo = $nameLogo;
				$school->active = 1;
				$school->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $school));
			}
		}
	}

	function update(){
		$data = Input::all();
		$file = $data['asch_logo'];
		$rules = array(
			'nombre' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
			$level = SchoolAsc::where('id', '=', $data['id'])->first();
			$namePass = true;
			if ($level->nombre != $data['nombre']){
				if ($this->NameActiveExist($data['nombre'])){
					$namePass = false;
				}
			}
			if ($namePass){
				$schoolUpd = SchoolAsc::where('id', '=', $data['id'])->first();
				if ($file != null){
					$path = public_path()."/packages/assets/media/images/schools/";
					$nameLogo = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
					$file->move($path, $nameLogo);
					unlink($path.$schoolUpd->logotipo);
					$schoolUpd->logotipo = $nameLogo;
				}
				$schoolUpd->nombre = $data['nombre'];
				$schoolUpd->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $schoolUpd));
			}
			else{
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
		}
	}

	function delete(){
		$id = Input::all();
		SchoolAsc::where('id', '=', $id)->update(array( 'active' => 0 ));
		$schDel = SchoolAsc::where('id', '=', $id)->first();
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $schDel));
	}

	private function NameActiveExist($name){
		$objs = SchoolAsc::where('nombre', '=', $name)->select('nombre', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->nombre === $name && $obj->active === 1){ $toLive = true; }
		}
		return $toLive;
	}
}
?>
