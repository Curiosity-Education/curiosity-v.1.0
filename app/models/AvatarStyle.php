<?php

class AvatarStyle extends Eloquent{

	protected $table = "avatars_estilos";
  protected $fillable = ['nombre', 'descripcion', 'valor', 'active', 'preview', 'avatars_id', 'is_default'];
  public $timestamps = false;

}
