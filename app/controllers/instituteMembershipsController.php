<?php
class instituteMembershipsController extends BaseController{
    
    //protected $institute = null;
    //protected $name = (is_null($this->institute)) ? 'inst' : $this->institute->nombre;

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
    public function render($id){
        //get data from institutions
        $ints = Institute::join("direcciones","direcciones.id","=","instituciones.direccion_id")
                        ->join("ciudades","ciudades.id","=","direcciones.ciudad_id")
                        ->where("instituciones.active","=","1")
                        ->where("instituciones.id","=",$id)
                        ->select("instituciones.nombre","tipo","logo","calle","colonia","numero","codigo_postal","ciudades.nombre as ciudad")
                        ->first();
       // $this->institute = $ints;
        if($ints){
            //Get users from institutions
            $ints->usuarios = User::join("institucion_usuario","institucion_usuario.user_id","=","users.id")
                            ->join("instituciones","instituciones.id","=","institucion_usuario.institucion_id")
                            ->where("institucion_usuario.active","=","1")
                            ->where("instituciones.active","=","1")
                            ->where("users.active","=","1")
                            ->where("instituciones.id","=",$id)
                            ->select("users.*","institucion_usuario.folio")
                            ->get();
            return View::make("administer.admin-schools-membership")->with("data",$ints);
        }else{
            return View::make("errors.404");
        }
    }
}
