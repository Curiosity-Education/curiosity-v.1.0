<?php
class activitiesVideosController extends BaseController{

   function getByActivity(){
      $id = Input::get('data.id');
      $videos = ActivityVideo::join('actividades', 'actividades.id', '=', 'actividades_videos.actividad_id')
      ->join('temas', 'actividades.tema_id', '=', 'temas.id')
      ->join('biblioteca_videos', 'temas.id', '=', 'biblioteca_videos.tema_id')
      ->join('profesores_apoyo', 'biblioteca_videos.profesor_apoyo_id', '=', 'profesores_apoyo.id')
      ->join('escuelas_apoyo', 'profesores_apoyo.escuela_id', '=', 'escuelas_apoyo.id')
      ->where('actividades.id', '=', $id)
      ->where('actividades.active', '=', 1)
      ->where('actividades.estatus', '=', 'eneabled')
      ->where('temas.active', '=', 1)
      ->where('biblioteca_videos.active', '=', 1)
      ->where('profesores_apoyo.active', '=', 1)
      ->where('escuelas_apoyo.active', '=', 1)
      ->select('biblioteca_videos.embed',
      'biblioteca_videos.poster',
      'biblioteca_videos.vistos as saws',
      'temas.nombre as topicName',
      'profesores_apoyo.nombre as teacherFirstName',
      'profesores_apoyo.apellidos as teacherLastName',
      'profesores_apoyo.foto as teacherPhoto',
      'profesores_apoyo.email as teachersEmail',
      'escuelas_apoyo.nombre as schoolName',
      'escuelas_apoyo.logotipo as schoolLogo')
      ->get();
      return $videos;
   }

   public static function save($activity){
      $videos = LibraryVideos::where('tema_id', '=', $activity->tema_id)->get();
      if (count($videos) > 0){
         foreach ($videos as $key => $video) {
            $rel = new ActivityVideo();
            $rel->actividad_id = $activity->id;
            $rel->biblioteca_video = $video->id;
            $rel->save();
         }
      }
   }

}
