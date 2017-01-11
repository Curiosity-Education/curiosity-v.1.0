<?php
class sonRatesActivitiesController extends BaseController{

	public function save(){
		if(Request::method()=="POST"){
			$data  = Input::all();
			$rules = [
				"qualification"	=> "required|decimal"
			];
			$validation = Validator::make($data,$rules);
			if($validation->fails()){
				//this format error is for developers
				return Response::json(array(
					'status' 		=> 'CU-103',
					'statusMessage' => 'Inconsistency format data',
					'message'		=> 'this activity hasn´t qualified, the data recived dont have a format data set in database',
					"messages"		=> $validation->messages()
		    	));
			}else{
				//get child current id
				//$idHijo = Auth::User()->persona()->first()->hijo()->pluck('id');
				//get Activity current id
				//$activityId = Session::get('idActivity');
				//comparate if this child has qualified this activity
				$sonRateActivity = SonRatesActivity::where("hijo_id","=","27")
													->where("actividad_id","=","8")
													->first();
				if($sonRateActivity){
					$sonRateActivity->calificacion = $data["qualification"];
					$sonRateActivity->save();
				}else{
					$sonRateActivity = new SonRatesActivity();
					$sonRateActivity->calificacion = $data["qualification"];
					$sonRateActivity->hijo_id      = 27;
					$sonRateActivity->actividad_id = 8;
					$sonRateActivity->save();
				}
				//this format message is for user
				return Response::json(array(
					'status' 		=>  200,
					'statusMessage' => 'success',
					'message'		=> 'Actividad Calificada, Bien echo!!'
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
	public function find(){
		if(Request::method()=="POST"){
			//find for post
		}else{//request method get
			//find for get

			//get child current id
			//$idHijo = Auth::User()->persona()->first()->hijo()->pluck('id');
			//get Activity current id
			//$activityId = Session::get('idActivity');
			//comparate if this child has qualified this activity
			$sonRateActivity = SonRatesActivity::where("hijo_id","=","27")
												->where("actividad_id","=","8")
												->first();
			if($sonRateActivity){
				//this format message is for developer
				return Response::json(array(
					'status' 		=>  200,
					'statusMessage' => 'success',
					'message'		=> 'Esta actidad ya ha sido calificada',
					'data'			=>  $sonRateActivity->calificacion
		    	));
			}else{
				//this format message is for developer
				return Response::json(array(
					'status' 		=>  200,
					'statusMessage' => 'success',
					'message'		=> 'Esta actidad ya ha sido calificada',
					'data'			=>  0
		    	));
			}
		}
	}
}