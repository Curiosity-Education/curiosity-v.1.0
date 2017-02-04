<?php

/**
 *
 */
class accesoriesController extends BaseController
{
   static function getChildMenuBg(){
      $user    = Auth::user();
      $person  = Person::where("user_id", "=", $user["id"])->first();
      $child   = Son::where("persona_id", "=", $person["id"])->first();
      $bg = Accesorie::join("hijos_has_accesorios", "hijos_has_accesorios.accesorio_id", "=", "accesorios.id")
      ->join("tipos_accesorios", "accesorios.tipo_accesorio_id", "=", "tipos_accesorios.id")
      ->where("tipos_accesorios.id", "=", 3)
      ->where("hijos_has_accesorios.hijo_id", "=", $child->id)
      ->select("accesorios.id as accesorioId", "accesorios.*", "tipos_accesorios.*")
      ->first();
      return $bg;
   }
}


 ?>
