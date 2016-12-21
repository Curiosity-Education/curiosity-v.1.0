<?php


/**
 *
 */
class Avatar extends Eloquent
{
  protected $table = "avatars";
  protected $fillable = ['nombre', 'historia', 'sexo', 'active'];
  public $timestamps = false;
}



?>
