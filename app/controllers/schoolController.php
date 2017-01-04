<?php
class schoolController extends BaseController{


	function verPagina(){
    if(Request::method()=="GET"){

      $schools = array('escuelas' => escuela::where('active', '=', 1)->get());
      return View::make('vista_escuelas_admin', $schools);

    }
    else{
      $form = Input::all();
      $rules = array(
        'nombre' => 'required',
        'logotipo' => 'required'
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
        $existActive = escuela::where('nombre', '=', $form['nombre'])->pluck('active');
        if($existActive === null){
          $destinationPath = public_path()."/packages/images/escuelas/";
          $file = $form['logotipo'];
          $file->move($destinationPath, $file->getClientOriginalName());

          $school = new escuela($form);
          $school->logotipo = $form['logotipo']->getClientOriginalName();
          $school->save();
          return Response::json(array(0=>"success", 1=>$school));
        }
        else if($existActive === 0){
          $destinationPath = public_path()."/packages/images/escuelas/";
          $file = $form['logotipo'];
          $file->move($destinationPath, $file->getClientOriginalName());

          escuela::where('nombre', '=', $form['nombre'])->update(array(
            'active' => 1,
            'web' => $form['web'],
            'logotipo' => $file->getClientOriginalName()
          ));
          $school = escuela::where('nombre', '=', $form['nombre'])->first();
          return Response::json(array(0=>"success_exist", 1=>$school));
        }
        else{
          return Response::json(array(0=>"same"));
        }
      }
    }
  }

  function update(){
    $form = Input::all();
    $rules = array(
      'nombre' => 'required'
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
      $logo;
      if($form['logotipo'] != null){
        $destinationPath = public_path()."/packages/images/escuelas/";
        $file = $form['logotipo'];
        $file->move($destinationPath, $file->getClientOriginalName());
        $logo = $file->getClientOriginalName();
      }
      else{
        $logo = escuela::where('id', '=', $form['idUpdate'])->pluck('logotipo');
      }

      $active = escuela::where('nombre', '=', $form['nombre'])->pluck('active');
      $nameEsc = escuela::where('id', '=', $form['idUpdate'])->pluck('nombre');

      if($active === null){
        escuela::where('id', '=', $form['idUpdate'])->update(array(
          'nombre' => $form['nombre'],
          'logotipo' => $logo,
          'web' => $form['web']
        ));
        $school = escuela::where('id', '=', $form['idUpdate'])->pluck('logotipo');
        return Response::json(array(0=>"success", 1=>$school));
      }
      else if($active === 0){
        return Response::json(array(0=>"same_exist"));
      }
      else if($active === 1){
        if($nameEsc == $form['nombre']){
          escuela::where('id', '=', $form['idUpdate'])->update(array(
            'logotipo' => $logo,
            'web' => $form['web']
          ));
          $school = escuela::where('id', '=', $form['idUpdate'])->pluck('logotipo');
          return Response::json(array(0=>"success", 1=>$school));
        }
        else{
          return Response::json(array(0=>"same"));
        }
      }
    }
  }

  function remove(){
    $form = Input::all();
    escuela::where('id', '=', $form)->update(array(
      'active' => 0
    ));
    return Response::json(array(0=>"success"));
  }


	function get(){

	}
	function save(){

	}
	function delete(){

	}
}
?>
