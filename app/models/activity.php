<?php

class activity extends Eloquent
{
    protected $table='actividades';
    protected $fillable=['nombre','objetivo','estatus','active', 'tema_id', 'bg_color', 'imagen', 'pdf'];
  /*
  *
  * An activity has a video
  */
    public function video(){
        return $this->hasOne('video','actividad_id');
    }
  /*
  *
  ## An activity has a file
  */
    public function file(){
        return $this->hasOne('archivo','actividad_id');
    }
  /*
  *
  *  An activity can be done by many children
  */
    public function activity_done_by_son(){
        return $this->hasMany('hijo_realiza_actividad','actividad_id');
    }
  /*
  *
  ## An activity belongs to topic
  */
    public function topic(){
        return $this->belongsTo('tema');
    }
}
