<?php

class RequestPHP {
    const domain = "https://www.curiosity.com.mx";
    public static function _self($url = '',$dataset){

        //inicializamos el objeto CUrl
        $ch = curl_init(self::domain.$url);

        //creamos el json a partir de nuestro arreglo
        $jsonDataEncoded = json_encode($dataset);

        //Indicamos que nuestra petición sera Post
        curl_setopt($ch, CURLOPT_POST, 1);

         //para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Adjuntamos el json a nuestra petición
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        //Agregamos los encabezados del contenido
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        if(curl_errno($ch))
        {
            echo 'Curl error: ' . curl_error($ch);
        }
         //ignorar el certificado, servidor de desarrollo
                  //utilicen estas dos lineas si su petición es tipo https y estan en servidor de desarrollo
         //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                 //curl_setopt($process, CURLOPT_SSL_VERIFYHOST, FALSE);

        //Ejecutamos la petición
        $result = curl_exec($ch);
        var_dump( $result );
        return;
    }
}
