<?php

/**
 *
 */
class itemGroupsController extends BaseController
{

   public function all(){
      $obj = ItemGroup::where("active", "=", 1)->get();
      return $obj;
   }

   public function getByAvatarForChild(){
      // $data = Input::all();
      $obj = Avatar::join("items_groups", "avatars.id", "=", "items_groups.avatar_id")
      ->where("avatars.id", "=", 1)
      ->where("avatars.active", "=", 1)
      ->where("items_groups.active", "=", 1)
      ->get();
      return $obj;
   }

}


 ?>
