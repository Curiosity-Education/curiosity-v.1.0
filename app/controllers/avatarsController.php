<?php
class avatarsController extends BaseController{
	
	function get(){
		$idSon = Auth::User()->Person()->first()->Son()->pluck('id');
        $info = DB::table('hijos_avatars')
        ->join('avatars_estilos', 'hijos_avatars.avatar_id', '=', 'avatars_estilos.id')
        ->join('avatars', 'avatars_estilos.avatars_id', '=', 'avatars.id')
        ->where('hijos_avatars.hijo_id', '=', $idHijo)
        ->select('avatars.*')
        ->first();
        return $info;
	}
	function save(){
        /*
            Data JSON
            {
                "avatarName" : "TOT",
                "styleName" :  "White",
                "history" :  "Without history",
                "genre" :   "Male",
                "active" : 1,
                "is_default"  : 1,
                "value"  :  ""
            }
        */
		$data = Input::all();
        $file = $data['prevAvatar'];
        $rules = array(
          'avatarName' => 'required',
          'styleName' => 'required',
          'history' => 'required',
          'genre' => 'required',
          'active' =>'required',
          'is_default' => 'required',
          'value' => 'required'
        );
        $messages = ["required" => "El campo :attribute es requerido"];
        $validate = Validator::make($data, $rules, $messages);
        if($validate->fails()){
          return $validate->messages();
        }
        else{
          if($file != null){
            $avatar = new avatar($data);
            $avatar->nombre = $data['avatarName'];
            $avatar->save();
            $targerPath = public_path()."/packages/images/avatars_curiosity/styles/";
            $fileName = "def_avid_".$avatar->id.'_'.md5($file->getClientOriginalName()).".".$file->getClientOriginalExtension();
            $avatarStyle = new AvatarStyle($data);
            $avatarStyle->nombre = $data['avatarName'];
            $avatarStyle->preview = $fileName;
            $avatarStyle->avatars_id = $avatar->id;
            $avatarStyle->save();
            $file->move($targerPath, $fileName);
            $tupla = array(
              'id' => $avatar->id,
              'name' => $avatar->nombre,
              'history' => $avatar->historia,
              'genre' => $avatar->sexo,
              'active' => $avatar->active,
              'preview' => $estilo->preview
            );
            return Response::json(array("status" => "200","statusMessage" => "success","data" => json_encode($tupla)));
          }
          else{
            return Response::json(array("status" => "CU-100","statusMessage" => "File Empty","message" => "The file is empty, please verified"));
          }
        }
	}
	function update(){
        /*
            Data JSON
            {
                "avatarName" : "TOT",
                "styleName" :  "White",
                "history" :  "Without history",
                "genre" :   "Male",
                "active" : 1,
                "is_default"  : 1,
                "value"  :  ""
            }
        */
		$data = Input::all();
        $file = $data['prevAvatar'];
        $rules = array(
          'avatarName' => 'required',
          'history' => 'required',
          'genre' => 'required'
        );
        $messages = ["required" => "El campo :attribute es requerido"];
        $validate = Validator::make($data, $rules, $messages);
        if($validate->fails()){
          return $validate->messages();
        }
        else{
          $avatarStyle = AvatarStyle::where('avatars_id', '=', $datos['id'])
                                  ->where('is_default', '=', '1')
                                  ->first();
          if($file == null){
            $fileName = $estilo->preview;
          }
          else{
            $targerPath = public_path()."/packages/images/avatars_curiosity/styles/";
            $fileName = "def_avid_".$avatarStyle->avatars_id.'_updated_'.md5($file->getClientOriginalName()).".".$file->getClientOriginalExtension();
            $file->move($targerPath, $fileName);
          }
          $avatar = Avatar::where('id', '=', $data['id'])->first();
          $avatar->nombre = $data['avatarName'];
          $avatar->sexo = $data['genre'];
          $avatar->historia = $data['history'];
          $avatar->save();
          $avatarStyle->nombre = $data['avatarName'];
          $avatarStyle->descripcion = $data['history'];
          $avatarStyle->preview = $fileName;
          $avatarStyle->save();
          $tupla = array(
            'id' => $avatar->id,
            'name' => $avatar->nombre,
            'history' => $avatar->historia,
            'genre' => $avatar->sexo,
            'active' => $avatar->active,
            'preview' => $estilo->preview
          );
          return Response::json(array("status" => "200","statusMessage" => "success","data" => json_encode($tupla)));
        }
	}
	function delete(){
		$id = Input::get('data.id');
        Avatar::where('id', '=', $id)->update(array(
          'active' => 0
        ));
        return Response::json(array(0=>'success'));
	}
    function all() {
        $avatars = array(
          'avatars' => Avatar::join('avatars_estilos', 'avatars.id', '=', 'avatars_estilos.avatars_id')
          ->where('avatars.active', '=', '1')
          ->where('avatars_estilos.active', '=', '1')
          ->where('avatars_estilos.is_default', '=', '1')
          ->select('avatars.*', 'avatars_estilos.preview')
          ->get(),
          'tipos' => DB::table('tipos_secuencias')->get()
        );
        return $avatars;
    }
}
?>
