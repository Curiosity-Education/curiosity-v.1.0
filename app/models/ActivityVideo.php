<?php

class ActivityVideo extends Eloquent
{
   protected $table='actividades_videos';
   public $timestamps = false;

	public function LibraryVideos(){
		return $this->belongsTo('LibraryVideos');
	}
	public function Activity(){
		return $this->belongsTo('Activity');
	}

}
