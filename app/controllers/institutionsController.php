<?php

/**
 *
 */
class institutionsController extends BaseController
{

  function all(){
    $institutes = Institute::where('active', '=', 1)->get();
    return $institutes;
  }

  function save(){
    $data = Input::all();
    $rules = array(
      'name' => 'required',
      'type' => 'required',
      'street' => 'required',
      'colony' => 'required',
      'number' => 'required',
      'cp' => 'required',
      'city' => 'required',
      'state' => 'required',
      'adAv-img' => 'required'
    );
    $msjs = Curiosity::getValidationMessages();
    $validation = Validator::make($data, $rules, $msjs);
    if ($validation->fails()) {
      return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
    }else {
      if ($this->NameActiveExist($data['name'])) {
        return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
      }else {

        $user = Auth::user();
        $admin = DB::table("administrativos")->where("user_id", "=", $user->id)->first();
        $file = $data['adAv-img'];
        $randomName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
        $address = new Address($data);
        $address->calle = $data['street'];
        $address->colonia = $data['colony'];
        $address->numero = $data['number'];
        $address->codigo_postal = $data['cp'];
        $address->ciudad_id = $data['city'];
        $address->save();
        $intitution = new Institute($data);
        $intitution->nombre = $data['name'];
        $intitution->active = 1;
        $intitution->tipo = $data['type'];
        $intitution->logo = $randomName;
        $intitution->direccion_id = $address->id;
        $intitution->admin_id = $admin->id;
        $intitution->save();
        $destinationPath = public_path()."/packages/assets/media/images/institutions/";        ;
        $file->move($destinationPath, $randomName);

      }
    }
  }

  private function NameActiveExist($name){
		$objs = Institute::where('nombre', '=', $name)->select('nombre', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->nombre === $name && $obj->active === 1){ $toLive = true; }
		}
		return $toLive;
	}


  function delete(){
    $id = Input::all();
    $Institution = Institute::where('id', '=', $id);
    $Institution->active = 0;
    $Institution->save();
  }

  function update(){
    $data = Input::all();
    $rules = array(
      'name' => 'required',
      'street' => 'required',
      'colony' => 'required',
      'number' => 'required',
      'cp' => 'required',
      'city' => 'required',
      'state' => 'required'
    );
    $msjs = Curiosity::getValidationMessages();
    $validation = Validator::make($data, $rules, $msjs);
    if ($validation->fails()) {
      return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
    }else {

      $file = $data['adAv-img'];
      $user = Auth::user();
      $admin = DB::table("administrativos")->where("user_id", "=", $user->id)->first();
      $institution = Institute::where('id','=',$data["id"])->first();
      $institution->nombre = $data['name'];
      if ($file != null) {
        unlink(public_path()."/packages/assets/media/images/institutions/" . $institution->logo);
        $destinationPath = public_path()."/packages/assets/media/images/institutions/";
        $file->move($destinationPath, $institution->logo);
      }
      $institution->save();
      $address = Address::where('id', '=', $institution->direccion_id)->first();
      $address->calle = $data['street'];
      $address->colonia = $data['colony'];
      $address->numero = $data['number'];
      $address->codigo_postal = $data['cp'];
      $address->ciudad_id = $data['city'];
      return "bien";
    }

  }

  function institutionInfo(){
    $id = Input::all();
    $info = Institute::join("direcciones","instituciones.direccion_id","=","direcciones.id")
    ->where('instituciones.id', '=', $id)
              ->first();
    return $info;
  }

}


 ?>
