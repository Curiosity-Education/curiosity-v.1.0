<?php
class childrenDoActivitiesController extends BaseController{
	
	function get(){
		
	}
	function save(){
		if(Request::method()=="POST" && Request::ajax()){
			$datos = Input::all();
			$rules = [
				"socore"	  =>	"required|integer",
				"efficiency"  =>	"required|double",
				"hits"		  =>	"required|integer",
				"mistakes"	  =>	"required|integer",
				"average"	  =>	"required|double"
			];
			$validation = Validator::make($rules,$datos);
			if($validacion->fails()){
				//this format error is for developers
				return Response::json(array(
					'status' 		=> 'CU-103',
					'statusMessage' => 'Inconsistency format data',
					'message'		=> 'this activity hasn´t finish, the data recived dont have a format data set in database',
					"messages"		=> $validacion->messages()
		    	));
			}else{
				//get child current id
				//$idHijo = Auth::User()->persona()->first()->hijo()->pluck('id');
				//get Activity current id
				//$activityId = Session::get('idActivity');
				$childDoActivity               = new ActivityDoneBySon();
				$childDoActivity->puntaje      = $datos["score"];
				$childDoActivity->eficiencia   = $datos["efficiency"];
				$childDoActivity->aciertos     = $datos["hits"];
				$childDoActivity->incorrectos  = $datos["mistakes"];
				$childDoActivity->promedio     = $datos["average"];
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
}
?>