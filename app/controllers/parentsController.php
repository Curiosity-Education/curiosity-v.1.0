<?php
class parentsController extends BaseController{


  public function remoteEmail(){
    if(padre::where("email","=",Input::get("email"))->first())
      return "false";
    else return "true";
  }
  public function tourFirst(){
		return Response::json(["respuesta" => "true"]);
	}

  public function getDataPerfil(){
    if(Auth::user()){
      $data = User::join('personas','personas.user_id','=','users.id')
                  ->join('padres','padres.persona_id','=','personas.id')
                  ->where('users.id','=',Auth::user()->id )
                  ->first();
      return $data;
    }
  }
  public function save(){
        $data = Input::all();
        $dateNow = date("Y-m-d");
        $date_min =strtotime("-18 year",strtotime($dateNow));
        $date_min=date("Y-m-d",$date_min);
        $today= date("Y-m-d");
        $rules = [
            "password"          =>"required|min:8|max:100",
            "cpassword"         =>"required|same:password",
            "nombre"            =>"required|letter|max:50",
            "apellidos"  =>"required|letter|max:50",
            "sexo"              =>"required|string|size:1",
            "email"             =>"required|email|unique:padres,email",
            "username"          =>"required|unique:users,username",
            "telefono"          =>"required|decimal"
        ];
        try {
         $validator = Validator::make($data,$rules,Curiosity::getValidationMessages());
        } catch (Exception $e) {
           return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $e));
        }
        if($validator->fails()){
            return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validator->messages()));
        }
        else {
                //DB::transaction(function () {
                    try {
                        $user = new User($data);
                        $user->password=Hash::make($data["password"]);
                        $user->username = $data['username'];
                        $user->token=sha1($data['email']);
                        $user->flag = 0;
                        $user->save();
                        $myRole = DB::table('roles')->where('name', '=', 'parent')->pluck('id');
                        $user->attachRole($myRole);
                        $person = new Person($data);
                        $person->user_id=$user->id;
                        $person->save();
                        $dad = new Dad();
                        /*-------------------------------
                            Get LADA of country selected
                        --------------------------------*/
                        //$lada = LadaCountry::where("name","=",$data["pais"])->select("phone_code")->get()[0];
                        /*------------------------------*/
                        $dad->email = $data['email'];
                        $dad->persona_id = $person->id;
                        $dad->telefono = $data['telefono'];
                        if ($person->sexo == "m"){ $dad->foto_perfil = "dad-def.png"; }
                        else { $dad->foto_perfil = "mom-def.png"; }
                        $dad->save();
                    }
                    catch (PDOException $pdoException){
                        return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $pdoException->getMessage()));
                    }
                    catch (Exception $e){
                        return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $e->getMessage()));
                    }

                //}, 5);
            $sentEmail = 0;

            /* Uncomment for production */
              $dataSend = [
                  "name"     =>       "Equipo Curiosity",
                  "client"   =>       $person->nombre." ".$person->apellidos,
                  "email"    =>       $dad->email,
                  "subject"  =>       "¡Bienvenido a Curiosity Eduación!",
                  "msg"      =>       "La petición de registro al sistema Curiosity que realizo ha sido realizada con exito, para confirmar y activar su cuenta siga el enlace que esta en la parte de abajo",
                  "token"    =>       $user->token
              ];
              $toEmail=$dad->email;
              $toName=$dataSend["email"];
              $subject =$dataSend["subject"];
              try {
                  Mail::send('emails.confirmar_registro',$dataSend,function($message) use($toEmail,$toName,$subject){
                      $message->to($toEmail,$toName)->subject($subject);
                  });
                  $sentEmail = 1;
              } catch (Exception $e) {
                  $user->delete();
                  return Response::json(array('statusMessage'  =>  "Server Error",'status' => 500,'message' => $e->getMessage()));
              }
            $dataset = [
                'username'  =>  $data['username'],
                'password'  =>  $data['password']
            ];
            return Response::json(array(
                'status'    =>  200,
                'statusMessage' =>  'success',
                'data'  => $dataset,
                'sentEmail' => $sentEmail
            ));

        }

    }
    public function payment_suscription(){
        $padreRole = Auth::user()->roles[0]->name;
            /* Configuración con Conekta */
            /******************************************************
            * Llave de pruebas
            * Conekta::setApiKey("key_SGQHzgrE12weiDWjkJs1Ww");
            *******************************************************/
            // llave en modo de produccion
            Conekta::setApiKey("key_ed4TzU6bqnX9TvdqqTod4Q");
            Conekta::setLocale('es');
            try{
                if($padreRole == "parent"){
                    $parent = Auth::user()->Person->Dad;
                    $customer = Conekta_Customer::create(array(
                        "name" => Input::get('nombre'),
                        "email" => $parent->email,
                        "phone" => $parent->telefono,
                        "cards"=> array(Input::get('conektaTokenId'))
                    ));
                    $plan = Plan::find(Input::get('plan_id'));
                    if(!$plan){
                        return Response::json(array('status'=>404,'statusMessage'=>'El plan no fue encontrado'));
                    }
                    $subscription = $customer->createSubscription(array(
                      "plan_id"=> $plan->reference
                    ));
                    if ($subscription->status == 'active' || $subscription->status == 'in_trial') {
                            $membresia_plan = new MembershipPlan();
                            $membresia = new Membership(array(
                                "token_card" => $customer->id,
                                "fecha_registro" => Date('Y-m-d'),
                                "active"    => 1,
                                "padre_id"  => Auth::user()->Person->Dad->id
                            ));
                            $membresia->save();
                         //la suscripción inicializó exitosamente!
                        return Response::json(array('status'=>200,'statusMessage'=>'success','data'=>$subscription));

                    }
                    elseif ($subscription->status == 'past_due') {
                     //la suscripción falló a inicializarse
                      return Response::json(array('status'=>105,'statusMessage'=>'PAST_DUE','data'=>$subscription,'message'=>'El pago no fue realizado con éxito.'));
                    }
                }
                else{
                    return Response::json(array('success',"Como es Padre demo no se realiza el cobro"));
                }
            }catch (Conekta_Error $e){
              return Response::json(["message"=>$e->message_to_purchaser]);
             //el cliente no pudo ser creado
            }
    }
    public function confirm($token){
        $user = User::where("token","=",$token)->first();
        if($user){
            $user->active=1;
            $user->save();
            return Redirect::to("view-parent.home");
        }else{
          return Redirect::to("/");
        }
    }
    public function getSons(){
        $idDad = Auth::user()->Person()->first()->Dad()->first()->id;
        $sons = DB::select("SELECT
            hjs.id,concat(prsn.nombre,' ',prsn.apellidos) as 'nombre_completo', hjs.nivel_id
            FROM padres
            INNER JOIN
            hijos hjs
            ON hjs.padre_id = padres.id
            INNER JOIN personas prsn
            ON prsn.id = hjs.persona_id
            WHERE padres.id = '$idDad'
            GROUP BY hjs.id");
        $pActivitiesGeneral = DB::select("SELECT
            tms.id,tms.nombre,(sum(hra.promedio)/count(hra.promedio)) as Promedio
            FROM hijo_realiza_actividades hra
            INNER JOIN actividades act
            ON hra.actividad_id = act.id
            INNER JOIN temas tms
            ON act.tema_id = tms.id
            INNER JOIN bloques blqs
            ON tms.bloque_id = blqs.id
            INNER JOIN inteligencias i
            ON blqs.inteligencia_id = i.id
            INNER JOIN hijos hj
            ON hj.id = hra.hijo_id
            INNER JOIN personas prsn
            ON prsn.id = hj.persona_id
            INNER JOIN padres prnt
            ON prnt.id = hj.padre_id
            group by tms.id,tms.nombre");
        $temasLow = DB::select("SELECT
                hj.id,i.id as idMateria,i.nombre as Materia
                ,tms.id as temaID,tms.nombre as nombre_tema,
                (sum(hra.promedio)/count(hra.promedio)) as Promedio,
                bpdfs.nombre_real as nrPDF, bpdfs.nombre as nPDF,
                bvid.embed as eVideo, bvid.poster pVid,
                concat(pa.nombre,' ',pa.apellidos) as ncpVid,
                pa.foto as fpVid
                FROM hijo_realiza_actividades hra
                INNER JOIN actividades act
                ON hra.actividad_id = act.id
                INNER JOIN temas tms
                ON act.tema_id = tms.id
                INNER JOIN biblioteca_pdfs bpdfs
                ON bpdfs.tema_id = tms.id
                INNER JOIN biblioteca_videos bvid
                ON bvid.tema_id = tms.id
                INNER JOIN profesores_apoyo pa
                ON bvid.profesor_apoyo_id = pa.id
                INNER JOIN bloques blqs
                ON tms.bloque_id = blqs.id
                INNER JOIN inteligencias i
                ON blqs.inteligencia_id = i.id
                INNER JOIN hijos hj
                ON hj.id = hra.hijo_id
                INNER JOIN personas prsn
                ON prsn.id = hj.persona_id
                INNER JOIN padres prnt
                ON prnt.id = hj.padre_id
                INNER JOIN biblioteca_pdfs bp
                ON tms.id = bp.tema_id
                WHERE prnt.id = $idDad and
                 PROMEDIO <= 60
                group by prsn.id,i.id,i.nombre,blqs.nombre,tms.id,tms.nombre
            ");
        $sonMakeActivities = DB::select("SELECT
                hj.id,prsn.nombre as nombreHijo,i.id as idMateria,i.nombre as Materia,blqs.nombre as Bloque,tms.id as temaID,tms.nombre as nombre_tema,(sum(hra.promedio)/count(hra.promedio)) as Promedio
                FROM hijo_realiza_actividades hra
                INNER JOIN actividades act
                ON hra.actividad_id = act.id
                INNER JOIN temas tms
                ON act.tema_id = tms.id
                INNER JOIN bloques blqs
                ON tms.bloque_id = blqs.id
                INNER JOIN inteligencias i
                ON blqs.inteligencia_id = i.id
                INNER JOIN niveles nvls
                ON nvls.id = i.nivel_id
                INNER JOIN hijos hj
                ON hj.id = hra.hijo_id
                INNER JOIN personas prsn
                ON prsn.id = hj.persona_id
                INNER JOIN padres prnt
                ON prnt.id = hj.padre_id
                WHERE prnt.id = '$idDad'
                and nvls.id = hj.nivel_id
                group by prsn.id,i.id,i.nombre,blqs.nombre,tms.id,tms.nombre");
        return [
            'sons' => $sons,
            'pActivitiesGeneral'    =>  $pActivitiesGeneral,
            'sonMakeActivities'     =>  $sonMakeActivities,
            'temasLow'      =>  $temasLow
        ];

    }
    public function sendMensaje(){
        try{
            $mensaje = new SonReminder();
             $message->hijo_recuerda=User::where('username','=',Input::get('hijo_recuerda'))->join('personas','personas.user_id','=','users.id')->join('hijos','hijos.persona_id','=','personas.id')->select('hijos.id')->get()[0]->id;
            $message->mensaje=Input::get('mensaje');
            $message->is_read = 0;
            $message->padre_avisa=Input::get('padre_avisa');
            $message->save();
            return Response::json(array("message"=>"El mensaje se envio al hijo","estado"=>"200"));
        }catch(Exception $e){return $e;}
    }

    public function getCountSons(){
      return Persona::join('padres', "personas.id", "=", "padres.persona_id")
      ->join("hijos", "padres.id", "=", "hijos.padre_id")
      ->where("user_id", "=", Auth::user()->id)
      ->count('hijos.padre_id');
    }

    public function followingUpSon(){
      $son = Parent::join('hijos', 'padres.id', '=', 'hijos.padre_id')
      ->join('personas', 'hijos.persona_id', '=', 'personas.id')
      ->where('padres.id', '=', Auth::user()->Person()->first()->Parent()->first()->id)
      ->select('hijos.id', 'personas.nombre', 'personas.apellido_paterno', 'personas.apellido_materno')
      ->get();
      $followingUps = [];
      foreach ($son as $key => $value) {
        $follActsSon = padre::join('hijos', 'padres.id', '=', 'hijos.padre_id')
        ->join('hijos_metas_diarias', 'hijos.id', '=' , 'hijos_metas_diarias.hijo_id')
        ->join('avances_metas', 'hijos_metas_diarias.id', '=', 'avances_metas.avance_id')
        ->where('hijos.id' ,'=', $value['id'])
        ->select('avances_metas.fecha', 'avances_metas.avance as cantidad')
        ->orderBy('avances_metas.fecha', 'desc')
        ->limit(7)
        ->get();
        $name = $value['nombre']." ".$value['apellido_paterno']." ".$value['apellido_materno'];
        array_push($followingUps, array('seguimiento' => $follActsSon, 'hijo' => $name, 'id' => $value['id']));
      }
      return $followingUps;
    }

    public function getScore(){
      return View::make('vista_papa_puntajes');
    }

    public function getAlertsNow(){
      return View::make('vista_papa_alertas');
    }
    public function getUsePlataform(){
        $now = date("Y-m-d");
        $idDad = Auth::user()->Person()->first()->Parent()->first()->id;
        return DB::select(
             "SELECT hijos.id, metas_diarias.meta, count(hijo_realiza_actividades.hijo_id) as 'total_jugados'
             FROM hijos
             inner join hijos_metas_diarias
             on hijos_metas_diarias.hijo_id = hijos.id
             inner join metas_diarias
             on metas_diarias.id = hijos_metas_diarias.meta_diaria_id
             inner join hijo_realiza_actividades on hijo_realiza_actividades.hijo_id = hijos.id
             inner join padres on  hijos.padre_id = padres.id
             where hijos.padre_id = $idDad and hijo_realiza_actividades.created_at
             between  '$now 00:00:00' and '$now 23:59:59'
             group by(hijo_realiza_actividades.hijo_id)"
        );
    }
    public function update(){
        $data    =   Input::all();
        $rules= [
            "username"                  =>"required|user_check|max:50",
            "new_password"              =>"min:8|max:100",
            "cnew_password"             =>"same:new_password",
            "nombre"                    =>"required|max:50",
            "apellidos"                 =>"required|max:60",
            "sexo"                      =>"required|string|size:1",
            "telefono"                  =>"required"
        ];
        if(isset($data["new_password"]) && isset($data["cnew_password"])){
          if($data["new_password"]!="" && $data["cnew_password"]!=""){// if user want to chage password them password current is required
            $rules["old_password"]= "required";
          }
        }
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
               "same"        =>  "Las contraseñas son diferentes",
        ];

        $valid = Validator::make($data,$rules,$messages);
        if($valid->fails()){
            return Response::json(array('status'        => 'CU-104',
                                        "statusMessage" => "Data corrupted",
                                        "message"       => "Algunos datos ingresados son incorrectos, verifica la información ingresada e intenta nuevamente"
                                  ));
        }else{
            $editPass = false;
            if(isset($data["new_password"]) && isset($data["cnew_password"])){
              if($data["new_password"]!="" && $data["cnew_password"]!=""){
                if(Hash::check($data["old_password"],Auth::user()->password)){
                  //update password in this case
                  $user = Auth::user();
                  $user->password = Hash::make($data["new_password"]);
                  $user->save();
                  $editPass = true;
                }else{
                  return Response::json(array('status'     => 'CU-104',
                                        "statusMessage"    => "Data corrupted",
                                        "message"          => "La contraseña que haz ingresado es incorrecta, verifica e intenta nuevamente"
                                  ));
                }

              }
            }
            //$data["password"]=Hash::make($data["new_password"]);
            $user =User::find(Auth::user()->id);
            $user->update($data);
            $person = $user->Person();
            $data_person = [
               "nombre"            =>  $data["nombre"],
               "apellidos"         =>  $data["apellidos"],
               "sexo"              =>  $data["sexo"],
            ];
            $person->update($data_person);
            $rolee = Auth::user()->roles[0]->name;
            if ($rolee == "parent" || $rolee == "padre_free" || $rolee == "demo_padre"){
                $dad = Auth::user()->Person->Dad;
                $dad->update($data);
            }
            $response = array('status'        => 200,
                              'statusMessage' => "success",
                              'message'       =>'Bien echo haz editado tus datos y cambiado tu contraseña correctamente');
            if(!$editPass){
              $response["message"] = "Bien echo haz editado tus datos correctamente";
            }
            return Response::json($response);
        }
    }

    public function getSonsInfo(){
        $idDad = Auth::user()->Person()->first()->Dad()->first()->id;
        $sons = DB::select("SELECT
            hjs.id,concat(prsn.nombre,' ',prsn.apellidos) as 'nombre_completo', hjs.nivel_id
            FROM padres
            INNER JOIN
            hijos hjs
            ON hjs.padre_id = padres.id
            INNER JOIN personas prsn
            ON prsn.id = hjs.persona_id
            WHERE padres.id = '$idDad'
            GROUP BY hjs.id");


        return [
            'sons' => $sons,
        ];

    }
}
