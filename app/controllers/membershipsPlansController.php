<?php
class membershipsPlansController extends BaseController{


	public static function pauseMembershipToChildren($idCustomer = "cus_2fujktnVV5ZnpovBJ"){
		$membership = Membership::where("token_card", "=", "cus_2fujktnVV5ZnpovBJ")->first();
		$memp = MembershipPlan::where("membresia_id", "=", $membership->id)->get();
		foreach ($memp as $key => $value) {
			$value->active = 0;
		}
	}


}
?>
