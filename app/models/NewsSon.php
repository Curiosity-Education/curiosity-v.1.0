<?php 
class NewsSon extends Eloquent{
	
	protected $table='novedades_hijo';
	protected $fillable = ['titulo', 'uri', 'status', 'administrativo_id'];



	/*A novelty is registered by an administrative */
	public function Administrative(){
		return $this->belongsTo('administrativo');
	}
}