<?php
class Topic extends Eloquent{
	
	protected $table='temas';
  protected $fillable=['nombre','estatus','active','descripcion', 'bloque_id', 'bg_color', 'isPremium'];
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