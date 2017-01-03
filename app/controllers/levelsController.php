<?php
class levelsController extends BaseController{

	function all(){
		$levels = Level::where('active', '=', 1)->get();
		return $levels;
	}

	function getWithActivities(){
		$levels = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
		->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
		->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
		->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
		->where('actividades.active', '=', 1)
		->where('temas.active', '=', 1)
		->where('bloques.active', '=', 1)
		->where('inteligencias.active', '=', 1)
		->where('niveles.active', '=', 1)
		->where('actividades.estatus', '=', 'eneabled')
		->select('niveles.*')->get();
		return $levels;
	}

	function save(){
		$data = Input::get('data');
		$rules = array(
			'nombre' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			if ($this->NameActiveExist($data['nombre'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$level = new Level($data);
				$level->active = 1;
				$level->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $level));
			}
		}
	}

	function update(){
		$data = Input::get('data');
		$rules = array(
			'nombre' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			$level = Level::where('id', '=', $data['idUpdate'])->first();
			$namePass = true;
			if ($level->nombre != $data['nombre']){
				if ($this->NameActiveExist($data['nombre'])){
					$namePass = false;
				}
			}
			if ($namePass){
				Level::where('id', '=', $data['idUpdate'])->update(array( 'nombre' => $data['nombre'] ));
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
			}
			else{
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
		}
	}

	function delete(){
		$id = Input::get('data.id');
		Level::where('id', '=', $id)->update(array( 'active' => 0 ));
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
	}

	private function NameActiveExist($name){
		// We'll check if into database exists the same level's name and that
		// level lives active.
		$objs = Level::where('nombre', '=', $name)->select('nombre', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->nombre === $name && $obj->active === 1){ $toLive = true; }
		}
		return $toLive;
	}
}
?>
