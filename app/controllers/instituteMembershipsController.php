<?php
use Carbon\Carbon;
class instituteMembershipsController extends BaseController{

    protected $institute = null;
    protected $name = 'inst';
    private $usersData = [];
    private function createUserName($folio){
        /*
        *    Nomenclature for username will be :
        *
        *    [name institute(The First 3 letters)] + [user-] + [folio (0-9)]
        */
        return substr($this->name,0,4).'User-'.$folio;
    }
    private function createPassUser(){
        /*
        *    Nomenclature for password will be :
        *
        *    [name institute(The First 3 letters)] + [folio (A-Z0-9){4}]
        */
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $lengthCadena=strlen($cadena);
        $pass = substr($this->name,0,4);
        $lengthFolio=4;
        for($i=1 ; $i<=$lengthFolio ; $i++){
            $pos=rand(0,$lengthCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }
    public function generateMemebers($range,$idInstitute){
        /*
            This function recived 2 params
            * range_memberships
            * institute_id
        */
        $instituteObj = Institute::where('id', '=', $idInstitute)->first();
        $name = Curiosity::clean_string($instituteObj->nombre);
        $dst = array('range_memberships' => $range, 'name_institute' => $name , 'institute_id' => $idInstitute);//Input::all();
        $numMembUser = $dst['range_memberships'];
        $this->name = $dst['name_institute'];
        $data = array(
                'username' => 'root_'.$this->name,
                'role'  => 'parent',
                'folio' => 0,
                'type' => 'Usuario administrativo',
                'institute_id' => $dst['institute_id']
            );
        $userParent = $this->createUser($data);
        $parent_id = $this->createParent($userParent->personID,$dst['institute_id']);
        $this->matchInstitute($userParent->userID,1,$data['folio']);
        for ($i = 0; $i < $numMembUser; $i++){
            $folio = $i + 1;
            $data = array(
                'username' => $this->createUserName($folio),
                'role'  => 'child',
                'type' => 'Usuario niño',
                'institute_id' => $dst['institute_id']
            );
            $userData = $this->createUser($data);
            $this->matchInstitute($userData->userID,$dst['institute_id'],$folio);
            $this->createSon($userData->personID,$parent_id);
        }
        Excel::create('lista_usuarios_'.$this->name, function($excel) use($data) {

            $excel->sheet('Usuarios Asignados', function($sheet) use($data) {

                $sheet->fromArray($this->usersData);
                // Font family
                $sheet->setFontFamily('Calibri');

                // Font size
                $sheet->setFontSize(14);

                // Set all margins
                $sheet->setPageMargin(0.25);

                $sheet->cells('A1:C1', function($cells) {
                    // Set with font color
                    $cells->setFontColor('#ffffff');
                    $cells->setBackground('#081c41');
                    // Set font family
                    $cells->setFontFamily('Calibri');

                    // Set font size
                    $cells->setFontSize(16);
                    // Set alignment to center
                    $cells->setAlignment('center');

                });

            });
            // Set the title
            $excel->setTitle('Usuarios de la Institución '.$this->name);

            // Chain the setters
            $excel->setCreator('Curiosity Educación')
                  ->setCompany('Curiosity Educación');

            // Call them separately
            $excel->setDescription('Archivo excel para informe de datos de usuarios asignados a la institución');

        })->export('xlsx');
        return Redirect::back();

    }

    private function createUser($dst = []){
        $user = new User();
        $passDesHash = $this->createPassUser();
        array_push($this->usersData,array('Usuario' => $dst['username'], 'Contraseña' => $passDesHash,'Tipo'=>$dst['type']));
        $user->username= $dst['username'];
        $user->password=Hash::make($passDesHash);
        $user->active=1;
        $user->token= sha1($dst['username']);
        $user->save();
        $user->attachRole(Role::where('name','=',$dst['role'])->first()->id);
        $person = new Person();
        $person->nombre = 'No definido';
        $person->apellidos = 'No definido';
        $person->sexo = 'o';
        $person->user_id = $user->id;
        $person->save();

        return (object)array('userID' => $user->id,'personID' => $person->id);
    }
    private function matchInstitute($user_id,$institute_id,$folio){
        $instituteUser = new InstituteUser();
        $instituteUser->folio = $folio;
        $instituteUser->active = 1;
        $instituteUser->user_id = $user_id;
        $instituteUser->institucion_id = $institute_id;
        $instituteUser->save();
    }
    private function createParent($person_id,$institute_id){
        $parent = new Dad();
        $parent->email = is_null(Institute::find($institute_id)->first()->email) ? 'indefinido' : Institute::find($institute_id)->first()->email;
        $parent->telefono = is_null(Institute::find($institute_id)->first()->telefono) ? 'indefinido' : Institute::find($institute_id)->first()->telefono;
        $parent->persona_id = $person_id;
        $parent->foto_perfil = 'dad-def.png';
        $parent->save();
        return $parent->id;
    }
    private function createSon($person_id,$parent_id){
        $son = new Son();
        $son->promedio_inicial = '8.00';
        $son->persona_id = $person_id;
        $son->padre_id = $parent_id;
        $son->nivel_id = Level::where('active','=',1)->first()->id;
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
				$banner = DB::table('hijos_has_accesorios')->insert(array(
	             'hijo_id'      => $son->id,
	             'accesorio_id' => 5,
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
    }

    public function getHomes(){

         $housesHomes = DB::table('instituciones')
            ->join('direcciones','instituciones.direccion_id','=','direcciones.id')
            ->join('ciudades','direcciones.ciudad_id','=','ciudades.id')
            ->where('instituciones.tipo','=','Casa Hogar')
            ->where('instituciones.visible','=',1)
            ->select('instituciones.*')
            ->get();

        $ninos = Institute::all();

        return View::make('landing.home_children',array('casasHogares' => $housesHomes, 'niños' => $ninos));

    }

    public function getChildren(){

        $idcasaHogar = Input::all();

        $datos = DB::table('children')
            ->where('institucion_id','=',$idcasaHogar['id'])
            ->select('children.*')
            ->get();

        $folder = DB::table('instituciones')->where('id', '=', $idcasaHogar['id'])->first();

        return Response::json(array(

            'status'        => 200,
            'statusMessage' => 'success',
            'data'          => [
                "child" => $datos,
                "folder" => Curiosity::clean_string($folder->nombre)
            ]

        ));

    }

    public function render($id){
        //get data from institutions
        $ints = Institute::join("direcciones","direcciones.id","=","instituciones.direccion_id")
                        ->join("ciudades","ciudades.id","=","direcciones.ciudad_id")
                        ->where("instituciones.active","=","1")
                        ->where("instituciones.id","=",$id)
                        ->select("instituciones.nombre","tipo","logo","calle","colonia","numero","codigo_postal","ciudades.nombre as ciudad")
                        ->first();
       // $this->institute = $ints;
        if($ints){
            //Get users from institutions
            $ints->usuarios = User::join("institucion_usuario","institucion_usuario.user_id","=","users.id")
                            ->join("instituciones","instituciones.id","=","institucion_usuario.institucion_id")
                            ->where("institucion_usuario.active","=","1")
                            ->where("instituciones.active","=","1")
                            ->where("users.active","=","1")
                            ->where("instituciones.id","=",$id)
                            ->select("users.*","institucion_usuario.folio")
                            ->get();
            return View::make("administer.admin-schools-membership")->with("data",$ints);
        }else{
            return View::make("errors.404");
        }

    }
}
