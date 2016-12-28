<?php 
class MembershipPlan extends Eloquent{
	
	 protected $table = 'membresias_planes';
    public $timestamps =false;

    public function Membership(){
		return $this->belongsTo("membresia");
	}
	public function Plan(){
		return $this->belongsTo("plan");
	}
	public function Son(){
		return $this->belongsTo("hijo");
	}
}