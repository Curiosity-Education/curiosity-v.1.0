<?php
class State extends Eloquent{

	protected $table='estados';
  /*
  *
  ## Un estado puede tiene muchas ciudades
  */
    public function City(){
        return $this->hasMany('ciudad','estado_id');
    }
  /*
  *
  ## Un estado pertenece a una pais
  */
    public function Country(){
        return $this->belongsTo('pais');
    }
}
