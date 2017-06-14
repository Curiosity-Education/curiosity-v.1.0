<?php

/**
 *
 */
class secuenceController extends BaseController
{

   public function all(){
      $obj = Secuence::all();
      return $obj;
   }

}


 ?>
