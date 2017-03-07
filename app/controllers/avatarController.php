<?php

/**
 *
 */
class avatarController extends BaseController
{

 public function all(){
    $avatars = Avatar::where("active", "=", 1)->get();
    return $avatars;
 }

 public function getForChild(){
    $avatars = Avatar::where("active", "=", 1)
    ->where("id", "=", 1)
    ->first();
    return $avatars;
 }

  public function view(){
      return View::make('child.selectAvatar');
  }

  function save(){
 		$data = Input::all();
 		$rules = array(
 			'nombre' => 'required',
 			'historia' => 'required',
      'costo' => 'required',
 			'adAv-img' => 'required'
 		);
 		$msjs = Curiosity::getValidationMessages();
 		$validation = Validator::make($data, $rules, $msjs);
 		if( $validation->fails()){
 			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
 		}
 		else{
 			if ($this->NameActiveExist($data['nombre'])){
 				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
 			}
 			else{
 				$file = $data['adAv-img'];
 				$destinationPath = public_path()."/packages/assets/media/images/avatar/sprites/" . $data['nombre'];
        $phName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
 				$file->move($destinationPath, $phName);
 				$avatar = new Avatar($data);
 				$avatar->active = 1;
 				$avatar->historia = $data['historia'];
 				$avatar->nombre = $data['nombre'];
 				$avatar->save();
        $avatarStyle = new AvatarStyle($data);
        $avatarStyle->costo = $data['costo'];
        $avatarStyle->preview = $phName;
        $avatarStyle->active = 1;
        $avatarStyle->avatar_id = $avatar->id;
        $avatarStyle->is_default = 1;
        $avatarStyle->folder = $data['nombre'];
        $avatarStyle->save();

 				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $avatar));
 			}
 		}
 	}

  private function NameActiveExist($name){
		$objs = Avatar::where('nombre', '=', $name)->select('nombre', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->nombre === $name && $obj->active === 1){ $toLive = true; }
		}
		return $toLive;
	}


  public function allStylesAvatars(){
    $avatars = AvatarStyle::where("active", "=", 1)->get();
    return $avatars;
  }

  function delete(){
		$id = Input::all();
		$avatStyle = AvatarStyle::where("avatar_id", "=", $id)->first();
		$avatStyle->active = 0;
		$avatStyle->save();
    $avat = Avatar::where("id", "=", $id)->first();
		$avat->active = 0;
		$avat->save();
	}

  function update(){
    $data = Input::all();
 		$rules = array(
 			'nombre' => 'required',
 			'historia' => 'required',
      'costo' => 'required',
 			'adAv-img' => 'required',
      'id' => 'required'
 		);
 		$msjs = Curiosity::getValidationMessages();
 		$validation = Validator::make($data, $rules, $msjs);
 		if( $validation->fails()){
 			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
 		}
 		else{

      $file = $data['adAv-img'];
      $id = $data["id"];
      $avat = Avatar::where("id", "=", $id) ->first();
      $avat->nombre = $data['nombre'];
      $avat->historia = $data['historia'];
  		$avat->save();
      $avatStyle = AvatarStyle::where("avatar_id", "=", $id) ->first();
      $avatStyle->costo = $data['costo'];
      $avatStyle->nombre = $data['nombre'];
  		$avatStyle->save();
      $deleteFile = public_path() . "/packages/assets/media/images/avatar/sprites/" . $avatStyle->folder. "/" . $avatStyle->preview;
      unlink($deleteFile);
      $destinationPath = public_path() . "/packages/assets/media/images/avatar/sprites/" . $avatStyle->folder;
      $file->move($destinationPath, $avatStyle->preview);

			return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $avatar));

 		}
  }


  function addStyle(){

 		$data = Input::all();
 		$rules = array(
 			'nombre' => 'required',
      'costo' => 'required',
 			'adAv-img' => 'required'
 		);
 		$msjs = Curiosity::getValidationMessages();
 		$validation = Validator::make($data, $rules, $msjs);
 		if( $validation->fails()){
 			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
 		}
 		else{
 			if ($this->NameActiveExist($data['nombre'])){
 				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
 			}
 			else{

        $file = $data['adAv-img'];
        $phName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
        $avatarStyle = new AvatarStyle($data);
        $avatarStyle->nombre = $data['nombre'];
        $avatarStyle->costo = $data['costo'];
        $avatarStyle->active = 1;
        $avatarStyle->preview = $phName;
        $avatarStyle->is_default = 0;
        $avatarStyle->avatar_id = $data['id'];
        $avatarStyle->folder = $data['nombre'];
        $avatarStyle->save();
        $destinationPath = public_path() . "/packages/assets/media/images/avatar/sprites/" . $data['folder'] . "/" . $avatarStyle->folder;
        $file->move($destinationPath,$phName);


 				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $avatarStyle));
 			}
 		}

  }

  function deleteStyle(){
    $id = Input::all();
		$avatStyle = AvatarStyle::where("avatar_id", "=", $id)->first();
		$avatStyle->active = 0;
		$avatStyle->save();
  }

  function updateStyle(){
    $data = Input::all();
 		$rules = array(
 			'nombre' => 'required',
 			'historia' => 'required',
      'costo' => 'required',
 			'adAv-img' => 'required',
      'id' => 'required'
 		);
 		$msjs = Curiosity::getValidationMessages();
 		$validation = Validator::make($data, $rules, $msjs);
 		if( $validation->fails()){
 			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
 		}
 		else{

      $file = $data['adAv-img'];
      $avatStyle = AvatarStyle::where("avatar_id", "=", $data['id']) ->first();
      $avatStyle->costo = $data['costo'];
      $avatStyle->nombre = $data['nombre'];
  		$avatStyle->save();
      $deleteFile = public_path() . "/packages/assets/media/images/avatar/sprites/" . $avatStyle->folder. "/" . $avatStyle->preview;
      unlink($deleteFile);
      $destinationPath = public_path() . "/packages/assets/media/images/avatar/sprites/" . $avatStyle->folder;
      $file->move($destinationPath, $avatStyle->preview);

			return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $avatStyle));

 		}
  }


	function childHasAvatar(){
		$id_child = DB::table('hijos')
			->select('users.flag')
			->join('personas','hijos.persona_id','=','personas.id')
			->join('users','personas.user_id','=','users.id')
			->where('users.id','=',Auth::user()->id)
			->first()->flag;

		return Response::json(array('status' 		=> 200,
									'statusMessage' => 'success',
									'message'		=> 'khegf',
									'data'			=> $id_child
								   ));
	}

	function avatarAnimated(){

	}

	function avatarStyles(){

	}

	function selectedAvatar(){

	}

}




 ?>
