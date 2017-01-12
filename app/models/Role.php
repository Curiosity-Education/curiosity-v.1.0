<?php


use Zizaco\Entrust\EntrustRole;

/**
 *
 */
class Role extends EntrustRole
{
	protected $table="roles";

	/**
	*
	*##Role has user assigned
	*
	*/
	public function AssignedRole(){
		return $this->hasMany('AssignedRole',"role_id");
	}
}


