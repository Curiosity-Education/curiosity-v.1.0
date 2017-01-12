<?php
class teachersController extends BaseController{

	function verPagina(){
    if(Request::method()=="GET"){
      $school = array('escuelas'=>escuela::where('active', '=', 1)->get());
      return View::make('vista_profesores_admin', $school);
    }
    else{
      $form = Input::all();
      $rules = array(
        'nombre' => 'required',
        'apellido_paterno' => 'required',
        'escuela_id' => 'required'
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
      $validate = Validator::make($form, $rules, $messages);
      if($validate->fails()){
        return $validarte>messages();
      }
      else{
        if($form['foto'] != null){
          $destinationPath = public_path()."/packages/images/profesores/";
          $file = $form['foto'];
          $file->move($destinationPath, $file->getClientOriginalName());
          $thePhoto = $form['foto']->getClientOriginalName();
        }
        else{
          $thePhoto = 'prof-default.jpg';
        }
        $teacher = new profesor($form);
        $teacher->photo = $thePhoto;
        $teacher->save();
        return Response::json(array(0=>"success"));
      }
    }
  }

  function update(){
    $form = Input::all();
    $rules = array(
      'nombre' => 'required',
      'apellido_paterno' => 'required',
      'escuela_id' => 'required'
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
    $validate = Validator::make($form, $rules, $messages);
    if($validate->fails()){
      return $validate->messages();
    }
    else{
      $photo;
      if($form['foto'] != null){
        $destinationPath = public_path()."/packages/images/profesores/";
        $file = $form['foto'];
        $file->move($destinationPath, $file->getClientOriginalName());
        $photo = $file->getClientOriginalName();
      }
      else{
        $photo = profesor::where('id', '=', $form['id'])->pluck('foto');
      }
      profesor::where('id', '=', $form['id'])->update(array(
        'nombre' => $form['nombre'],
        'apellido_paterno' => $form['apellido_paterno'],
        'apellido_materno' => $form['apellido_materno'],
        'email' => $form['email'],
        'gustos' => $form['gustos'],
        'foto' => $photo,
        'escuela_id' => $form['escuela_id']
      ));
      return Response::json(array(0=>"success"));
    }
  }

  function remove(){
    $form = Input::get('data');
    profesor::where('id', '=', $form['id'])->update(array(
      'active' => 0
    ));
  }

  function getTeacherInfo()
  {
    return profesor::join('escuelas', 'escuelas.id', '=', 'profesores.escuela_id')
    ->where('profesores.active', '=', 1)
    ->where('escuelas.active', '=', 1)
    ->select('profesores.*', 'escuelas.nombre as escuela_nombre', 'escuelas.id as escuela_id')
    ->get();
  }

	function get(){

	}

	function save(){

	}

	function delete(){

	}
}
?>
