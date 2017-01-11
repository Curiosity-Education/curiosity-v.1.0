<?php
class City extends Eloquent{

	protected $table ='ciudades';
  /*
  *
  ## A city can have many directions
  */
    public function Address(){
        return $this->hasMany('direccion','ciudad_id');
    }
  /*
  *
  ## A video belongs to an activity
  */
  public function State(){
      return $this->belongsTo('estado');
  }
}
