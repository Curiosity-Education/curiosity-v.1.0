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
		$data = Input::get('data');
		$currentDate = date("Y-m-d");
        $date_min =strtotime("-4 year",strtotime($currentDate));
        $date_min=date("Y-m-d",$date_min);
		$rules=[
			"username_hijo"     =>"required|unique:users,username|max:50",
            "password"          =>"required|min:8|max:100",
            "cpassword"         =>"required|same:password",
            "nombre"            =>"required|letter|max:50",
            "apellido_paterno"  =>"required|letter|max:30",
            "apellido_materno"  =>"required|letter|max:30",
            "sexo"              =>"required|string|size:1",
            "fecha_nacimiento"  =>"required|date_format:Y-m-d|before:$date_min",
            "promedio"				=>"required",
            "grado_inicial"			=>"required"
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
		$validates = Validator::make($data,$rules,$messages);
		if($validates->fails()){
	    return $validates->messages();
		}else{
			$roleDad = Auth::user()->roles[0]->name;
            $user = new User();
            $user->username=$data["username_hijo"];
            $user->password=Hash::make($data["password"]);
            $user->token=sha1($data["username_hijo"]);
            $user->skin_id=Skin::where('skin', '=', 'skin-blue')->pluck('id');
            $user->active=1;
            $user->save();
                if($roleDad == "parent"){
                    $myRole = DB::table('roles')->where('name', '=', 'child')->pluck('id');
                }

            $user->attachRole($myRole);
            $profile = new Profile();
                if ($data['sexo'] == 'm'){
                    $profile->foto_perfil = "boy-def.png";
                }
                else{
                    $profile->foto_perfil = "girl-def.png";
                }
            $profile->users_id = $user->id;
            $profile->save();
            $person = new Person($data);
            $person->user_id = $user->id;
            $person->save();
            $son = new Son();
            $son->persona_id = $person->id;
            $id_dad = Auth::user()->Person()->first()->Parent()->first()->id;
            $son->padre_id = $id_dad;
            $son->save();
            DB::table('escolaridades')->insert(array(
                'grado' => $data['grado_inicial'],
                'promedio' => $data['promedio'],
                'hijo_id' => $son->id
            ));
            $advance = DB::table('hijos_metas_diarias')->insert(array(
                'hijo_id' => $son->id,
                'meta_diaria_id' => DB::table('metas_diarias')->where('nombre', '=', 'Normal')->pluck('id')
            ));
            $exp = DB::table('hijo_experiencia')->insert(array(
                'hijo_id' => $son->id,
                'cantidad_exp' => 0,
                'coins' => 0
            ));
            if ($roleDad == "parent" ){
                $membership_plan = new MembershipPlan();
                $membership = new Membership(array(
                    "token_card" => Session::get('sub_id'),
                    "fecha_registro" => Date('Y-m-d'),
                    "active"    => 1,
                    "padre_id"  => $id_dad
                ));
                $membership->save();
                $membership_plan->membresia_id=$membership->id;
                $plan = Plan::where("name","=","1 Hijo")->first();
                $membership_plan->plan_id=$plan->id;
                $membership_plan->hijo_id=$son->id;
                $membership_plan->active=1;
                $membership_plan->save();
            }
            return Response::json(array("status" => 200,'statusMessage' => "success","data" => $profile->foto_perfil));
		}
	}
	function update(){
		
	}
	function delete(){
		
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
}
?>
