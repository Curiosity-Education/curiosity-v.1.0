<?php
class filesController extends BaseControllers{
	
	public static function findExtension($file){
        $trozos = explode(".", $file);
        $extension = end($trozos);
        // mostramos la extensión del archivo
        return  $extension;
    }
    public static function moveFile($dirCurrent,$newDir){
        rename($dirCurrent,$newDir);
    }
}
?>
