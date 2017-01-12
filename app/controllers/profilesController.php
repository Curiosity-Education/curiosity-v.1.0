<?php
class profilesController extends BaseController{

	function get(){

	}
	function save(){

	}
    public function update(){
        $data  =	 Input::get('data');
        $dateNow = date("Y-m-d");
        if(!Auth::User()->hasRole('hijo') && !Auth::User()->hasRole('hijo_free') && !Auth::User()->hasRole('demo_hijo')){
            $date_min =strtotime("-18 year",strtotime($dateNow));
        }else{
             $date_min =strtotime("-4 year",strtotime($dateNow));
        }
        $date_min=date("Y-m-d",$date_min);
        $rules= [
            "username_persona"          =>"required|user_check|max:50",
            "password_new"              =>"min:8|max:100",
            "cpassword_new"             =>"same:password_new",
            "nombre_persona"            =>"required|letter|max:50",
            "apellido_paterno_persona"  =>"required|letter|max:30",
            "apellido_materno_persona"  =>"required|letter|max:30",
            "sexo_persona"              =>"required|string|size:1",
            "fecha_nacimiento_persona"  =>"required|date_format:Y-m-d|before:$date_min"
        ];
        $messages = [
               "required"    =>  "Este campo :attribute es requerido",
               "alpha"       =>  "Solo puedes ingresar letras",
               "before"      =>  "La fecha que ingresaste tiene que ser menor al $date_min",
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
        if(!Hash::check($data["password_persona"],Auth::user()->password)){
            return Response::json("contraseña incorrecta");
        }
        $valid = Validator::make($data,$rules,$messages);
        if($valid->fails()){
            return $valid->messages();
        }else{
            $data["password"]=Hash::make($data["password_new"]);
            $data["username"]=$data["username_persona"];
            $user =User::find(Auth::user()->id);
            $user->update($data);
            $person = $user->persona();
            $data_person = [
               "nombre"            =>  $data["nombre_persona"],
               "apellido_paterno"  =>  $data["apellido_paterno_persona"],
               "apellido_materno"  =>  $data["apellido_materno_persona"],
               "sexo"              =>  $data["sexo_persona"],
               "fecha_nacimiento"  =>  $data["fecha_nacimiento_persona"]
           ];
            $person->update($data_person);
            $rolee = Auth::user()->roles[0]->name;
            if ($rolee == "padre" || $rolee == "padre_free" || $rolee == "demo_padre"){
                $dadId = Auth::user()->persona()->first()->padre()->first()->id;
                $dad = padre::where('id', '=', $dadId)->first();
                $dad->update($data);
            }
            return Response::json(array('status' => 200, 'statusMessage' => 'success'));
        }
    }
    function delete(){

	}

}
?>
