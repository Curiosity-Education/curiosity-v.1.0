<?php


/**
 *
 */
class Sequence extends Eloquent
{
  protected $table = "secuencias";
  protected $fillable = ['sprite', 'active', 'avatar_estilo_id', 'tipo_secuencia_id'];
  public $timestamps = false;
}



 ?>
