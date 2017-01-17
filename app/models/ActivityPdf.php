<?php

class ActivityPdf extends Eloquent{
   protected $table='actividades_pdfs';
   public $timestamps = false;

    public function LibraryPdfs(){
		return $this->belongsTo('LibraryPdfs');
    }

	public function Activity(){
		return $this->belongsTo('Activity');
	}
}
