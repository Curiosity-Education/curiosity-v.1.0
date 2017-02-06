<?php
use App\Models\File;
class childrenDoActivitiesController extends BaseController{

	function get(){

	}
	function save(){
		if(Request::method()=="POST"){
			$data = Input::all();
			$rules = [
				"score"	      =>	"required|integer",
				"efficiency"  =>	"required|decimal",
				"hits"		  =>	"required|integer",
				"mistakes"	  =>	"required|integer",
				"average"	  =>	"required|decimal"
			];
			$validation = Validator::make($data,$rules);
			if($validation->fails()){
				//this format error is for developers
				return Response::json(array(
					'status' 		=> 'CU-104',
					'statusMessage' => 'Inconsistency format data',
					'message'		=> 'this activity hasn´t finish, the data recived dont have a format data set in database',
					"messages"		=> $validation->messages()
		    	));
			}else{
				//get child current id
				$idHijo     = Auth::User()->Person->Son->id;
				//get Activity current id
				$activityId = Session::get('idActivity');
				$childDoActivity               = new ActivityDoneBySon();
				$childDoActivity->puntaje      = $data["score"];
				$childDoActivity->eficiencia   = $data["efficiency"];
				$childDoActivity->aciertos     = $data["hits"];
				$childDoActivity->incorrectos  = $data["mistakes"];
				$childDoActivity->promedio     = $data["average"];
				$childDoActivity->hijo_id      = $idHijo;
				$childDoActivity->actividad_id = $activityId;
				$childDoActivity->save();
				//this format message is for user
				$today 			= date("Y-m-d");
				$progressGoal  = SonDailyGoal::join("avances_metas",'avances_metas.avance_id','=','hijos_metas_diarias.id')
									   ->where("hijos_metas_diarias.hijo_id",'=',Auth::user()->Person->Son->id)
									   ->where("avances_metas.fecha",'=',$today)
									   ->first();
				$idMeta         =  SonDailyGoal::where("hijo_id",'=',Auth::user()->Person->Son->id)->pluck("id");
			    if($progressGoal){// if son has a activity done them update your advances
			    	$progressDaily 		   = ProgressGoal::find($progressGoal->id);
			    	$avance        		   = (integer)$progressDaily->avance;
			    	$progressDaily->avance = $avance +1;
			    	$progressDaily->save();
			    }else{
			    	//get Hijo Avence id2HGD1|34
			    	$progressDaily  = new ProgressGoal();
			    	$progressDaily->avance     = 1;
			    	$progressDaily->fecha      = $today;
			    	$progressDaily->avance_id  = $idMeta;
			    	$progressDaily->save();
			    }
				 $addedExp = $this->incrementExp($idHij, $data["efficiency"]);
				 $addedCoins = $this->incrementCoins($idHij, $addedExp);
				return Response::json(array(
					'status' 		=>  200,
					'statusMessage' => 'success',
					'message'		=> 'Actividad finalizada. ¡Bien hecho!'
		    	));
			}
		}else{
			//this format error is for developers
			return Response::json(array(
				'status' 		=> 'CU-103',
				'statusMessage' => 'send format wrong',
				'message'		=> 'the send formt is wrong, the send format should be POST and ajax'
	    	));
		}
	}
	function update(){

	}
	function delete(){

	}
	public function getGame($activityId){
		//get child current id
		$idHijo = Auth::User()->Person->Son->id;
		//get Activity current id
		//$activityId = Session::get('idActivity');
		$file   =  File::where('actividad_id','=',$activityId)->where('active','=',"1")->select('*')->first();
		if($file){//if activity has game
			$scoreAndHits   = ActivityDoneBySon::where('actividad_id','=',$activityId)
                              ->where('hijo_id','=',$idHijo)
                              ->where('puntaje','=',ActivityDoneBySon::max('puntaje'))
                              ->select('puntaje','aciertos')
                              ->first();
			$sonRateActivity = SonRatesActivity::where("hijo_id","=",$idHijo)
										->where("actividad_id","=","$activityId")
										->first();
			$gameName = Activity::where("id",'=',$activityId)->pluck('nombre');
	        $data     = ["folder"=>$file->carpeta,"name"=>$gameName];
			if($sonRateActivity){
				$data["qualification"] = $sonRateActivity->calificacion;
			}
			if($scoreAndHits){
				$data["score"] = $scoreAndHits->puntaje;
				$data["hits"]  = $scoreAndHits->aciertos;
			}
			if(!$scoreAndHits){ //child playes for first time
				$data["score"]         = 0;
				$data["hits"]          = 0;
			}
			if(!$sonRateActivity){
				$data["qualification"] = 0;
			}
			Session::put("idActivity",$activityId);
			$activity  = Activity::find($activityId);
			if($activity){// if object is found in this activity
				$vistos           = (integer)$activity->vistos;//parse to int views
				$activity->vistos = $vistos + 1;
				$activity->save();
			}
			return View::make('child.game-start')->with("game",$data);
		}else{
			//this format error is for developers
			return Response::json(array(
				'status' 		=> 'CU-105',
				'statusMessage' => 'file game not found',
				'message'		=> 'file to get view game, the view game don´t have a file game yet'
	    	));
		}
	}

	private function incrementExp($id, $porc){
      $cant_exp = Son::join('hijos_metas_diarias', 'hijos_metas_diarias.hijo_id', '=', 'hijos.id')
      ->join('metas_diarias', 'hijos_metas_diarias.meta_diaria_id', '=', 'metas_diarias.id')
      ->where('hijos.id', '=', $id)
      ->select('metas_diarias.cant_exp')
      ->get();
      $exp = round($porc * $cant_exp[0]['cant_exp'] / 100);
      DB::table('hijo_experiencia')
      ->where('hijo_id', '=', $id)
      ->increment('cantidad_exp', $exp);
      return $exp;
    }

    private function incrementCoins($id, $experiencia){
      $coins = round($experiencia * 1.5);
      DB::table('hijo_experiencia')
      ->where('hijo_id', '=', $id)
      ->increment('coins', $coins);
      return $coins;
    }
}
