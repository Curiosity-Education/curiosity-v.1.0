<?php
class Level extends Eloquent{

	protected $table = 'niveles';
	protected $fillable = array('nombre');

	public function Intelligence(){
		return;
	}

}
