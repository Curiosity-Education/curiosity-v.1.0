<?php
class positionController extends BaseController{

	function all(){
		$pos = Position::where("id", "!=", 1)->get();
		return $pos;
	}

}
?>
