<?php
class activitiesPdfsController extends BaseController{

   function getByActivity(){
      $id = Input::get('data.id');
      $pdfs = ActivityPdf::join('actividades', 'actividades.id', '=', 'actividades_videos.actividad_id')
      ->join('temas', 'actividades.tema_id', '=', 'temas.id')
      ->join('biblioteca_pdfs', 'temas.id', '=', 'biblioteca_pdfs.tema_id')
      ->where('actividades.id', '=', $id)
      ->where('actividades.active', '=', 1)
      ->where('actividades.estatus', '=', 'eneabled')
      ->where('temas.active', '=', 1)
      ->where('biblioteca_pdfs.active', '=', 1)
      ->select('biblioteca_videos.embed',
      'biblioteca_pdfs.nombre as pdfName',
      'biblioteca_pdfs.nombre_real as pdfRealName',
      'biblioteca_pdfs.vistos as pdfSaws',
      'temas.nombre as topicName')
      ->get();
      return $pdfs;
   }

   public function getPdfs(){
      if(Request::method()=="GET"){
         $pdfs = DB::table('actividades')
                     ->join('actividades_pdfs','actividades.id','=','actividades_pdfs.acvidad_id')
                     ->join('biblioteca_pdfs','actividades_pdfs.biblioteca_archivo_id','=','biblioteca_pdfs.id')
                     ->select('biblioteca_pdfs.*')
                     ->get();
         //this format message is for user
         return Response::json(array(
            'status'        =>  200,
            'statusMessage' => 'success',
            'message'       => 'Bien hecho, datos obtenidos correctamente!',
            'data'          =>  $pdfs
         ));
      }else{
          //this format error is for developers
         return Response::json(array(
           'status'        => 'CU-107',
           'statusMessage' => 'Request method not allowed',
           'message'       => 'the send formt is wrong, the send format should be GET'
         ));
      }
   }

   public static function saveFromActivity($activity){
      $pdfs = LibraryPdfs::where('tema_id', '=', $activity->tema_id)->get();
      if (count($pdfs) > 0){
         foreach ($pdfs as $key => $pdf) {
            $rel = new ActivityPdf();
            $rel->actividad_id = $activity->id;
            $rel->biblioteca_archivo_id = $pdf->id;
            $rel->save();
         }
      }
   }

   public static function saveFromLibrary($pdf){
      $acts = Topic::join("actividades", "temas.id", "=", "actividades.tema_id")
      ->where('temas.id', '=', $pdf->tema_id)->get();
      if (count($acts) > 0){
         foreach ($acts as $key => $act) {
            $rel = new ActivityPdf();
            $rel->actividad_id = $act->id;
            $rel->biblioteca_archivo_id = $pdf->id;
            $rel->save();
         }
      }
   }
   public function updateViews(){
      $data  = Input::all();
      $rules = [
         "pdfs"   => "required"
      ];

      $validation = Validator::make($data,$rules);
      if($validation->fails()){
         //this format error is for developers
         return Response::json(array(
            'status'       => 'CU-104',
            'statusMessage' => 'Inconsistency format data',
            'message'      => 'this activity hasn´t finish, the data recived dont have a format data set in database',
            "messages"     => $validation->messages()
         ));
      }else{
         $activityId = Session::get("idActivity");
         $dataPdfs = DB::table('biblioteca_pdfs')
                ->join('actividades_pdfs','actividades_pdfs.biblioteca_archivo_id','=','biblioteca_pdfs.id')
                ->join('actividades','actividades.id','=','actividades_pdfs.actividad_id')
                ->join('temas','temas.id','=','biblioteca_pdfs.tema_id')
                ->where('actividades.id','=',$activityId)
                ->where('actividades.active','=','1')
                ->select('biblioteca_pdfs.id','biblioteca_pdfs.nombre','biblioteca_pdfs.nombre_real','biblioteca_pdfs.vistos','temas.nombre as tema')
                ->orderBy('biblioteca_pdfs.vistos','desc')
                ->get();
         if(count($data) == count($dataPdfs)){//check the data was same
            for($i = 0; $i<count($data); $i++){
               if($data[$i]->vistos != $dataPdfs[$i]->vistos && $data[$i]->vistos > $dataPdfs->vistos){//in this case update vistos en database
                  $pdf = LibraryPdfs::find($dataPdfs[$i]->id); 
                  if($pdf){
                     $pdf->vistos = $data[$i]->vistos;
                     $pdf->save();
                  }
               }
            }
            //this format message is for user
            return Response::json(array(
               'status'       =>  200,
               'statusMessage' => 'success',
               'message'      =>  'Datos actualizados correctamente,Bien hecho!!'
            ));
         }
      }
   }

}
