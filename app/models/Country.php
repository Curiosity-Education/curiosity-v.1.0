<?php
class Country extends Eloquent{

	protected $table ='paises';
  /*
  *
  ## A country has many states
  */
    public function State(){
        return $this->hasMany('estado');
    }
}
