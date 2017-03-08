<?php

/**
 *
 */
class spriteController extends BaseController
{

   public function all(){
      $obj = Sprite::where("active", "=", 1)->get();
      return $obj;
   }

   public function getByAvatarForChild(){
      // $data = Input::all();
      // $obj = Avatar::join("items_groups", "avatars.id", "=", "items_groups.avatar_id")
      // ->join("items", "items_groups.id", "=", "items.item_group_id")
      // ->join("sprites", "items.id", "=", "sprites.item_id")
      // ->join("secuencias", "sprites.secuencia_id", "=", "secuencias.id")
      // ->where("avatars.id", "=", 1)
      // ->where("avatars.active", "=", 1)
      // ->where("items_groups.active", "=", 1)
      // ->where("items.active", "=", 1)
      // ->where("sprites.active", "=", 1)
      // ->select("sprites.*", "items.ruta")
      // ->get();

      $user		= Auth::user();
  		$person 	= Person::where("user_id", "=", $user["id"])->first();
  		$child 	= Son::where("persona_id", "=", $person["id"])->first();

      $obj = DB::table("hijos_has_estilos_avatar")
      ->join("estilos_avatar", "hijos_has_estilos_avatar.estilo_avatar_id", "=", "estilos_avatar.id")
      ->join("sprites", "estilos_avatar.id", "=", "sprites.estilo_avatar_id")
      ->where("hijos_has_estilos_avatar.hijos_id", "=", $child->id)
      ->where("hijos_has_estilos_avatar.is_using", "=", 1)
      ->select("sprites.*", "estilos_avatar.folder")
      ->get();

      return $obj;
   }

  function save(){
    $data = Input::all();
 		$rules = array(
 			'adAv-img' => 'required',
      'widthFrame' => 'required',
      'heightFrame' => 'required',
      'framesY' => 'required',
      'framesX' => 'required',
      'fps' => 'required'
 		);
 		$msjs = Curiosity::getValidationMessages();
 		$validation = Validator::make($data, $rules, $msjs);
 		if( $validation->fails()){
 			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
 		}
 		else{
 		// 	if ($this->NameActiveExist($data['nombre'])){
 		// 		return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
 		// 	}
 		// 	else{

 				$file = $data['adAv-img'];
        $style = AvatarStyle::where("id", "=", $data['estilo_id'])->first();
        $avat = Avatar::find($style->avatar_id);
        $secuencia = Sequence::find($data['secuencia']);
 				$destinationPath = public_path()."/packages/assets/media/images/avatar/sprites/" . $avat->nombre . "/" . $style->folder . "/" . $secuencia->nombre;
        $phName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
 				$file->move($destinationPath, $phName);
 				$sprite = new Sprite($data);
        $sprite->active = 1;
        $sprite->imagen = $phName;
        $sprite->widthFrame = $data['widthFrame'];
        $sprite->heightFrame = $data['heightFrame'];
        $sprite->framesY = $data['framesY'];
        $sprite->framesX = $data['framesX'];
        $sprite->fps = $data['fps'];
        $sprite->estilo_avatar_id = $data['estilo_id'];
        $sprite->secuencia_id = $data['secuencia'];
        $sprite->save();
        $file->move($destinationPath,$phName);

 				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $sprite));
 		// 	}
 		}
  }

  function update(){
    $data = Input::all();
 		$rules = array(
 			'adAv-img' => 'required',
      'widthFrame' => 'required',
      'heightFrame' => 'required',
      'framesY' => 'required',
      'framesX' => 'required',
      'fps' => 'required'
 		);
 		$msjs = Curiosity::getValidationMessages();
 		$validation = Validator::make($data, $rules, $msjs);
 		if( $validation->fails()){
 			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
 		}
 		else{
 		// 	if ($this->NameActiveExist($data['nombre'])){
 		// 		return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
 		// 	}
 		// 	else{

    file = $data['adAv-img'];
    $style = AvatarStyle::where("id", "=", $data['estilo_id'])->first();
    $avat = Avatar::find($style->avatar_id);
    $secuencia = Sequence::find($data['secuencia']);
    $destinationPath = public_path()."/packages/assets/media/images/avatar/sprites/" . $avat->nombre . "/" . $style->folder . "/" . $secuencia->nombre;
    $phName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
    $file->move($destinationPath, $phName);
    $sprite = new Sprite($data);
    $sprite->active = 1;
    $sprite->imagen = $phName;
    $sprite->widthFrame = $data['widthFrame'];
    $sprite->heightFrame = $data['heightFrame'];
    $sprite->framesY = $data['framesY'];
    $sprite->framesX = $data['framesX'];
    $sprite->fps = $data['fps'];
    $sprite->estilo_avatar_id = $data['estilo_id'];
    $sprite->secuencia_id = $data['secuencia'];
    $sprite->save();
    $file->move($destinationPath,$phName);

 				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $avatar));
 		// 	}
 		}
  }

  function delete(){
    $id = Input::all();
    $sprite = Sprite::where("id", "=", $id)->first();
    $sprite->active = 0;
    $sprite->save();
  }

}


 ?>
