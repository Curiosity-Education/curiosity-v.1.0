<?php
class positionController extends BaseController{

	function all(){
		$pos = Position::all();
		return $pos;
	}

}
?>
