<?php
class ParentNew extends Eloquent{

	protected $table='novedades_papa';
	  protected $fillable = ['titulo', 'pdf', 'status', 'administrativo_id'];

	/* A novelty is registered by an administrative */
	public function Administrative(){
		return $this->belongsTo('administrativo');
	}

}
