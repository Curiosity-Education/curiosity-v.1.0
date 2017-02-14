<?php
class childrenController extends BaseController{

	function get(){
		$role = Auth::user()->roles[0]->name;
        $idDad = Auth::user()->Person()->first()->Parent()->pluck('id');
        $dataSons = Padre::join('hijos', 'hijos.padre_id', '=', 'padres.id')
        ->join('personas', 'personas.id', '=', 'hijos.persona_id')
        ->join('users', 'users.id', '=', 'personas.user_id')
        ->join('perfiles', 'perfiles.users_id','=', 'users.id')
        ->where('users.active', '=', '1')
        ->where('hijos.padre_id', '=', $idDad)
        ->select('hijos.*', 'personas.*', 'users.id', 'perfiles.*')->get();
        $data = array(
            'rol' => $role,
            'datosHijos' => $dataSons
        );
        return View::make('vista_papa_misHijos')->with($data);
	}
	function save(){
		$data = Input::all();
		$rules=[
			   "usuario"     =>"required|unique:users,username|max:50",
            "password"    =>"required|min:8|max:100",
            "cpassword"   =>"required|same:password",
            "nombre"      =>"required|letter|max:50",
            "apellidos"   =>"required|letter|max:30",
            "genero"      =>"required|string|size:1",
            "promedio"	  =>"required",
            "grado"       =>"required|exists:niveles,id"
		];
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
		];
		$validation = Validator::make($data,$rules,$messages);
		if($validation->fails()){
	       //this format error is for developers
            return Response::json(array(
                'status'        => 'CU-104',
                'statusMessage' => 'Inconsistency format data',
                'message'       => 'this child hasn´t registred, the data recived dont have a format data set in database',
                "data"          => $validation->messages()
            ));
		}else{
			$id_dad = Auth::user()->Person->Dad->id;
			$sons = parentsController::getSonsInfo();
			$conutSons = count($sons['sons']);
			$tokenCard = Membership::where("padre_id", "=", $id_dad)->select("token_card")->first()["token_card"];
			Conekta::setApiKey("key_ed4TzU6bqnX9TvdqqTod4Q");
			$customer = Conekta_Customer::find($tokenCard);
			$subscription = $customer->subscription;
			$limit = Plan::where("reference", "=", $subscription->plan_id)->first()["limit"];
			if ($conutSons < $limit){
				 $roleDad         = 'parent';/*Auth::user()->roles[0]->name;*/
                 $user            = new User();
                 $user->username  = $data["usuario"];
                 $user->password  = Hash::make($data["password"]);
                 $user->token     = sha1($data["usuario"]);
                 $user->active    = 1;
                    $user->flag      = 0;
                 $user->save();
                    $myRole = Role::where("name", "=", "child")->pluck("id");
                 $user->attachRole($myRole);
                 $person                = new Person($data);
                 $person->nombre        = $data["nombre"];
                 $person->apellidos     = $data["apellidos"];
                 $person->sexo          = $data["genero"];
                 $person->user_id       = $user->id;
                 $person->save();
                 $son                   = new Son();
                    $son->promedio_inicial = $data["promedio"];
                 $son->persona_id       = $person->id;
                 $son->padre_id         = $id_dad;
                 $son->nivel_id         = $data["grado"];
                 $son->save();
				 $advance = DB::table('hijos_metas_diarias')->insert(array(
	              'hijo_id'        => $son->id,
	              'meta_diaria_id' => DB::table('metas_diarias')->where('nombre', '=', 'Normal')->pluck('id')
	         ));
				$exp = DB::table('hijo_experiencia')->insert(array(
	             'hijo_id'      => $son->id,
	             'cantidad_exp' => 0,
	             'coins'        => 0
	         ));
				$tyPh = 2;
				if ($person->sexo == "m"){ $tyPh = 1; }
				$photo = DB::table('hijos_has_accesorios')->insert(array(
	             'hijo_id'      => $son->id,
	             'accesorio_id' => $tyPh,
					 'is_using' => 1
	         ));
				$skin = DB::table('hijos_has_accesorios')->insert(array(
	             'hijo_id'      => $son->id,
	             'accesorio_id' => 3,
					 'is_using' => 1
	         ));
				$menuBg = DB::table('hijos_has_accesorios')->insert(array(
	             'hijo_id'      => $son->id,
	             'accesorio_id' => 4,
					 'is_using' => 1
	         ));
				/**************************************************************
				/ THE AVATAR IS REGISTRED MANUAL FOR A TEMPORALY TIME WHILE
				/ OTHER AVATAR IS NOT EXIST
				/**************************************************************/
				$avatar = DB::table('hijos_has_estilos_avatar')->insert(array(
	             'hijos_id'      => $son->id,
	             'estilo_avatar_id' => 1,
					 'is_using' => 1
	         ));
				/**************************************************************/
				$planRel = new MembershipPlan();
				$planRel->hijo_id = $son->id;
				$planRel->membresia_id = Membership::where("padre_id", "=", $id_dad)->pluck("id");
				$planRel->plan_id = Plan::where("reference", "=", $subscription->plan_id)->first()["id"];
				$planRel->save();
	         //this reponse message data is for user
	         return Response::json(array(
	             "status"        => 200,
	             'statusMessage' => "success",
	             'message'       => "Felicidades haz registrado tu primer hijo exitosamente!!!"
	         ));
			}
			else {
				return Response::json(array(
	             "status"        => "CUE-304",
	             'statusMessage' => "Limit of sons",
	             'message'       => "Lo sentimos has alcanzado el limite de hijos por registrar según tu plan seleccionado."
	         ));
			}
		}
	}
	function update(){

	}


	function delete(){
		$id = Input::all();
		$new = MembershipPlan::where("hijo_id", "=", $id) ->first();
		$new->active = 0;
		$new->save();
	}

    /*Esta función no recuerdo mucho su funcionamiento pendiente para actualización*/
    function desgloceJuegos($idSon){
            $now = date("Y-m-d");
            $query = "SELECT
            t_jugados.nombre as 'name',t_jugados.t_jugados_act as 'total' , (t_jugados.t_jugados_act * 100 /t_sum_juegos.total_jugados) as 'y', t_jugados.promedio
            FROM
            (
                SELECT
                actividades.nombre,count(actividades.id) as 't_jugados_act',AVG(hijo_realiza_actividades.promedio) as 'promedio'
                FROM
                hijo_realiza_actividades
                inner join
                actividades
                on
                hijo_realiza_actividades.actividad_id = actividades.id
                where
                hijo_realiza_actividades.hijo_id = $idHijo and hijo_realiza_actividades.created_at between  '$now 00:00:00' and '$now 23:59:59'
                group by(actividades.nombre)
            )
            as t_jugados,
            (
                SELECT
                    count(actividades.id) as 'total_jugados'
                FROM
                    hijo_realiza_actividades
                inner join
                    actividades on hijo_realiza_actividades.actividad_id = actividades.id
                where
                    hijo_realiza_actividades.hijo_id = $idHijo and hijo_realiza_actividades.created_at between  '$now 00:00:00' and '$now 23:59:59'
                group by(hijo_realiza_actividades.hijo_id)
            )
            as t_sum_juegos";
            return DB::select($query);
    }

	function cardsScore(){

		$id = Auth::user()->Person()->first()->id;

		$data = DB::table('hijo_experiencia')
			->select('cantidad_exp', 'coins', 'metas_diarias.nombre', 'emoji')
			->join('hijos_metas_diarias','hijo_experiencia.hijo_id','=','hijos_metas_diarias.hijo_id')
			->join('metas_diarias','hijos_metas_diarias.meta_diaria_id','=','metas_diarias.id')
			->join('hijos','hijo_experiencia.hijo_id','=','hijos.id')
			->join('personas','hijos.persona_id','=','personas.id')
			->where('personas.id','=',$id)
			->get();


		return Response::json(array(
			'status' 	    => 200,
			'statusMessage' => 'success',
			'message'		=> 'puntajes obtenidos',
			'data'			=> $data
		));
	}

	function graphDailyGoal(){

		$id = Auth::user()->Person()->first()->id;
		$date = date('Y-m-d');

		$data = DB::table('avances_metas')
			->select('meta','avance')
			->join('hijos_metas_diarias','avances_metas.avance_id','=','hijos_metas_diarias.id')
			->join('metas_diarias','hijos_metas_diarias.meta_diaria_id','=','metas_diarias.id')
			->join('hijos','hijos_metas_diarias.hijo_id','=','hijos.id')
			->join('personas','hijos.persona_id','=','personas.id')
			->where('personas.id','=',$id)
			->where('avances_metas.fecha','=',$date)
			->get();

		return Response::json(array(
			'status' 	    => 200,
			'statusMessage' => 'success',
			'message'		=> 'información obtenida',
			'data'			=> $data
		));
	}

	public static function getInfoToConfig(){
		$user		= Auth::user();
		$person 	= Person::where("user_id", "=", $user["id"])->first();
		$child 	= Son::where("persona_id", "=", $person["id"])->first();
		$data 	= [
			"metas"	=> goalController::all(),
			"miMeta"	=> goalController::getGoalSon(),
			"person"	=> $person,
			"child"	=> $child
		];
		return $data;
	}

	function updateConf(){
		$data = Input::all();
		$user = Auth::user();
		$user->username = $data["username"];
		if ($data["npass"] != null){
			if(!Hash::check($data["pass"], $user->password)){
				return Response::json(array(
					'status'        => 'CU-104',
               'statusMessage' => 'Inconsistency format data',
					'message'       => 'Inconsistency format data',
					'data'			 => null
            ));
			}
			else{
				$user->password = Hash::make($data["npass"]);
			}
		}
		$user->save();
		return Response::json(array(
			 "status"        => 200,
			 'statusMessage' => "success",
			 'message'       => "Felicidades haz actualizado tu información",
			 'data'			  => $user
		));
	}
}
?>
