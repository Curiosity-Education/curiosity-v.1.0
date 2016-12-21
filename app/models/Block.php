<?php
/**
 *
 */
class Block extends Eloquent
{
    protected $table ='bloques';
    protected $fillable=['nombre','estatus','active','descripcion', 'bg_color', 'imagen', 'inteligencia_id'];
  /*
  *
  ## Block belongs to a intelligence
  */
    public function Intelligence(){
        return $this->belongsTo('inteligencia');
    }
  /*
  *
  ## A block can to have many topics
  */
    public function Topic(){
        return $this->hasMany('tema','bloque_id');
    }
}
