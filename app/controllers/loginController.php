<?php
class loginController extends BaseController{

   public function logIn(){
      $data = Input::all();
      $rules = array(
         "username" => "required",
         "password" => "required"
      );
      $msjs = Curiosity::getValidationMessages();
      $validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
      else{
         $auth = array(
            'username'  =>  $data["username"],
            'password'  =>  $data["password"],
            'active'    =>  1
         );
         if(Auth::attempt($auth)){
            if (Auth::user()->hasRole('hijo')){
               $idSon = Auth::user()->persona()->first()->hijo()->first()->id;
               $membershipPlan = MembershipPlan::where('hijo', '=', $idSon)->first();
               if($$membershipPlan  == null){
                  return Response::json(array(0=>'success', 1=>'h'));
               }
               else if($$membershipPlan->active == 1){
                  return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => ""));
               }
               else{
                  Auth::logout();
                  return Response::json(array("status" => "CU-105", 'statusMessage' => "Past Due", "data" => null));
               }
            }
            else{
               return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => "view-administer.admin-teachers"));
            }
         }
         else {
            return Response::json(array("status" => "CU-106", 'statusMessage' => "Access denied", "data" => null));
         }
      }
   }

   public function logOut(){
      Auth::logout();
      return Redirect::to('/');
   }

  function verPagina()
  {
    if(Request::method() == 'POST')
        {
          /*We store in the $Form variable all values obtained*/
          $Form = Input::get('data'); //datos
          /*We create the validation rules for these values*/
          $Rules= array(
            'username' => 'required',
            'password' => 'required'
          );
          $messages = array(
            'required' => 'Ingresar Contraseña'
          );
          /*We create validation by saying that data
          * And how will they be validated
          */
          if($Form){
              $Validate  = Validator::make($Form, $Rules, $messages);
              /* We verified whether the data were validated*/
              if($Validate->fails())
              {
                  /*We return the validation errors found*/
                 return $Validate->messages();
              }
              else
              {
                /*We create the array to send the data
                *to user authentication*/
                $ValidateAuth = array(
                    'username'  =>  Input::get('data.username'),
                    'password'  =>  Input::get('data.password'),
                    'active'    =>  1
                );
                  /*We see if the credentials are incorrect*/
                  if(Auth::attempt($ValidateAuth)){
                    /*Guarda la info de la session*/
                    // if(Auth::user()->sesion_info == null){
                    //     $session = new sesionInfo(Input::get('data'));
                    //     $session->users_id = Auth::user()->id;
                    //     $session->device = str_replace(".local","",gethostname());
                    //     $session->save();
                    // }
                    // else{
                    //     $sessionCurrent = sesionInfo::find(Auth::user()->sesion_info->id);
                    //     $sessionCurrent->device = str_replace(".local","",gethostname());
                    //     $sessionCurrent->users_id = Auth::user()->id;
                    //     $sessionCurrent->app_version = Input::get('data.app_version');
                    //     $sessionCurrent->mobile = Input::get('data.mobile');
                    //     $sessionCurrent->browser = Input::get('data.browser');
                    //     $sessionCurrent->save();
                    //
                    // }
                    /*Fin de guardado de sesión*/
                    //Ingresamos un id de session
                    // $idSession = $this->generaidSession();
                    // User::where('id','=',Auth::user()->id)->update(array('id_session'=>$idSession));
                    // Session::put('sessionId',$idSession);
                    if (Auth::user()->hasRole('hijo') || Auth::user()->hasRole('demo_hijo') || Auth::user()->hasRole('hijo_free')){
                      $idSon = Auth::user()->persona()->first()->hijo()->first()->id;
                      $membershipPlan = membresiaPlan::where('hijo_id','=',$idSon)->first();
                        if($$membershipPlan  == null)
                            return Response::json(array(0=>'success', 1=>'h'));
                        else if($$membershipPlan->active == 1)
                            return Response::json(array(0=>'success', 1=>'h'));
                        else{
                            Auth::logout();
                            return Response::json(array(0=>'past_due', 1=>'h',2=>"La membresia no ha sido pagada y ha sido suspendida"));
                        }
                    }
                    else{
                      return Response::json(array(0=>'success', 1=>'o'));
                    }
                  }
                  else{
                    return Response::json(array(0=>'error'));;
                  }
              }
          }
          else{
              //---This else will respond to Android
              $validateAuth = array(
                    'username'  =>  Input::get('username'),
                    'password'  =>  Input::get('password'),
                    'active'    =>  1
                );
               /*We see if the credentials are incorrect*/
                  if(Auth::attempt($validateAuth)){
                    //Enter a session id
                    if(Auth::user()->hasRole('padre')){
                        try{
                            $idSession = $this->generaidSession();
                            User::where('id','=',Auth::user()->id)->update(array('id_session'=>$idSession));
                            Session::put('sessionId',$idSession);
                            $person = Auth::user()->persona()->first();
                            $idparent =Auth::user()->persona()->first()->padre()->first()->id;
                            $email = Auth::User()->persona()->first()->padre()->pluck('email') == null ? "Sin email" : Auth::User()->persona()->first()->padre()->pluck('email');
                            $full_name = $person->nombre." ".$person->apellidos;
                            return Response::json(array("estado"=>"200",
                                                        "message"=>"success",
                                                        "email"=>  $email,
                                                        "username"=>Auth::user()->username,
                                                        "nombre_completo"=>$full_name,
                                                        "padre_id"=>$idparent
                                                ));
                        }catch(Exception $e){return $e;}
                    }else return Response::json(array("estado"=>"404","message"=>"No eres padre"));
                  }
                  else{
                    return Response::json(array("estado"=>"404","message"=>"No se encontro el usuario"));
                  }
          }
        }
      else{
        // return User::where('users.id', '=', 9)
        // ->join('perfiles', 'users.id', '=', 'perfiles.users_id')
        // ->select('perfiles.foto_perfil')->get();
         // $skin = Skin::where('skin', '=', 'skin-blue')->pluck('id');
         // $user = new User();
         // $user->username = 'contenido';
         // $user->password = Hash::make('12345');
         // $user->active = 1;
         // $user->token = Hash::make('contenido');
         // $user->skin_id = $skin;
         // $user->save();
         // $myRole = DB::table('roles')->where('name', '=', 'content manager')->pluck('id');
         // $user->attachRole($myRole);
         // $profile = new Perfil();
         // $profile->foto_perfil = 'perfil-default.jpg';
         // $profile->users_id = $usuario->id;
         // $profile->save();
         // return "se registro al usuario: ".$user->username;
         return View::make('vista_login');
      }
    }

    public function checkUser(){
      $rules = array(
        'username' => 'required'
      );
      $Validate  = Validator::make(Input::get('data'), $rules);
      /*We verified whether the data were validated*/
      // if($Validate->fails())
      // {
      //   /*We return the validation errors found*/
      //    return $Validate->messages();
      // }
      // else{
        $User = User::where('username', '=',Input::get('data'))
        ->where('active', '=', 1)
        ->first();
        if($User == ''){
          return Response::json(array(0=>'null'));
        }
        else{
          return $User->perfil()->get();
        }
      // }
    }
    public function fb(){
        $validateAuth = array(
            'username' => Input::get('first_name').' '.Input::get('last_name'),
            'password' => Input::get('id')
        );
        /*We see if the credentials are incorrect*/
                  if(Auth::attempt($ValidateAuth)){
                        $idSession = $this->generaidSession();
                        User::where('id','=',Auth::user()->id)->update(array('id_session'=>$idSession));
                        Session::put('sessionId',$idSession);
                        return Response::json(array(0=>'success'));
                  }
                  else{
                     $user = new User();
                        $user->username=Input::get('first_name').' '.Input::get('last_name');
                        $user->password=Hash::make(Input::get('id'));
                        $user->token=sha1(Input::get('email'));
                        $user->active = 1;
                        $user->skin_id=skin::all()->first()->id;
                        $user->save();
                        Session::put('crypt',Crypt::encrypt($user->password));
                        $myRole = DB::table('roles')->where('name', '=', 'padre-fb')->pluck('id');
                        $user->attachRole($myRole);
                        $person = new persona();
                        $person->nombre = Input::get('first_name');
                        $person->apellido_paterno = Input::get('last_name');
                        if(Input::get('gender') == 'male'){
                            $person->sexo = 'm';
                        }
                        else
                            $person->sexo = 'f';
                        $person->user_id=$user->id;
                        $person->save();
                        $parent = new padre();
                        $parent->persona_id   = $persona->id;
                        $parent->email = (Input::get('email') == '')?'Sin email':Input::get('email');
                        $parent->save();
                        $profile = new perfil();
                        $profile->foto_perfil=Input::get('picture')['data']['url'];
                        $profile->gustos="¿Cuáles son tus gustos?";
                        $profile->users_id=$user->id;
                        $profile->save();
                        $idSession = $this->generaidSession();
                            if(Auth::attempt($validarAuth)){
                            $idSession = $this->generaidSession();
                            User::where('id','=',Auth::user()->id)->update(array('id_session'=>$idSession));
                            Session::put('sessionId',$idSession);
                            return Response::json(array(0=>'success'));
                      }
                  }
    }
    public function recoverCont($token = null){
        if($token == null){
            if(Request::method() == "GET")
                return View::make("vista_recuperacion_de_contrasena");
            else{
                $user = User::join('personas','personas.user_id','=','users.id')
                        ->join('padres','padres.persona_id','=','personas.id')
                        ->where('email','=',Input::get('email'))->select(DB::raw("personas.nombre,personas.apellido_paterno,users.id as 'id', padres.email as 'email'"))->get();
                if(!empty($user[0])){
                    $token = md5($user[0]->email);
                    $user = User::find($user[0]->id);
                    $user->token = $token;
                    $user->save();
                      $dataSend = [
                          "name"     =>       "Equipo Curiosity",
                          "client"   =>       $user[0]->nombre." ".$user[0]->apellido_paterno,
                          "email"    =>       $user[0]->email,
                          "subject"  =>       "Recuperar Contraseña",
                          "token"    =>       $token
                      ];
                      $toEmail=$user[0]->email;
                      $toName=$dataSend["email"];
                      $subject =$dataSend["subject"];
                      try {
                          Mail::send('emails.recuperar_password',$dataSend,function($message) use($toEmail,$toName,$subject){
                              $message->to($toEmail,$toName)->subject($subject);
                          });
                      } catch (Exception $e) {
                          $code = $e->getCode();
                          return $e;
                      }
                    return Response::json(array('status'=>'200','message'=>"Se ha enviado un link de recuperación a su correo",'data'=>$user));
                }
                else{
                    return Response::json(array('status'=>'404','message'=>"El correo nunca se ha utilzado para una cuenta Curiosity. Porfavor ingresa el correo con el que te registraste"));
                }
            }
        }
        else{
            if(Request::method() == "GET"){
                if(User::where('token','=',$token)->get()){
                    Session::put('token_change_curiosity',$token);
                    return View::make('vista_cambiar_pass');
                }
                else{
                    return View::make("view-error404");
                }
            }
            else{
                if($token == "d4t4p4r4c4mbi0d3p45word"){
                   try{
                       $user = User::where('token','=',Session::get('token_change_curiosity'))->get();
                       User::find($user[0]->id)->update(array('password'=>Hash::make(Input::get('newPass'))));
                       return Response::json(array('status'=>'200','message'=>'La contraseña ha sido cambiada'));
                   }
                   catch(Exception $e){
                       return Response::json(array('status'=>$e->getCode(),'message'=>Response::json($e)));
                   }
                }
            }
        }
    }
    private function generateidSession(){
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $lengthCadena=strlen($cadena);
    $folio = "";
    $lengthFolio=10;
    for($i=1 ; $i<=$longitudFolio ; $i++){
      $pos=rand(0,$longitudCadena-1);
      $folio .= substr($cadena,$pos,1);
    }
    return $folio;
  }

}
?>
