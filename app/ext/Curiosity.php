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
             "required"    =>  "El campo :attribute es requerido",
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

   public static function makeRandomName($rand = true, $date = true){
      $curiosity = self::singleton();
      $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
      $limit = 5;
		$word = "";
		for($i=0; $i < $limit; $i++) { $word .= substr($characters, rand(0, strlen($characters)), 1); }
      if ($rand) { $word.=rand(); }
      if ($date) { $word.="_".date("d").date("m").date("y"); }
		return $word;
   }

   public static function extractZip($inputFile, $typeAndFolder = [], $boolean = 'yes'){
      $curiosity = self::singleton();
      try{
         if($inputFile != null){
            // is the zip file type?
            if($inputFile->getClientOriginalExtension() == 'zip'){
               // We'll save the name in the var $log
               $log = str_replace(" ","_",$inputFile->getClientOriginalName());
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
               $extraccion = $curiosity->extractFile($routeZIP,str_replace(".zip","",$log), $typeAndFolder, $boolean);
               if($extraccion['status'] == 200){
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

   public static function bubleSortObject($array = [], $attr = "", $order = 'asc'){
      for ($i=0; $i < count($array); $i++) {
         for ($e = 0; $e < count($array); $e++) {
            if ($order == 'asc'){
               if ($array[$i][$attr] < $array[$e][$attr]){
                  $temp = $array[$i];
                  $array[$i] = $array[$e];
                  $array[$e] = $temp;
               }
            }
            else{
               if ($array[$i][$attr] > $array[$e][$attr]){
                  $temp = $array[$i];
                  $array[$i] = $array[$e];
                  $array[$e] = $temp;
               }
            }
         }
      }
      return $array;
   }

   public static function makeArrayByObject($obj){
      $obj = json_decode(json_encode($obj));
      $arr = array();
		foreach ($obj as $key => $value) { $arr[$key] = $value; }
      return $arr;
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
                  if (is_array($typeAndFolder)){
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
                           $this->moveFile($route.$file, public_path().$typeAndFolder.$fileName);
                           array_push($filesSaved, array(
                              'name' => $fileName,
                              'route' => $directory,
                              'type' => $type
                           ));
                        }
                     }
                  }
                  else{
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
            closedir($dh);
            return $filesSaved;
         }
      }else{
         return null;
      }
   }

    private function searchJsonGame($route){
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
                   if ('json' == $curiosity->getFileExtension($file)){
                        $filesSaved = array($route.'/'.$file);
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

   private function extractFile($routeZIP,$log, $typeAndFolder, $boolean){
      $curiosity = self::singleton();
      // create a ZipArchive Object
      $enzipado = new ZipArchive();
      // Open the file
      $enzipado->open($routeZIP);
      if(!file_exists(public_path()."/packages/games/")){
         $Zipdescompress = mkdir(public_path()."/packages/games/");
      }
      $route = public_path()."/packages/games/";
      // Extract the ZipFile in the route
      $extract = $enzipado->extractTo($route);
      // the file will be closed
      $enzipado->close();
      unlink($routeZIP);
      // Run the route to validate the files
      $saved = $curiosity->searchJsonGame($route.$log);
      if(count($saved) > 0)
            $data = JSON::get($saved[0]);
      return [
          'status' => 200,
          'data' => $data,
          'folder' => $log
      ];
   }

   private function moveFile($dirNow,$newDir){
      $curiosity = self::singleton();
      rename($dirNow,$newDir);
   }

}








 ?>
