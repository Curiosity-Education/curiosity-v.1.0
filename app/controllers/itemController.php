<?php

/**
 *
 */
class itemController extends BaseController
{

   public function all(){
      $obj = Item::where("active", "=", 1)->get();
      return $obj;
   }

}


 ?>
