<?php


/**
 *
 */
class Children extends Eloquent
{
  protected $table = "children";
  protected $fillable = ['nombre', 'apellidos', 'foto', 'sexo', 'institucion_id', 'apadrinado', 'hobby', 'ser_grande'];
}



?>
