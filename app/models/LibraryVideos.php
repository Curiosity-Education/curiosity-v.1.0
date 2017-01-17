<?php

class LibraryVideos extends Eloquent
{
	protected $table='biblioteca_videos';

	public function ActivityVideo(){
		return $this->hasMany('ActivityVideo','biblioteca_video_id');
	}
}
