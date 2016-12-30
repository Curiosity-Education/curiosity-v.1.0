<?php
class intelligencesController extends BaseController{

	function save(){
		$data = Input::get('data');
		$rules = array(
			'nombre' => 'required',
			'descripcion' => 'required',
			'grado' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			if ($this->NameActiveExist($data['grado'], $data['nombre'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$int = new Intelligence($data);
				$int->active = 1;
				$int->nivel_id = $data['grado'];
				$int->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $int));
			}
		}
	}

	function update(){
		$data = Input::get('data');
		$rules = array(
			'nombre' => 'required',
			'descripcion' => 'required',
			'grado' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			$int = Intelligence::where('id', '=', $data['idUpdate'])->first();
			$namePass = true;
			if ($int->nombre != $data['nombre']){
				if ($this->NameActiveExist($data['grado'], $data['nombre'])){
					$namePass = false;
				}
			}
			if ($namePass){
				Intelligence::where('id', '=', $data['idUpdate'])->update(array(
					'nombre' => $data['nombre'],
					'descripcion' => $data['descripcion']
				));
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
			}
			else{
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
		}
	}

	function delete(){
		$id = Input::get('data.id');
		Intelligence::where('id', '=', $id)->update(array(
			'active' => 0
		));
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
	}

	private function NameActiveExist($level, $name){
		// We'll check if into database exists the same intelligence's name and that
		// intelligence lives active into the level.
		$objs = Intelligence::where('nivel_id', '=', $level)->select('nombre', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->nombre === $name && $obj->active === 1){ $toLive = true; }
		}
		return $toLive;
	}
}
?>
