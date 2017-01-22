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
		//$currentDate = date("Y-m-d");
        //$date_min =strtotime("-4 year",strtotime($currentDate));
       // $date_min=date("Y-m-d",$date_min);
		$rules=[
			"username"    =>"required|unique:users,username|max:50",
            "password"    =>"required|min:8|max:100",
            "cpassword"   =>"required|same:password",
            "name"        =>"required|letter|max:50",
            "surnames"    =>"required|letter|max:30",
            "gender"      =>"required|string|size:1",
            "average"	  =>"required",
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
			$roleDad         = 'parent';/*Auth::user()->roles[0]->name;*/
            $user            = new User();
            $user->username  = $data["username"];
            $user->password  = Hash::make($data["password"]);
            $user->token     = sha1($data["username"]);
            $user->active    = 1;
          //  $user->skin_id=Skin::where('skin', '=', 'skin-blue')->pluck('id');
            $user->save();
            if($roleDad == "parent"){
                $myRole = (integer)DB::table('roles')
                            ->select('id')
                            ->where('name','=','child')
                            ->first()->id;/*Role::where('name', '=', 'child')->pluck('id');*/

            }
            //$user->attachRole($myRole);
            $person                = new Person($data);
            $person->nombre        = $data["name"];
            $person->apellidos     = $data["surnames"];
            $person->user_id       = $user->id;
            $person->save();
            $son                   = new Son();
            $son->persona_id       = $person->id;
            $id_dad = 12;//Auth::user()->Person()->first()->Parent()->first()->id;
            $son->padre_id         = $id_dad;
            $son->promedio_inicial = $data["average"];
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
            if ($roleDad == "parent"){
                /*$membership_plan    = new MembershipPlan();
                $membership         = new Membership(array(
                    "token_card"     => Session::get('sub_id'),
                    "fecha_registro" => Date('Y-m-d'),
                    "active"         => 1,
                    "padre_id"       => $id_dad
                ));
                $membership->save();
                $membership_plan->membresia_id=$membership->id;
                $plan = Plan::where("name","=","1 Hijo")->first();
                $membership_plan->plan_id=$plan->id;
                $membership_plan->hijo_id=$son->id;
                $membership_plan->active=1;
                $membership_plan->save();*/
            }
            //this reponse message data is for user
            return Response::json(array(
                "status"        => 200,
                'statusMessage' => "success",
                'message'       => "Felicidades haz registrado tu primer hijo exitosamente!!!"
            ));
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
