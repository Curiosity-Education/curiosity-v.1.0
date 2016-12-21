<?php
/**
 *
 */
class Renovation extends Eloquent
{
    protected $table = 'renovaciones';
  /*
  *
  ## A Renovation belongs to a membership
  */
    public function Membership(){
        return $this->belongsTo('membresia');
    }

}