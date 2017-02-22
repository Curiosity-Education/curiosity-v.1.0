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
		// We'll check if into database exists the same block's name and that
		// block lives active.
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
		Avatar::where('id', '=', $id)->update(array( 'active' => 0 ));
		$lb = Avatar::where('id', '=', $id)->first();
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $lb));
	}

}


 ?>
