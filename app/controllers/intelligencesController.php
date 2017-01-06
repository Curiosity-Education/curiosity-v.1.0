<?php
class intelligencesController extends BaseController{

	function all(){
		$ints = Intelligence::where('active', '=', 1)->get();
		return $ints;
	}

	function getByLevel(){
		$data = Input::all();
		$ints = Intelligence::where("active", "=", 1)
		->where("nivel_id", "=", $data['id'])
		->get();
		return $ints;
	}

	function getWithActivities(){
		$intelligences = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
		->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
		->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
		->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
		->where('actividades.active', '=', 1)
		->where('temas.active', '=', 1)
		->where('bloques.active', '=', 1)
		->where('inteligencias.active', '=', 1)
		->where('niveles.active', '=', 1)
		->where('actividades.estatus', '=', 'eneabled')
		->select('inteligencias.*')->get();
		return $intelligences;
	}

	function save(){
		$data = Input::all();
		$rules = array(
			'nombre' => 'required',
			'descripcion' => 'required',
			'nivel' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			if ($this->NameActiveExist($data['nivel'], $data['nombre'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$int = new Intelligence($data);
				$int->active = 1;
				$int->nivel_id = $data['nivel'];
				$int->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $int));
			}
		}
	}

	function update(){
		$data = Input::all();
		$rules = array(
			'nombre' => 'required',
			'descripcion' => 'required',
			'nivel' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validation->messages();
		}
		else{
			$int = Intelligence::where('id', '=', $data['id'])->first();
			$namePass = true;
			if ($int->nombre != $data['nombre']){
				if ($this->NameActiveExist($data['nivel'], $data['nombre'])){
					$namePass = false;
				}
			}
			if ($namePass){
				Intelligence::where('id', '=', $data['id'])->update(array(
					'nombre' => $data['nombre'],
					'descripcion' => $data['descripcion']
				));
				$ints = Intelligence::where('id', '=', $data['id'])->first();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $ints));
			}
			else{
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
		}
	}

	function delete(){
		$data = Input::all();
		Intelligence::where('id', '=', $data['id'])->update(array(
			'active' => 0
		));
		$int = Intelligence::where('id', '=', $data['id'])->first();
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $int));
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
