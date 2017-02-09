<?php
class blocksController extends BaseController{

	function all(){
		$blocks = Block::where('active', '=', 1)->get();
		return $blocks;
	}

	function getByIntelligent(){
		$data = Input::all();
		$blocks = Block::where("active", "=", 1)
		->where("inteligencia_id", "=", $data['id'])
		->get();
		return $blocks;
	}

	function getWithActivities(){
		$blocks = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
		->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
		->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
		->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
		->join('archivos', 'actividades.id', '=', 'archivos.actividad_id')
		->where('archivos.active', '=', 1)
		->where('actividades.active', '=', 1)
		->where('temas.active', '=', 1)
		->where('bloques.active', '=', 1)
		->where('inteligencias.active', '=', 1)
		->where('niveles.active', '=', 1)
		->where('actividades.estatus', '=', 'eneabled')
		->distinct()
		->select('bloques.*')
		->orderBy('bloques.id', 'asc')
		->get();
		return $blocks;
	}

	function save(){
		$data = Input::all();
		$rules = array(
			'nombre' => 'required',
			'inteligencia' => 'required',
			'ablk_logo' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
			if ($this->NameActiveExist($data['nombre'], $data['inteligencia'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$file = $data['ablk_logo'];
				$destinationPath = public_path()."/packages/assets/media/images/system/blocks/";
				$phName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
				$file->move($destinationPath, $phName);
				$block = new Block($data);
				$block->active = 1;
				$block->inteligencia_id = $data['inteligencia'];
				$block->imagen = $phName;
				$block->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $block));
			}
		}
	}

	function update(){
		$data = Input::all();
		$file = $data['ablk_logo'];
		$rules = array(
			'nombre' => 'required',
			'inteligencia' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
			$bk = Block::where('id', '=', $data['id'])->first();
			$namePass = true;
			if ($bk->nombre != $data['nombre']){
				if ($this->NameActiveExist($data['nombre'], $data['inteligencia'])){
					$namePass = false;
				}
			}
			if ($namePass){
				$block = Block::where('id', '=', $data['id'])->first();
				if ($file != null){
					$destinationPath = public_path()."/packages/assets/media/images/system/blocks/";
					$phName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
					$file->move($destinationPath, $phName);
					if ($block->imagen != null || $block->imagen != ""){
						unlink($destinationPath.$block->imagen);
					}
					$block->imagen = $phName;
				}
				$block->nombre = $data['nombre'];
				$block->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $block));
			}
			else{
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
		}
	}

	function delete(){
		$data = Input::all();
		Block::where('id', '=', $data['id'])->update(array( 'active' => 0 ));
		$block = Block::where('id', '=', $data['id'])->first();
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $block));
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
