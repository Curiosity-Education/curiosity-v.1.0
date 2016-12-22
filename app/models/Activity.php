<?php

class Activity extends Eloquent
{
    protected $table='actividades';
    protected $fillable=['nombre','objetivo','estatus','active', 'tema_id', 'bg_color', 'imagen', 'pdf'];
  /*
  *
  * An activity has a video
  */
    public function Video(){
        return $this->hasOne('video','actividad_id');
    }
  /*
  *
  ## An activity has a file
  */
    public function File(){
        return $this->hasOne('archivo','actividad_id');
    }
  /*
  *
  *  An activity can be done by many children
  */
    public function ActivityDoneBySon(){
        return $this->hasMany('hijo_realiza_actividad','actividad_id');
    }
  /*
  *
  ## An activity belongs to topic
  */
    public function Topic(){
        return $this->belongsTo('tema');
    }
}
