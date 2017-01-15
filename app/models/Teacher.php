<?php
/**
 *
 */
class Teacher extends Eloquent
{
    protected $table = 'profesores_apoyo';
    protected $fillable =['nombre','apellido_paterno','apellido_materno','email','gustos','foto','active', 'escuela_id'];
  /*
  *
  ## A teacher can have many videos
  */
    public function Video(){
        return $this->hasMany('video','profesor_id');
    }
  /*
  *
  ## A teacher belongs to a school
  */
    public function School(){
        return $this->belongsTo('escuela');
    }
}
