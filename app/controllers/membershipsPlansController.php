<?php
class membershipsPlansController extends BaseController{


	public static function pauseMembershipToChildren($idCustomer){
		$membership = Membership::where("token_card", "=", $idCustomer)->first();
		$memp = MembershipPlan::where("membresia_id", "=", $membership->id)->get();
		foreach ($memp as $key => $value) {
			$value->active = 0;
		}
	}


}
?>
