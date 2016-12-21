<?php
class Address extends Eloquent{
	
	protected $table='direcciones';
  protected $fillable= ['calle','colonia','numero','codigo_postal','ciudad_id'];
  /*
  *
  ## An address has a school
  */
    public function School(){
        return $this->hasOne('escuela','direccion_id');
    }
  /*
  *
  ## An address has a parent
  */
    public function Parents(){
        return $this->hasOne('padre','direccion_id');
    }
  /*
  *
  ## An address has an administrative
  */
    public function Administrative()){
        return $this->hasMany('administrativo','direccion_id');
    }
  /*
  *
  ## An address belongs to a city
  */
    public function City(){
        return $this->belongsTo('ciudad');
    }

}