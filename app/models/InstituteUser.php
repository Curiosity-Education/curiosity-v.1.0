<?php
class InstituteUser extends Eloquent{

    protected $table = 'institucion_usuario';

    public function Institute(){
		return $this->belongsTo("Institute");
	}
	public function User(){
		return $this->belongsTo("User");
	}
	public function Son(){
		return $this->belongsTo("Son");
	}
}
