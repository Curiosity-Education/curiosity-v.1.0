<?php
class avatarStylesController extends BaseController{

	function get(){

	}
	function save(){
		$data = Input::all();
        $file = $data['prevAvatar'];
        $rules = array(
          'name' => 'required',
          'value' => 'required|integer',
          'description' => 'required'
        );
        $messages = [
          "required" => "El campo :attribute es requerido",
          "integer" => "El valor de adquisición debe ser numérico sin decimal"
        ];
        $validate = Validator::make($data, $rules, $messages);
        if($validate->fails()){
          return $validate->messages();
        }
        else{
          if($file != null){
            $targerPath = public_path()."/packages/images/avatars_curiosity/styles/";
            $fileName = "style_avid_".$data['avatars_id'].'_'.md5($file->getClientOriginalName()).".".$file->getClientOriginalExtension();
            $avatarStyle = new AvatarStyle($data);
            $avatarStyle->preview = $fileName;
            $avatarStyle->save();
            $file->move($targerPath, $fileName);
            return Response::json(array("status" => "200","statusMessage" => "success","data" => json_encode($avatarStyle)));
          }
          else{
            return Response::json(array("status" => "CU-100","statusMessage" => "File Empty","message" => "The file is empty, please verified"));
          }
        }
	}
	function update(){
		$data = Input::all();
        $file = $data['prevAvatar'];
        $rules = array(
          'name' => 'required',
          'value' => 'required|integer',
          'description' => 'required'
        );
        $messages = [
          "required" => "El campo :attribute es requerido",
          "integer" => "El valor de adquisición debe ser numérico sin decimal"
        ];
        $validate = Validator::make($data, $rules, $messages);
        if($validate->fails()){
          return $validate->messages();
        }
        else{
          $avatarStyle = AvatarStyle::where('id', '=', $data['id'])->first();
          if($file == null){
            $fileName = $avatarStyle->preview;
          }
          else{
            $targerPath = public_path()."/packages/images/avatars_curiosity/estilos/";
            $fileName = "style_avid_".$avatarStyle->avatars_id.'_updated_'.md5($file->getClientOriginalName()).".".$file->getClientOriginalExtension();
            $file->move($targerPath, $fileName);
          }
          $avatarStyle->nombre = $data['nombre'];
          $avatarStyle->descripcion = $data['descripcion'];
          $avatarStyle->valor = $data['valor'];
          $avatarStyle->preview = $fileName;
          $avatarStyle->save();
          return Response::json(array("status" => "200","statusMessage" => "success","data" => json_encode($avatarStyle)));
        }
	}
	function delete(){
		$id = Input::get('data');
        AvatarStyle::where('id', '=', $id)->update(array(
          'active' => 0
        ));
        return Response::json(array("status" => "200","statusMessage" => "success"));
	}
    function find(){
        $id = Input::get('data');
        $styles = avatarestilo::where('active', '=', '1')
                               ->where('avatars_id', '=', $id)
                               ->get();
        $row = array();
        foreach ($styles as $key => $value) {
          array_push($row, json_encode($value));
        }
        return $row;
    }


    public static function getInfo(){
        $idSon = Auth::User()->Person()->first()->Son()->pluck('id');
        $info = DB::table('hijos_avatars')
        ->join('avatars_estilos', 'hijos_avatars.avatar_id', '=', 'avatars_estilos.id')
        ->where('hijos_avatars.hijo_id', '=', $idSon)
        ->select('avatars_estilos.*')
        ->first();
        return $info;
    }

    public static function get(){
        $avatarId = AvatarStyleController::getInfo()->avatars_id;
        $avatarStyle = avatar::join('avatars_estilos', 'avatars.id', '=', 'avatars_estilos.avatars_id')
            ->join('secuencias', 'avatars_estilos.id', '=', 'secuencias.avatar_estilo_id')
            ->join('tipos_secuencias', 'secuencias.tipo_secuencia_id', '=', 'tipos_secuencias.id')
            ->where('avatars.active', '=', '1')
            ->where('avatars_estilos.active', '=', '1')
            ->where('avatars.id', '=', $avatarId)
            ->where('tipos_secuencias.nombre', '=', 'esperar')
            ->select('avatars_estilos.*')
            ->groupBy('avatars_estilos.id')
            ->get();
        return $avatarStyle;
    }
}
?>
