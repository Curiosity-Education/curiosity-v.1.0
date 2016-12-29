<?php 
class Level extends Eloquent{
	
	protected $table = 'niveles';
  protected $fillable = array('nombre', 'estatus', 'active', 'descripcion', 'bg_color', 'imagen');

  public function Intelligence(){
    return;
  }
}