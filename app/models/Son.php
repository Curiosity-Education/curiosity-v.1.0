<?php
class Son extends Eloquent{

	protected $table = 'hijos';

  /*
  *
  ## The data of a person belongs to a child
  */
    public function Person(){
        return $this->belongsTo('Person');
    }
  /*
  *
  ## A son belongs to a school
  */
    public function School(){
        return $this->belongsTo('School');
    }
  /*
  *
  ## Un hijo realiza muchas actividades
  */
    public function ActivityDoneBySon(){
        return $this->hasMany('hijo_realiza_actividad');
    }
  /*
  *
  ## A son carries out many activities
  */
    public function Parents(){
        return $this->belongsTo('padre');
    }
}
