<?php
class usersController extends BaseController{

	function get(){

	}
	function save(){
		$dateNow = date("Y-m-d");
        $date_min =strtotime("-18 year",strtotime($dateNow));
        $date_min=date("Y-m-d",$date_min);
        $rules=[
            "username_admin"          =>"required|unique:users,username|max:50",
            "password_admin"          =>"required|min:8|max:100",
            "cpassword_admin"         =>"required|same:password_admin",
            "nombre_admin"            =>"required|letter|max:50",
            "apellido_paterno_admin"  =>"required|letter|max:30",
            "apellido_materno_admin"  =>"required|letter|max:30",
            "sexo_admin"              =>"required|string|size:1",
            "fecha_nacimiento_admin"  =>"required|date_format:Y-m-d|before:$date_min",
            "role_admin"              =>"required"

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
        $validations = Validator::make(Input::all(),$rules,$messages);
        if($validations->fails()){
            return $validations->messages();
        }else{
            try {
                $user = new User();
                $user->username=Input::get('username_admin');
                $user->password=Hash::make(Input::get('password_admin'));
                $user->active=1;
                $user->token= sha1($user->username);
                $user->skin_id=skin::all()->first()->id;
                $user->save();
                $user->attachRole(Input::get('role_admin'));
                $person = new Person();
                $person->nombre = Input::get('nombre_admin');
                $person->apellido_paterno = Input::get('apellido_paterno_admin');
                $person->apellido_materno = Input::get('apellido_materno_admin');
                $person->sexo = Input::get('sexo_admin');
                $person->fecha_nacimiento = Input::get('fecha_nacimiento_admin');
                $person->user_id = $user->id;
                $person->save();
                $profile = new Profile();
                $profile->foto_perfil="perfil-default.jpg";
                $profile->users_id=$user->id;
                $profile->save();
                return Response::json(array("estado"=>200,"message"=>"El usuario ha sido registrado exitosamente"));

            }catch (Exception $e) {
                return Response::json(array("estado"=>500,"message"=>$e));
            }
        }
	}
	function update(){
		$data  =    Input::get('data');
        $dateNow = date("Y-m-d");
        if(!Auth::User()->hasRole('hijo') && !Auth::User()->hasRole('hijo_free') && !Auth::User()->hasRole('demo_hijo')){
            $date_min =strtotime("-18 year",strtotime($dateNow));
        }else{
             $date_min =strtotime("-4 year",strtotime($dateNow));
        }
        $date_min=date("Y-m-d",$date_min);
        $rules= [
            "username_persona"          =>"required|user_check|max:50",
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
        $valid = Validator::make($datos,$rules,$messages);
        if($valid->fails()){
            return $valid->messages();
        }else{

            $user =User::find(Auth::user()->id);
            $data["username"]=$data["username_persona"];
            $user->update($data);
            $person= $user->persona();
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
                $dadId = Auth::user()->Person()->first()->Parent()->first()->id;
                $dad = padre::where('id', '=', $dadId)->first();
                $dad->update($data);
            }
            return Response::json("bien");
        }
	}
	function delete(){

	}
    public function verPagina(){
        if(Request::method() == "GET"){
            $perfil = Auth::User()->profile()->first();
            $person = Auth::User()->person()->first();
            $parent=$person->Padre()->first();
            $state = State::all();
            $school = School::where('active', '=', '1')->get();
            $idAuth = Auth::user()->id;
            $rol = Auth::user()->roles[0]->name;
            if(Auth::user()->hasRole('padre') || Auth::user()->hasRole('padre_free') || Auth::user()->hasRole('demo_padre')){
              $news = novedadesController::getNovedadesToDad();
              $idDad = Auth::user()->Person()->first()->Parent()->pluck('id');
              $sonData = Parent::join('hijos', 'hijos.padre_id', '=', 'padres.id')
              ->join('personas', 'personas.id', '=', 'hijos.persona_id')
              ->join('users', 'users.id', '=', 'personas.user_id')
              ->join('perfiles', 'perfiles.users_id','=', 'users.id')
              ->where('users.active', '=', '1')
              ->where('hijos.padre_id', '=', $idDad)
              ->select('hijos.id as idHijo', 'personas.nombre','personas.apellido_paterno','personas.apellido_materno','personas.fecha_nacimiento','users.active', 'perfiles.foto_perfil')->get();
              return View::make('vista_papa_inicio')->with(array('datosHijos' => $sonData, 'novedades' => $news));
            }
            else if (Auth::user()->hasRole('hijo') || Auth::user()->hasRole('hijo_free') || Auth::user()->hasRole('demo_hijo')){
              // Obtenemos el id del hijo logueado
              $idSon = Auth::User()->Person()->first()->Son()->pluck('id');
              // --- Verificamos la fecha para la meta diaria del hijo
              // --- Si es la primera vez del dia en la que ha iniciado sesión
              // --- se hace el registro de la fecha actual del servidor y se establece
              // --- su avance en cero (0) ya que no ha jugado nada en el dia
              $now = date("Y-m-d");
              $goal = new goalController();
              $goals = $goal->getAll();
              $myGoal = $goal->getMetaHijo();
              if (!$goal->hasMetaToday()){
                DB::table('avances_metas')->insert(array(
                  'avance' => 0,
                  'fecha' => $now,
                  'avance_id' => $myGoal->metaAsignedId
                ));
              }
              $advanceGoal = $goal->getAvanceMetaHijo();
              $experience = DB::table('hijo_experiencia')->where('hijo_id', '=', $idSon)->first();
              $coins = $experience->coins;

              // --- Calculo del avance en porcenaje de la meta del hijo
              $avgAdvanceGoal = round(($advanceGoal * 100) / $miMeta->meta);
              if ($avgAdvanceGoal > 100) { $avgAdvanceGoal = 100; }

              // --- Calculo de cuanto falta para cumplir la meta diaria
              $missingGoal = $myGoal->meta - $advanceGoal;
              if ($missingGoal < 0) { $missingGoal = 0; }

              return View::make('vista_hijo_inicio')
              ->with(array(
                'experiencia' => $experience,
                'metas' => $goals,
                'miMeta' => $myGoal,
                'porcAvanceMeta' => $avgAdvanceGoal,
                'avanceMeta' => $advanceGoal,
                'faltanteMeta' => $missingGoal,
                'coins' => $coins,
                'nombreAvatar' => avatarController::getSelectedInfo()->nombre
              ));
            }
            else{
                return View::make('vista_perfil')->with(array('perfil' => $perfil, 'persona' => $persona, 'rol'=>$rol));
            }
          // }
        }

    }

    public function remoteUsernameHijo(){
        if(User::where("username","=",Input::get('username_hijo'))->first()){
            return "false";
        }else{
         return "true";
        }
    }
    public function remoteUsername(){
    	if(User::where("username","=",Input::get('username'))->first()){
    		return "false";
    	}else{
    	 return "true";
    	}
    }
    public function remoteUsernameAdmin(){
        if(User::where("username","=",Input::get('username_admin'))->first()){
            return "false";
        }else{
         return "true";
        }
    }
    public function remoteUsernameUpdate(){
        if(DB::table("users")->where("username","=",Input::get('username_persona'))->where("username","!=",Auth::user()->username)->get()){
            return "false";
        }else return "true";
    }
    public function remotePasswordUpdate(){
        if(Hash::check(Input::get('password_now'),Auth::user()->password)){
            return "true";
        }else return "false";
    }


}
?>
