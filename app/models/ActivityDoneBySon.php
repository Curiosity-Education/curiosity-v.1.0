<?php
class ActivityDoneBySon extends Eloquent{

	protected $table ='hijo_realiza_actividades';
    protected $fillable =['puntaje','eficiencia','promedio','aciertos','incorrectos'];
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
