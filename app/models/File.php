<?php
class File extends Eloquent{
	
	protected $table='archivos';
  protected $fillable = ['archivos'];
  /*
  *
  ## A file belongs to an activity
  */
  public function Activity(){
      return $this->belongsTo('actividad');
  }
}