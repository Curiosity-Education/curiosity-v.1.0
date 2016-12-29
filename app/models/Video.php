<?php
/**
 *
 */
class Video extends Eloquent{
  protected $table="videos";
  protected $fillable=array('code_embed', 'profesores_id');
  /*
  *
  ## A video belongs to an activity
  */
  public function Activity(){
      return $this->belongsTo('actividad');
  }
  /*
  *
  ## A video belongs to a teacher
  */
  public function Teacher(){
      return $this->belongsTo('profesor');
  }


}