<?php
class activitiesController extends BaseController{

	function get(){
		$id = Input::get('data.id');
		$activity = Activity::where('id', '=', $id)->get();
		return $activity;
	}

	function all(){
		$activities = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
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
		'bloques.inteligencia_id as blockintelligenceId',
		'inteligencias.id as intelligenceId',
		'inteligencias.nombre as intelligenceName',
		'inteligencias.descripcion as intelligenceDescription',
		'inteligencias.nivel_id as intelligenceLevelId',
		'niveles.id as levelId',
		'niveles.nombre as levelName'
		)->get();
		return $activities;
	}

	function getRecentsAdded(){
		$activities = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
		->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
		->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
		->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
		->where('actividades.active', '=', 1)
		->where('temas.active', '=', 1)
		->where('bloques.active', '=', 1)
		->where('inteligencias.active', '=', 1)
		->where('niveles.active', '=', 1)
		->where('actividades.estatus', '=', 'eneabled')
		->select('actividades.*',
		'temas.nombre as topicName',
		'bloques.nombre as blockName',
		'inteligencias.nombre as intelligenceName',
		'niveles.nombre as levelName')
		->orderBy('actividades.id', 'desc')
		->get();
		return $activities;
	}

	function getPopulars(){
		$populars = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
		->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
		->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
		->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
		->where('actividades.active', '=', 1)
		->where('temas.active', '=', 1)
		->where('bloques.active', '=', 1)
		->where('inteligencias.active', '=', 1)
		->where('niveles.active', '=', 1)
		->where('actividades.estatus', '=', 'eneabled')
		->select('actividades.*',
		'temas.nombre as topicName',
		'bloques.nombre as blockName',
		'inteligencias.nombre as intelligenceName',
		'niveles.nombre as levelName')
		->orderBy('vistos', 'desc')
		->get();
		return $populars;
	}

	function getMaxRank(){
		$activities = Activity::where('active', '=', 1)->where('estatus', '=', 'eneabled')->select('id')->groupBy('id')->get();
		$rankingGroup = array();
		foreach ($activities as $key => $value) {
			$average = round(DB::table('hijo_califica_actividades')
			->where('actividad_id', '=', $value->id)
			->avg('calificacion'));
			$activity = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
			->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
			->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
			->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
			->where('actividades.active', '=', 1)
			->where('temas.active', '=', 1)
			->where('bloques.active', '=', 1)
			->where('inteligencias.active', '=', 1)
			->where('niveles.active', '=', 1)
			->where('actividades.estatus', '=', 'eneabled')
			->where('actividades.id', '=', $value->id)
			->select('actividades.*',
			'temas.nombre as topicName',
			'bloques.nombre as blockName',
			'inteligencias.nombre as intelligenceName',
			'niveles.nombre as levelName')
			->get();
			if (count($activity) > 0){
				array_push($rankingGroup, array('activity' => $activity, 'average' => $average));
			}
		}
		$rankingGroup = Curiosity::bubleSortObject($rankingGroup, 'average', 'desc');
		return $rankingGroup;
	}

	function getRecomended(){
		$recomended = Activity::join('hijo_realiza_actividades', 'hijo_realiza_actividades.actividad_id', '=', 'actividades.id')
		->join('temas', 'actividades.tema_id', '=', 'temas.id')
		->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
		->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
		->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
		->join('hijos','hijos.id','=','hijo_realiza_actividades.hijo_id')
		->join('personas','hijos.persona_id','=','personas.id')
		->where('actividades.active', '=', 1)
		->where('temas.active', '=', 1)
		->where('bloques.active', '=', 1)
		->where('inteligencias.active', '=', 1)
		->where('niveles.active', '=', 1)
		->where('actividades.estatus', '=', 'eneabled')
		->where('personas.user_id', '=', Auth::user()->id)
		->select(DB::raw("AVG( hijo_realiza_actividades.promedio ) as 'average',
		actividades.*,
		temas.nombre as topicName,
		bloques.nombre as 'blockName',
		inteligencias.nombre as 'intelligenceName',
		niveles.nombre as 'levelName'"))
		->groupBy('actividades.nombre')
		->orderBy('average')
		->get();
		if (count($recomended) < 3){
			$recomended = $this->getRecentsAdded();
		}
		return $recomended;
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
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
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
				activitiesVideosController::save($activity);
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
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
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
