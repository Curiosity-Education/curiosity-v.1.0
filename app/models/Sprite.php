<?php

/**
 *
 */
class Sprite extends Eloquent
{
  protected $table = "sprites";
  protected $fillable = ['imagen', 'combinacion', 'active', 'item_id', 'secuencia_id'];
}

 ?>
