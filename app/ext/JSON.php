<?php

class JSON{

    public function __construct(){

    }

    public static function save($data = array(),$pathFile){
        if(!file_exists($pathFile))
        {
            $permission = "x+";
        }
        else{
            $permission = "a+";
        }

        $dataToJson = json_encode($data);

        if($archivo = fopen($pathFile, $permission))
        {
            if(file_put_contents($pathFile,$dataToJson))
            {
                return Response::json(["status"=>200,"statusMessage"=>"success"]);
            }
            else
            {
                return Response::json(["status"=>500,"statusMessage"=>"Server Error"]);
            }

            fclose($archivo);
        }
    }
    public function get($ruta){

        if(file_exists($ruta))
            return file_get_contents($ruta);
        else
            return Response::json(["status"=>404,"statusMessage"=>"Not found"]);
    }
}
