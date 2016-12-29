<?php
class Intelligence extends Eloquent{

	protected $table = 'inteligencias';
	protected $fillable = array('nombre', 'descripcion');
	/*
	 *
	 ## A type of intelligence belongs to a level
	*/
	public function Level(){
		return $this->belongsTo('nivel');
	}
	/*
	 *
	 ## An intelligence may have several blocks
	*/
	public function Block(){
		return $this->hasMany('bloque','inteligencia_id');
	}
}
