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
    public function person(){
        return $this->belongsTo('persona');
    }
  /*
  *
  ## an administrative belongs to address
  */
    public function address(){
        return $this->belongsTo('direccion');
    }

	/*
  *
  ## an administartive register many news
  */
	public function news_dad(){
        return $this->hasMany('novedadesPapa');
    }

	public function news_son(){
        return $this->hasMany('novedades_hijo');
    }

}
