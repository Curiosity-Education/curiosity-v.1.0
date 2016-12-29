<?php
class Profile extends Eloquent{
	
	protected $table='perfiles';
    public $timestamps=false;
  /*
  *
  ## A profile belongs to a user
  */

   public function User(){
        return $this->belongsTo('User');
    }
}