<?php
/**
 *
 */
class Curiosity{

   private static $_curiosity;

   public static function singleton(){
      if (self::$_curiosity) { return self::$_curiosity; }
      else {
         $class = __CLASS__;
         self::$_curiosity = new $class();
         return self::$_curiosity;
      }
   }

   public static function getValidationMessages(){
      $curiosity = self::singleton();
      $messages = [
             "required"    =>  "Este campo :attribute es requerido",
             "alpha"       =>  "Solo puedes ingresar letras",
             "date"        =>  "Formato de fecha invalido",
             "numeric"     =>  "Solo se permiten digitos",
             "email"       =>  "Ingresa un formato de correo valido",
             "unique"      =>  "Este usuario ya existe",
             "integer"     =>  "Solo se permiten numeros enteros",
             "exists"      =>  "El campo :attribute no existe en el sistema",
             "unique"      =>  "El campo :attribute no esta disponible intente con otro valor",
             "integer"     =>  "Solo puedes ingresar numeros enteros",
             "same"        =>  "Las contraseñas no coinciden",
             "after"       =>  "La fecha de expiracion es incorrecta, no puedes ingresar fechas inferiores al día de hoy",
       ];
       return $messages;
   }

   public static function makeRandomName($rand = false, $date = false){
      $curiosity = self::singleton();
      $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
      $limit = 5;
		$word = "";
		for($i=0; $i < $limit; $i++) { $word .= substr($characters, rand(0, strlen($characters)), 1); }
      if ($rand) { $word."_".rand(); }
      if ($date) { $word."_".date("y").date("m").date("d"); }
		return $word;
   }

   public static function extractZip($inputFile, $typeAndFolder = [], $boolean = 'yes'){
      $curiosity = self::singleton();
      try{
         if($inputFile != null){
            // is the zip file type?
            if($inputFile->getClientOriginalExtension() == 'zip'){
               // We'll save the name in the var $log
               $log = $inputFile->getClientOriginalName();
               // ask in one conditional if the folder exists
               if(!file_exists(public_path()."/packages/saveFilesZipTemp/")){
                  $dirTempJuegoZip = mkdir(public_path()."/packages/saveFilesZipTemp/");
               }
               // Save the directory to save the zip files
               $directoryPath = public_path()."/packages/saveFilesZipTemp/";
               // save the file into var $file
               $file = $inputFile;
               // move the file to the $directoryPath
               $file->move($directoryPath, $log);
               // the var $routeZIP is the route of Zip
               $routeZIP = $directoryPath.$log;
               // Extract the file in the route into parameter
               $extraccion = $this->extractFile($routeZIP, $typeAndFolder, $boolean);
               if($extraccion[0] == true){
                  return $extraccion;
               }
               else {
                  return false;
               }
            }
            else{
               return false;
            }
         }
         else{
            return false;
         }
      }
      catch(Exception $ex){
         return Response::json(array(0=>'ERROR: '.$ex));
      }
   }

   public static function getFileExtension($file = ""){
      $curiosity = self::singleton();
      if ($file != ""){
         $parts = explode(".", $file);
         $ext = end($parts);
         return $ext;
      }
      else{
         return null;
      }
   }

   public static function bubleSortObject($array = [], $attr = "", $asc = false){
      for ($e=0; $e < count($array); $e++) {
         if (!$asc){
            for ($izq=0; $izq < (count($array) - $e); $izq++) {
               $der = $izq + 1;
               if ($array[$izq][$attr] < $array[$der][$attr]){
                  $objTemp = $array[$izq];
                  $array[$izq] = $array[$der];
                  $array[$der] = $objTemp;
               }
            }
         }
         else{
            for ($izq=0; $izq < (count($array) - $e); $izq++) {
               $der = $izq + 1;
               if ($array[$izq][$attr] < $array[$der][$attr]){
                  $objTemp = $array[$izq];
                  $array[$izq] = $array[$der];
                  $array[$der] = $objTemp;
               }
            }
         }
      }
      return $array;
   }

   // ===========================================================
   // Above this comment only private functions
   // ===========================================================

   private function run_route($route, $typeAndFolder, $boolean){
      $curiosity = self::singleton();
      $filesSaved = [];
      // open a directory and list it
      // the route is a directory?
      if (is_dir($route)) {
         // open the directory
         if ($dh = opendir($route)) {
            // while the directory can be readeable
            while (($file = readdir($dh)) !== false) {
               // this line can be used if we want to list the files into directory
               if (!is_dir($route . $file) && $file!="." && $file!=".."){
                  // if the file is only distinct that "." and ".."
                  // we found the extension
                  foreach ($typeAndFolder as $type => $directory) {
                     if ($type == $this->getFileExtension($file)){
                        if ($boolean == 'yes'){
                           $fileName = $this->makeRandomName(true, true).".".$this->getFileExtension($file);
                        }
                        else if ($boolean == 'not'){
                           $fileName = $file;
                        }
                        else if ($boolean == 'both'){
                           $fileName = $file."-".$this->makeRandomName(true, true).".".$this->getFileExtension($file);
                        }
                        $this->moveFile($route.$file, public_path().$directory.$fileName);
                        array_push($filesSaved, array(
                           'name' => $fileName,
                           'route' => $directory,
                           'type' => $type
                        ));
                     }
                  }
               }
            }
            closedir($dh);
            return $filesSaved;
         }
      }else{
         return null;
      }
   }

   private function extractFile($routeZIP, $typeAndFolder, $boolean){
      $curiosity = self::singleton();
      // create a ZipArchive Object
      $enzipado = new ZipArchive();
      // Open the file
      $enzipado->open($routeZIP);
      if(!file_exists(public_path()."/packages/zipFilesTemp/")){
         $Zipdescompress = mkdir(public_path()."/packages/zipFilesTemp/");
      }
      $route = public_path()."/packages/zipFilesTemp/";
      // Extract the ZipFile in the route
      $extract = $enzipado->extractTo($route);
      // the file will be closed
      $enzipado->close();
      unlink($routeZIP);
      // Run the route to validate the files
      $saved = $this->run_route($route, $typeAndFolder, $boolean);
      // if the extract is success, list the file names
      if($extract == true){
         return array(true, $saved);
      }
      else{
         return false;
      }
   }

   private function moveFile($dirNow,$newDir){
      $curiosity = self::singleton();
      rename($dirNow,$newDir);
   }

}








 ?>
