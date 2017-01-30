<?php
use App\Models\File;
class activitiesController extends BaseController{

	function get(){
        try{
            if(Request::method() == Method::POST){
                $id = Input::get('data.id');
                $activity = Activity::where('id', '=', $id)->orderBy('id', 'asc')->get();
                return $activity;
            }
        }
        catch(Exception $e){
            return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $e));
        }
	}

	function all(){
		$activities = Activity::join('temas', 'actividades.tema_id', '=', 'temas.id')
		->join('bloques', 'temas.bloque_id', '=', 'bloques.id')
		->join('inteligencias', 'bloques.inteligencia_id', '=', 'inteligencias.id')
		->join('niveles', 'inteligencias.nivel_id', '=', 'niveles.id')
		->join('archivos', 'actividades.id', '=', 'archivos.actividad_id')
		->where('actividades.active', '=', 1)
		->where('temas.active', '=', 1)
		->where('bloques.active', '=', 1)
		->where('inteligencias.active', '=', 1)
		->where('niveles.active', '=', 1)
		->where('archivos.active', '=', 1)
		->where('actividades.estatus', '=', 'eneabled')
		->distinct()
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
		'niveles.nombre as levelName',
		'archivos.carpeta as folder'
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
		->limit(6)
		->get();
		//this format message is for developer
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
		->limit(6)
		->get();
		//this format message is for developer
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
		//this format message is for developer
		return  $rankingGroup;
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
		->limit(6)
		->get();
		if (count($recomended) < 3){
			$recomended = $this->getRecentsAdded();
		}
		//this format message is for developer
		return $recomended;
	}
	public function getAll(){//function for get alldata in homa page for child
		$recents    = $this->getRecentsAdded();
		$populars   = $this->getPopulars();
		$ranks      = $this->getMaxRank();
		$recomended = $this->getRecomended();
		//this format message is for user
        return Response::json(array(
           'status'        =>  200,
           'statusMessage' => 'success',
           'message'       => 'Bien hecho, datos obtenidos correctamente!',
           'data'          =>  ["recents"=>$recents,"populars"=>$populars,"ranks"=>$ranks,"recomended"=>$recomended]
        ));
	}
	function save(){
		$data = Input::all();
		$rules = array(
            'acti_name'		=> 'required',
            'acti_estatus'		=> 'required',
            'tema' 		=> 'required',
            'acti_wallpaper' => 'required'
        );

		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
			if ($this->NameActiveExist($data['tema'], $data['acti_name'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$activity = new Activity();
				$activity->nombre = $data['acti_name'];
				$activity->estatus = $data['acti_estatus'];
				$activity->wallpaper = Curiosity::makeRandomName(true, true).".".Input::file('acti_wallpaper')->getClientOriginalExtension();
				$activity->vistos = 0;
				$activity->active = 1;
				$activity->tema_id = $data['tema'];
				$destinoPath = public_path()."/packages/assets/media/images/games/wallpapers/";
				$file = Input::file('acti_wallpaper');
				$file->move($destinoPath, $activity->wallpaper);
				$activity->save();
				activitiesVideosController::saveFromActivity($activity);
				activitiesPdfsController::saveFromActivity($activity);
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $activity));
			}
		}
	}

	function update(){
		$data = Curiosity::makeArrayByObject(Input::all());
		$rules = array(
			'acti_name'		=> 'required',
            'acti_estatus'		=> 'required',
            'tema' 		=> 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
			$activity = Activity::where('id', '=', $data['id'])->first();
			$namePass = true;
			if ($activity->nombre != $data["acti_name"]){
				if ($this->NameActiveExist($data['tema'], $data['acti_name'])){
					$namePass = false;
				}
			}
			if ($namePass){
				$wallpaperName = "";
				if($data['acti_wallpaper'] == null){ $wallpaperName = $activity->wallpaper; }
				else{
					$destinoPath = public_path()."/packages/assets/media/images/games/wallpapers/";
					$file = Input::file('acti_wallpaper');
					$wallpaperName = Curiosity::makeRandomName(true, true).".".$file->getClientOriginalExtension();
					$file->move($destinoPath, $wallpaperName);
				}
				$activity->nombre = $data['acti_name'];
                $activity->estatus = $data['acti_estatus'];
				$activity->wallpaper = $wallpaperName;
				$activity->save();
                $act = Activity::where('id', '=', $data['id'])->first();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $act));
			}
			else{
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
		}
	}

	function delete(){
		$id = Curiosity::makeArrayByObject(Input::all());
		Activity::where('id', '=', $id)->update(array( 'active' => 0 ));
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => Response::json(array('id'=>$id))));
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


	function getByTopic(){
		$data = Input::all();
		$activity = Activity::where("active", "=", 1)
		->where("tema_id", "=", $data['id'])
		->get();
		return $activity;
	}

	function getByIntelligent(){
		$data = Input::all();
		$activity = Activity::where("active", "=", 1)
		->join("temas", "actividades.tema_id", "=", "temas.id")
		->join("bloques", "temas.bloque_id", "=", "bloques.id")
		->join("inteligencias", "bloques.inteligencia_id", "=", "inteligencias.id")
		->where("inteligencias.id", "=", $data['id'])
		->get();
		return $activity;
	}

    public function hasGame(){
        return File::where('actividad_id','=',Input::get('id'))->where('active','=','1')->select('*')->get();
    }

    public function saveGame(){
        if(Input::hasfile('game')){
            $packRoutes = array('*.copy' => '*');
            $uploadFile = Curiosity::extractZip(Input::file('game'),$packRoutes,'yes');
            $fileGame = new File();
            $fileGame->carpeta = $uploadFile["folder"];
            //$fileGame->administrativo_id =Auth::user()->id;
            $fileGame->active = 1;
            $fileGame->actividad_id = Input::get('activity_id');
            $fileGame->save();
            return Response::json(array('status' => 200,'statusMessage' => 'success','data' => $fileGame));
        }
    }

    public function updateGame(){
        if(Input::hasfile('game')){
            $packRoutes = array('*.copy' => '*');
            $uploadFile = Curiosity::extractZip(Input::file('game'),$packRoutes,'yes');
            File::find(Input::get('id'))->update(array(
                'carpeta' => $uploadFile['folder'],
                'actividad_id' => Input::get('activity_id')
            ));
            return Response::json(array('status' => 200,'statusMessage' => 'success'));
        }
        else{
            return Response::json(array('status' => 404,'statusMessage' => 'not found','data' => null));
        }
    }

    public function deleteGame(){
        try{
            $rowsAffected = File::find(Input::get('id'))->delete();
            return Response::json(array('status' => 200,'statusMessage' => 'success','data' => $rowsAffected));
        }
        catch(Exception $e){
            return  Response::json(array('status' => 500,'statusMessage' => 'Server Error','data' => null));
        }
    }
}
?>
