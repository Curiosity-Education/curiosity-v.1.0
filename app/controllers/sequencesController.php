<?php
class sequencesController extends BaseController{
	function getById(){
	$id = Input::get('data');
	$sequences = secuencia::where('active', '=', '1')
												 ->where('avatar_estilo_id', '=', $id)
												 ->groupBy('avatar_estilo_id')
												 ->get();
	$row = array();
	foreach ($sequences as $key => $value) {
		array_push($row, json_encode($value));
	}
	return $row;
}

function save(){
	$data = Input::all();
	$file = Input::file('filesecuence');
	$rules = array('tipo_secuencia' => 'required');
	$messages = ["required" => "El campo :attribute es requerido"];
	$validate = Validator::make($data, $rules, $messages);
	if($validate->fails()){
		return $validate->messages();
	}
	else{
		if($file != null){
			$myZip = new zipController();
			$typesDir = array(
				'png' => '/packages/images/avatars_curiosity/secuencias/'
			);
			$zipFile = $myZip->extraerSave($file, $typesDir, 'both');
			foreach ($zipFile[1] as $index => $objeto) {
				$sequences = new secuencia($datos);
				$sequences->sequences_type_id = $data['tipo_secuencia'];
				$sequences->sprite = $object['nombre'];
				$sequences->save();
			}
			return Response::json(array("success", json_encode($sequences)));
		}
		else{
			return Response::json(array("fileEmpty"));
		}
	}
}

function delete(){
	$data = Input::get('data');
	secuencia::where('avatar_estilo_id', '=', $data['idEstilo'])
	->where('tipo_secuencia_id', '=', $data['isTipo'])
	->update(array(
		'active' => 0
	));
	return Response::json(array(0=>'success'));
}

public static function getSelectedSprite($nameType){
	if (Auth::user()->hasRole('hijo') || Auth::user()->hasRole('hijo_free') || Auth::user()->hasRole('demo_hijo')){
		$idSon = Auth::User()->persona()->first()->hijo()->pluck('id');
		$idStyle = avatarestilosController::getSelectedInfo()->id;
		$spritePack = DB::table('hijos_avatars')
		->join('avatars_estilos', 'hijos_avatars.avatar_id', '=', 'avatars_estilos.id')
		->join('secuencias', 'avatars_estilos.id', '=', 'secuencias.avatar_estilo_id')
		->join('tipos_secuencias', 'secuencias.tipo_secuencia_id', '=', 'tipos_secuencias.id')
		->where('hijos_avatars.hijo_id', '=', $idSon)
		->where('tipos_secuencias.nombre', '=', $nameType)
		->where('secuencias.avatar_estilo_id', '=', $idStyle)
		->select('secuencias.sprite', 'secuencias.id')
		->orderBy('secuencias.sprite', 'asc')
		->get();
		return Response::json(array('estatus'=>true, 'sprite'=>$spritePack));
	}
	else{
		return Response::json(array('estatus'=>false, 'sprite'=>'spritenonsondavatar.png'));
	}
}

	function get(){

	}

	function update(){

	}
}
?>
