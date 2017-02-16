<?php

/**
 *
 */
class helperToDbController extends BaseController
{

   function addNewAccesorieToChildren(){
      $children = DB::select("select distinct hijo_id from hijos_has_accesorios;");
      for ($i=0; $i < count($children); $i++) {
         DB::select("insert into hijos_has_accesorios (hijo_id, accesorio_id, is_using) values (".$children[$i]->hijo_id.", 5, 1);");
      }
      return "Registros reaizados exitosamente";
   }

}


 ?>
