<?php
/**
 *
 */
class Plan extends Eloquent
{
    protected $table='planes';
    protected $fillable=['name','amount','currency','interval','active'];
  /*
  *
  ## A plan has a membership
  */
  public function MembershipPlan(){
  	return $this->hasMany("membresia_plan","plan_id");
  }
}
