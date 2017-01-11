<?php
/**
 *
 */
class Administrative extends Eloquent
{
    protected $table='administrativos';
  /*
  *
  ## an adminitrative belongs to person
  */
    public function Person(){
        return $this->belongsTo('persona');
    }
  /*
  *
  ## an administrative belongs to address
  */
    public function Address(){
        return $this->belongsTo('direccion');
    }

	/*
  *
  ## an administartive register many news
  */
	public function NewsDad(){
        return $this->hasMany('novedadesPapa');
    }

	public function NewsSon(){
        return $this->hasMany('novedades_hijo');
    }

}
