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
      // $obj = Avatar::join("items_groups", "avatars.id", "=", "items_groups.avatar_id")
      // ->join("items", "items_groups.id", "=", "items.item_group_id")
      // ->join("sprites", "items.id", "=", "sprites.item_id")
      // ->join("secuencias", "sprites.secuencia_id", "=", "secuencias.id")
      // ->where("avatars.id", "=", 1)
      // ->where("avatars.active", "=", 1)
      // ->where("items_groups.active", "=", 1)
      // ->where("items.active", "=", 1)
      // ->where("sprites.active", "=", 1)
      // ->select("sprites.*", "items.ruta")
      // ->get();

      $user		= Auth::user();
		$person 	= Person::where("user_id", "=", $user["id"])->first();
		$child 	= Son::where("persona_id", "=", $person["id"])->first();

      $obj = DB::table("hijos_has_estilos_avatar")
      ->join("estilos_avatar", "hijos_has_estilos_avatar.estilo_avatar_id", "=", "estilos_avatar.id")
      ->join("sprites", "estilos_avatar.id", "=", "sprites.estilo_avatar_id")
      ->where("hijos_has_estilos_avatar.hijos_id", "=", $child->id)
      ->where("hijos_has_estilos_avatar.is_using", "=", 1)
      ->select("sprites.*", "estilos_avatar.folder")
      ->get();

      return $obj;
   }

}


 ?>
