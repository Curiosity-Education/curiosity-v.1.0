<?php


/**
 *
 */
class AvatarStyle extends Eloquent
{
  protected $table = "estilos_avatar";
  protected $fillable = ['nombre', 'active', 'costo', 'preview', 'is_default', 'avatar_id', 'folder'];
}
