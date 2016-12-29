<?php
class activitiesController extends BaseController{

	function get(){
		$activityes = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
		->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
		->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
		->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
		->where('actividades.active', '=', 1)
		->where('temas.active', '=', 1)
		->where('bloques.active', '=', 1)
		->where('inteligencias.active', '=', 1)
		->where('niveles.active', '=', 1)
		->where('actividades.estatus', '=', 'eneabled')
		->select(
			'actividades.id as activityId',
			'actividades.nombre as activityName',
			'actividades.estatus as activityState',
			'actividades.wallpaper as activityWallpaper',
			'actividades.vistos as activitySaws',
			'actividades.tema_id as activityTopicId',
			'temas.id as topicId',
			'temas.nombre as topicName',
			'temas.bloque_id as topicBlockId',
			'bloques.id as blockId',
			'bloques.nombre as blockName',
			'bloques.inteligencia_id as blockInteligenceId',
			'inteligencias.id as inteligenceId',
			'inteligencias.nombre as inteligenceName',
			'inteligencias.descripcion as inteligenceDescription',
			'inteligencias.nivel_id as inteligenceLevelId',
			'niveles.id as levelId',
			'niveles.nombre as levelName'
		)->get();
		return $activityes;
	}

	function save(){
		$data = Input::all();
		$rules = array(
        'nombre'		=> 'required',
        'wallpaper'	=> 'required',
        'tema' 		=> 'required'
      );
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			if ($this->NameActiveExist($data['tema'], $data['nombre'])){
				// Return a message about the activity's name is living
			}
			else{
				$activity = new Activity($data);
				$activity->nombre = $data['nombre'];
				$activity->estatus = 'disabled';
				$activity->wallpaper = Curiosity::makeRandomName(true, true).".".$data['wallpaper']->getClientOriginalExtension();
				$activity->vistos = 0;
				$activity->active = 1;
				$activity->tema_id = $data['tema'];
				$destinoPath = public_path()."/packages/assets/media/images/games/wallpapers/";
				$file = $data['wallpaper'];
				$file->move($destinoPath, $activity->wallpaper);
				$activity->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $activity));
			}
		}
	}

	function update(){
		$data = Input::all();
		$rules = array(
			'nombre' => 'required',
			'tema'	=> 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return $validar->messages();
		}
		else{
			$activity = Activity::where('id', '=', $data['idUpdate'])->first();
			$namePass = true;
			if ($activity->nombre != $data["nombre"]){
				if ($this->NameActiveExist($data['tema'], $data['nombre'])){
					$namePass = false;
				}
			}
			if ($namePass){
				$wallpaperName = "";
				if($data['wallpaper'] == null){ $wallpaperName = $activity->wallpaper; }
				else{
					$destinoPath = public_path()."/packages/assets/media/images/games/wallpapers/";
					$file = $data['wallpaper'];
					$wallpaperName = Curiosity::makeRandomName(true, true).".".$file->getClientOriginalExtension();
					$file->move($destinoPath, $wallpaperName);
				}
				$activity->nombre = $data['nombre'];
				$activity->wallpaper = $wallpaperName;
				$activity->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
			}
			else{
				// Return a message about the new activity's name is living
			}
		}
	}

	function delete(){
		$id = Input::get('data.id');
		Activity::where('id', '=', $id)->update(array( 'active' => 0 ));
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
	}

	private function NameActiveExist($topic, $name){
		// We'll check if into database exists the same activity's name and that
		// activity lives active into the same topic.
		$acts = Activity::where('tema_id', '=', $topic)->select('nombre', 'active')->get();
		$toLive = false;
		foreach ($acts as $act) {
			if($act->nombre === $name && $act->active === 1){ $toLive = true; }
		}
		return $toLive;
	}
}
?>
