<?php


class AssignedRole extends Eloquent
{
	protected $table="assigned_role";

	public function User(){
		return $this->belongsTo('User');
	}

	public function Role(){
		return $this->belongsTo('Role');
	}

}
