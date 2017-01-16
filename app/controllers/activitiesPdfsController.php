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

}
