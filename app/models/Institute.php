<?php
class Institute extends Eloquent{

    protected $table='instituciones';
    protected $fillable=['nombre','tipo','logo'];
  /*
  *
  ## A institute has many users
  */
    public function User(){
        return $this->hasMany('InstituteUser','institucion_id');
    }
  /*
  *
  ## A una institucion le pertenece una direccion
  */
    public function Address(){
        return $this->belongsTo('Adress');
    }
}
