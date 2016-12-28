<?php

class zipController extends BaseController{

    private function search_on_path($ruta, $typeAndFolder, $boolean){
        $filesSaved = [];
        // open a directory and list it
        //---Verified if it's a dir
        if (is_dir($ruta)) {
          //---Open directory
          if ($dh = opendir($ruta)) {
            //---While that directory is read
            while (($file = readdir($dh)) !== false) {
              if (!is_dir($ruta . $file) && $file!="." && $file!=".."){
                //Find extension
                foreach ($typeAndFolder as $tipo => $directorio) {
                  if ($tipo == fileController::findExtension($file)){
                    if ($boolean == 'yes'){
                      $fileName = rand()."_".date('Y-m-d').".".fileController::findExtension($file);
                    }
                    else if ($boolean == 'not'){
                      $fileName = $file;
                    }
                    else if ($boolean == 'both'){
                      $fileName = $file."-".rand()."_".date('Y-m-d').".".fileController::findExtension($file);
                    }
                    fileController::moveFile($ruta.$file,public_path().$directorio.$fileName);
                    array_push($filesSaved, array(
                      'nombre' => $fileName,
                      'ruta' => $directorio,
                      'tipo' => $tipo
                    ));
                  }
                }
              }
            }
            closedir($dh);
            return $filesSaved;
          }
        }else{
          return  Response::json(array('status' => 'CU-102', 'statusMessage' => 'Path Invalid', 'message' => 'La ruta es invalida');
        }
      }

      private function extractFile  ($rutaZIP, $typeAndFolder, $boolean){
        //Create an object of the class ZipArchive()
        $enzipado = new ZipArchive();
        //Open the file descompressed
        $enzipado->open($rutaZIP);
        if(!file_exists(public_path()."/packages/zipFilesTemp/")){
          $Zipdescompress = mkdir(public_path()."/packages/zipFilesTemp/");
        }
        $ruta = public_path()."/packages/zipFilesTemp/";
        //--Extract the file to the targer path
        $extraido = $enzipado->extractTo($ruta);
        //--Close the file
        $enzipado->close();
        unlink($rutaZIP);
        //---Search on the path
        $saved = $this->search_on_path($ruta, $typeAndFolder, $boolean);
        /*
            if the file is descompressed  , create  filenames's list
        */
        if($extraido == true){
          return array(true, $saved);
        }
        else{
          return false;
        }
      }

      public function extractSave($inputFile, $typeAndFolder = [], $boolean = 'yes'){
        try{
          //Valid if the input isn't empty
          if($inputFile != null){
            //Valid if the file is a ZIP
            if($inputFile->getClientOriginalExtension() == 'zip'){
              //Save the name in var $log
              $log = $inputFile->getClientOriginalName();
              // Valid if folder exist
              if(!file_exists(public_path()."/packages/saveFilesZipTemp/")){
                $dirTempJuegoZip = mkdir(public_path()."/packages/saveFilesZipTemp/");
              }
              //--Save path
              $destinoPath = public_path()."/packages/saveFilesZipTemp/";
              //--Save file
              $file = $inputFile;
              // Move file to the targer
              $file->move($destinoPath, $log);
              //-- Save where is the file
              $rutaZIP = $destinoPath.$log;
              // Extract the file
              $extraccion = $this->extractFile($rutaZIP, $typeAndFolder, $boolean);
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

}
