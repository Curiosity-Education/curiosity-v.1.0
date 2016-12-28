<?php
class Membership extends Eloquent{
	
	protected $table ='membresias';
    protected $fillable=['token_card','fecha_registro','active','padre_id'];
  /*
  *
  ## A membership can have many renovations
  */
    public function Renovation(){
        return $this->hasMany('renovacion','membresia_id');
    }
  /*
  *

  ## A parent has a membership
  */
    public function Parents(){
        return $this->hasOne('padre','membresia_id');
    }
    public function MembershipPlan(){
      return $this->hasMany("membresia_plan","membresia_id");
    }
}