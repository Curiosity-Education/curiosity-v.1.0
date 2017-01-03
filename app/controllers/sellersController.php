<?php
class sellersController extends BaseController{

	class vendedorController extends BaseController
{

  function verPagina(){
    return View::make('adminVendedores');
  }

  function getActives (){
    return vendedor::join('ciudades', 'ciudades.id', '=', 'vendedores.ciudad_id')
    ->join('estados', 'estados.id', '=', 'ciudades.estado_id')
    ->select('vendedores.*', 'ciudades.id as ciudadId', 'ciudades.nombre as ciudadNombre', 'estados.id as estadoId', 'estados.nombre as estadoNombre')
    ->where('active', '=', 1)->get();
  }

  function save(){
    $data = Input::all();
    $rules = array(
      'nombre' => 'required',
      'apellidos' => 'required',
      'correo' => 'required|email',
      'sexo' => 'required',
      'ciudad' => 'required'
    );
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
     $validate = Validator::make($data, $rules, $messages);
     if($validate->fails()){
       return $validate->messages();
     }
     else{
       // Caracteres que se pueden usar.
       $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
       //numero de letras para generar el nombre random
       $amountLetters = 3;
       //variable para crear el codigo
       $nameRandom = "";
       for($i=0; $i < $amountLetters; $i++){
         /*Extraemos 1 caracter de los caracteres
         entre el rango 0 a Numero de letras que tiene la cadena */
         $nameRandom .= substr($caracteres,rand(0,strlen($caracteres)),1);
       }
       $inicialN = substr($data['nombre'], 0, 2);
       $inicialAP = substr($data['apellidos'], 0, 2);
       $seller = new vendedor($data);
       $seller->active = 1;
       $seller->photo = 'foto_default.jpg';
       $vendedor->city_id = $datos['ciudad'];
       $seller->code = "cue".$nameRandom.$inicialN.rand().$inicialAP.date("y").date("d").date("m");
       $seller->save();
       return json_encode('success');
     }
  }

  function update(){
    $data = Input::all();
    $rules = array(
      'nombre' => 'required',
      'apellidos' => 'required',
      'correo' => 'required|email',
      'sexo' => 'required',
      'ciudad' => 'required'
    );
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
     $validate = Validator::make($data, $rules, $messages);
     if($validate->fails()){
       return $validate->messages();
     }
     else{
       $seller = vendedor::where('id', '=', $data['id'])->first();
       $seller->name = $data['nombre'];
       $seller->surnames = $data['apellidos'];
       $seller->mail = $data['correo'];
       $seller->telephone = $data['telefono'];
       $seller->sex = $data['sexo'];
       $seller->city_id = $data['ciudad'];
       $seller->save();
       return json_encode('success');
     }
  }

  function delete(){
    $data = Input::all();
    $seller = vendedor::where('id', '=', $data['id'])->first();
    $seller->active = 0;
    $seller->save();
    return json_encode('success');
  }

  function savePhoto(){
    $photo = Input::file('imagenV');
    $data = Input::all();
    $id = $data['id'];
    $seller = vendedor::where("id", '=', $id)->first();
    if ($photo != null){
      if ($seller->photo != "foto_default.jpg"){
        unlink(public_path()."/packages/images/perfilVendedores/".$seller->photo);
      }
      $nf = rand().substr($seller->name, 0, 2).substr($seller->surnames, 0, 2).date("m").date("d").date("y").".".$photo->getClientOriginalExtension();
      $destinationPath = public_path()."/packages/images/perfilVendedores/";
      $photo->move($destinationPath, $nf);
      $seller->photo = $nf;
      $seller->save();
      return $seller->photo;
    }
  }

}

	function get(){

	}
	function save(){

	}
	function update(){

	}
	function delete(){

	}
}
?>
