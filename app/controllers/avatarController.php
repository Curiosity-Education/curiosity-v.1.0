<?php

/**
 *
 */
class avatarController extends BaseController
{

   public function all(){
      $avatars = Avatar::where("active", "=", 1)->get();
      return $avatars;
   }

   public function getForChild(){
      $avatars = Avatar::where("active", "=", 1)
      ->where("id", "=", 1)
      ->first();
      return $avatars;
   }



}


 ?>
