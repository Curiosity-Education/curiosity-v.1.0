<?php
class topicsController extends BaseController{

	function save(){
		$data = Input::get('data');
		$rules = array(
			'nombre' => 'required',
			'bloque' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			if ($this->NameActiveExist($data['nombre'], $data['bloque'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$topic = new Topic($data);
				$topic->active = 1;
				$topic->bloque_id = $data['bloque'];
				$topic->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $topic));
			}
		}
	}

	function update(){
		$data = Input::get('data');
		$rules = array(
			'nombre' => 'required',
			'bloque' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			$tp = Topic::where('id', '=', $data['idUpdate'])->get();
			$namePass = true;
			if ($tp->nombre != $data['nombre']){
				if ($this->NameActiveExist($data['nombre'], $data['bloque'])){
					$namePass = false;
				}
			}
			if ($namePass){
				Topic::where('id', '=', $data['idUpdate'])->update(array( 'nombre' => $data['nombre'] ));
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
			}
			else{
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
		}
	}

	function delete(){
		$id = Input::get('data.id');
		Topic::where('id', '=', $id)->update(array( 'active' => 0 ));
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
	}

	private function NameActiveExist($name, $block){
		$objs = Topic::where('bloque_id', '=', $block)->select('nombre', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->nombre === $name && $obj->active === 1){ $toLive = true; }
		}
		return $toLive;
	}

}
?>
