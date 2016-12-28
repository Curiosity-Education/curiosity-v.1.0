<?php
class School extends Eloquent{
	
	 protected $table='escuelas';
    protected $fillable=['nombre','web','logotipo','active'];
  /*
  *
  ## Una escuela tiene muchos hijos
  */
    public function Son(){
        return $this->hasMany('hijo','escuela_id');
    }
  /*
  *
  ## A una escuela le pertenece una direccion
  */
    public function Address(){
        return $this->belongsTo('direccion');
    }
  /*
  *
  ## Una escuela tiene muchos profesores
  */
    public function Teacher(){
        return $this->hasMany('profesor','escuela_id');
    }
}