<?php

/**
 *
 */
class Sprite extends Eloquent
{
  protected $table = "sprites";
  protected $fillable = ['imagen', 'active', 'secuencia_id', 'heightFrame', 'widthFrame', 'framesX', 'framesY', 'fps', 'estilo_avatar_id'];
}

 ?>
