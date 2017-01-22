<?php

/**
 *
 */
class spriteController extends BaseController
{

   public function all(){
      $obj = Sprite::where("active", "=", 1)->get();
      return $obj;
   }

   public function getByAvatarForChild(){
      // $data = Input::all();
      $obj = Avatar::join("items_groups", "avatars.id", "=", "items_groups.avatar_id")
      ->join("items", "items_groups.id", "=", "items.item_group_id")
      ->join("sprites", "items.id", "=", "sprites.item_id")
      ->join("secuencias", "sprites.secuencia_id", "=", "secuencias.id")
      ->where("avatars.id", "=", 1)
      ->where("avatars.active", "=", 1)
      ->where("items_groups.active", "=", 1)
      ->where("items.active", "=", 1)
      ->where("sprites.active", "=", 1)
      ->select("sprites.*", "items.ruta")
      ->get();
      return $obj;
   }

}


 ?>
