<?php
class instituteMembershipsController extends BaseController{
    //protected institute = null;
    //protected name = is_null($this->institute) ? 'inst' : $this->institute->nombre;
    private function createUserName($folio){
        /*
        *    Nomenclature for username will be :
        *
        *    [name institute(The First 3 letters)] + [user-] + [folio (0-9)]
        */
        return substr($this->name,1,3).'user-'.$folio;
    }
    private function createPassUser(){
        /*
        *    Nomenclature for password will be :
        *
        *    [name institute(The First 3 letters)] + [folio (A-Z0-9){4}]
        */
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $lengthCadena=strlen($cadena);
        $pass = substr($this->name,1,3);
        $lengthFolio=4;
        for($i=1 ; $i<=$lengthFolio ; $i++){
            $pos=rand(0,$lengthCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }

    function getHomes(){

         $housesHomes = DB::table('instituciones')
            ->join('direcciones','instituciones.direccion_id','=','direcciones.id')
            ->join('ciudades','direcciones.ciudad_id','=','ciudades.id')
            ->where('instituciones.tipo','=','Casa Hogar')
            ->select('instituciones.*')
            ->get();

        $ninos = Institute::all();

        return View::make('landing.home_children',array('casasHogares' => $housesHomes, 'niños' => $ninos));

    }
}
