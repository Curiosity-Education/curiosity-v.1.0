<?php
class sonRatesActivitiesController extends BaseController{
  public function save(){
    if(Request::method()=="POST"){
      $data  = Input::all();
      $rules = [
        "qualification" => "required|decimal"
      ];
      $validation = Validator::make($data,$rules);
      if($validation->fails()){
        //this format error is for developers
        return Response::json(array(
          'status'    => 'CU-103',
          'statusMessage' => 'Inconsistency format data',
          'message'   => 'this activity hasn´t qualified, the data recived dont have a format data set in database',
          "messages"    => $validation->messages()
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
          'status'    =>  200,
          'statusMessage' => 'success',
          'message'   => 'Actividad Calificada, Bien echo!!'
        ));

      }
    }else{
      //this format error is for developers
      return Response::json(array(
        'status'    => 'CU-103',
        'statusMessage' => 'send format wrong',
        'message'   => 'the send formt is wrong, the send format should be POST and ajax'
      ));
    }
  }
  public function find(){
    if(Request::method()=="POST"){
      //find for post
      //get child current id
      //$idHijo = Auth::User()->persona()->first()->hijo()->pluck('id');
      //get Activity current id
      //$activityId = Session::get('idActivity');
      //comparate if this child has qualified this activity
      $socreAndHits = ActivityDoneBySon::where('actividad_id','=',8)
                                      ->where('hijo_id','=',27)
                                      ->where('puntaje','=',ActivityDoneBySon::max('puntaje'))
                                      ->select('puntaje','aciertos')
                                      ->first();
      //get video information
      $dataVideos   = DB::select("select bv.id,bv.embed,bv.poster,bv.vistos,t.nombre,pa.nombre profesor,ea.nombre escuela from actividades a 
join actividades_videos av on a.id = av.actividad_id 
join biblioteca_videos bv on av.biblioteca_video_id = bv.id
join profesores_apoyo pa on pa.id = bv.profesor_apoyo_id
join escuelas_apoyo ea on pa.escuela_id = ea.id
join temas t on bv.tema_id = t.id
where a.active = 1 and a.id = 8;");/*table('biblioteca_videos')
                      ->join('actividades_videos','actividades_videos.biblioteca_video_id','=','biblioteca_videos.id')
                      ->join('actividades','actividades.id','=','actividades_videos.actividad_id')
                      ->join('profesores_apoyo','profesores_apoyo.id','=','biblioteca_videos.profesor_apoyo_id')
                      ->join('escuelas_apoyo','escuelas_apoyo.id','=','profesores_apoyo.escuela_id')
                      ->join('temas','temas.id','=','biblioteca_videos.tema_id')
                      ->where('actividades.id','=','18')
                      ->where('actividades.active','=','1')
                      ->select('biblioteca_videos.id','biblioteca_videos.embed','biblioteca_videos.poster','biblioteca_videos.vistos','temas.nombre','profesores_apoyo.nombre','escuelas_apoyo.nombre')
                      ->get();*/
      //get pdf information
      $dataPdfs     = DB::table('biblioteca_pdfs')
                      ->join('actividades_pdfs','actividades_pdfs.biblioteca_archivo_id','=','biblioteca_pdfs.id')
                      ->join('actividades','actividades.id','=','actividades_pdfs.actividad_id')
                      ->join('temas','temas.id','=','biblioteca_pdfs.tema_id')
                      ->where('actividades.id','=','8')
                      ->where('actividades.active','=','1')
                      ->select('biblioteca_pdfs.id','biblioteca_pdfs.nombre','biblioteca_pdfs.nombre_real','biblioteca_pdfs.vistos','temas.nombre as tema')
                      ->orderBy('biblioteca_pdfs.vistos','desc')
                      ->get();
      //this format message is for developer
      return Response::json(array(
        'status'    =>  200,
        'statusMessage' => 'success',
        'message'   => 'Data activity get successfull',
        'data'      =>  ["score"=>$socreAndHits,"videos"=>$dataVideos,"pdf"=>$dataPdfs]
      ));

    }else{//request method get
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
