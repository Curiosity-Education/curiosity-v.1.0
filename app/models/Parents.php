<?php
class Parents extends Eloquent{
	
	protected $table ='padres';
    protected $fillable =["email","telefono"];

  /*
  *
  ## A parent belongs to a membership
  */
    public function Membership(){
        return $this->belongsTo('membresia');
    }
  /*
  *
  ## A parent can have many children
  */
    public function Son(){
        return $this->hasMany('hijo','padre_id');
    }
  /*
  *
  ## The data of a parent belongs to a person
  */
    public function Person(){
        return $this->belongsTo('persona');
    }
  /*
  *
  ## A parent owns an address
  */
    public function Address(){
        return $this->belongsTo('direccion');
    }
}