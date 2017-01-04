<?php
class blocksController extends BaseController{

	function all(){
		$blocks = Block::where('active', '=', 1)->get();
		return $blocks;
	}

	function getWithActivities(){
		$blocks = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
		->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
		->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
		->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
		->where('actividades.active', '=', 1)
		->where('temas.active', '=', 1)
		->where('bloques.active', '=', 1)
		->where('inteligencias.active', '=', 1)
		->where('niveles.active', '=', 1)
		->where('actividades.estatus', '=', 'eneabled')
		->select('bloques.*')->get();
		return $blocks;
	}

	function save(){
		$data = Input::get('data');
		$rules = array(
			'nombre' => 'required',
			'inteligencia' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			if ($this->NameActiveExist($data['nombre'], $data['inteligencia'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$block = new Block($data);
				$block->active = 1;
				$block->inteligencia_id = $data['inteligencia'];
				$block->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $block));
			}
		}
	}

	function update(){
		$data = Input::get('data');
		$rules = array(
			'nombre' => 'required',
			'inteligencia' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			$bk = Block::where('id', '=', $data['idUpdate'])->get();
			$namePass = true;
			if ($bk->nombre != $data['nombre']){
				if ($this->NameActiveExist($data['nombre'], $data['inteligencia'])){
					$namePass = false;
				}
			}
			if ($namePass){
				Block::where('id', '=', $data['idUpdate'])->update(array( 'nombre' => $data['nombre'] ));
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
			}
			else{
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
		}
	}

	function delete(){
		$id = Input::get('data.id');
		Block::where('id', '=', $id)->update(array( 'active' => 0 ));
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
	}

	private function NameActiveExist($name, $intel){
		// We'll check if into database exists the same block's name and that
		// block lives active.
		$objs = Block::where('inteligencia_id', '=', $intel)->select('nombre', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->nombre === $name && $obj->active === 1){ $toLive = true; }
		}
		return $toLive;
	}

}
?>
