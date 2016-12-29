<?php
class Topic extends Eloquent{

	protected $table='temas';
  protected $fillable=['nombre', 'active', 'bloque_id'];
  /*
  *
  ## A theme can have many activities
  */
    public function Activity(){
        return $this->hasMany('actividad','tema_id');
    }
    public function Block(){
        return $this->belongsTo('bloque');
    }
}
