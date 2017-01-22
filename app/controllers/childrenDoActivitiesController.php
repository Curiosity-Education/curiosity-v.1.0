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
					'status' 		=> 'CU-103',
					'statusMessage' => 'Inconsistency format data',
					'message'		=> 'this activity hasn´t finish, the data recived dont have a format data set in database',
					"messages"		=> $validation->messages()
		    	));
			}else{
				//get child current id
				//$idHijo = Auth::User()->persona()->first()->hijo()->pluck('id');
				//get Activity current id
				//$activityId = Session::get('idActivity');
				$childDoActivity               = new ActivityDoneBySon();
				$childDoActivity->puntaje      = $data["score"];
				$childDoActivity->eficiencia   = $data["efficiency"];
				$childDoActivity->aciertos     = $data["hits"];
				$childDoActivity->incorrectos  = $data["mistakes"];
				$childDoActivity->promedio     = $data["average"];
				$childDoActivity->hijo_id      = 27;
				$childDoActivity->actividad_id = 8;
				$childDoActivity->save();
				//this format message is for user
				return Response::json(array(
					'status' 		=>  200,
					'statusMessage' => 'success',
					'message'		=> 'Actividad finalizado, Bien echo!!'
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
	public function getGame(){
		//get child current id
		//$idHijo = Auth::User()->persona()->first()->hijo()->pluck('id');
		//get Activity current id
		//$activityId = Session::get('idActivity');
		$activityId     = 9;
		$file           =  File::where('actividad_id','=',$activityId)->where('active','=',"1")->select('*')->first();
        $scoreAndHits   = ActivityDoneBySon::where('actividad_id','=',$activityId)
                              ->where('hijo_id','=',27)
                              ->where('puntaje','=',ActivityDoneBySon::max('puntaje'))
                              ->select('puntaje','aciertos')
                              ->first();
		$sonRateActivity = SonRatesActivity::where("hijo_id","=","27")
									->where("actividad_id","=","$activityId")
									->first();
        $data = ["folder"=>$file->carpeta];
		if($sonRateActivity){
			$data["qualification"] = $sonRateActivity->calificacion;
		}
		if($scoreAndHits){
			$data["score"] = $scoreAndHits->puntaje;
			$data["hits"]  = $scoreAndHits->aciertos;
		}
		if(!$scoreAndHits && !$sonRateActivity){ //child playes for first time
			$data["score"]         = 0;
			$data["qualification"] = 0;
			$data["hits"]          = 0;
		}
		return View::make('child.game-start')->with("data",$data);
	}
}