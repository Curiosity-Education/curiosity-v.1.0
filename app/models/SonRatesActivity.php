<?php 
class SonRatesActivity extends Eloquent{
	
	protected $table ='hijo_califica_actividades';
    public $timestamps = false;
  /*
  *
  ## An activity can be done by many children
  */
    public function Son(){
        return $this->belongsTo('hijo');
    }
  /*
  *
  ## An activity can be done by many children
  */
    public function Activity(){
        return $this->belongsTo('actividad');
    }

	
}