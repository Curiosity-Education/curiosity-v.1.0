<?php

/**
 *
 */
class Item extends Eloquent
{
  protected $table = "items";
  protected $fillable = ['preview', 'costo', 'ruta', 'active', 'item_group'];
}

 ?>
