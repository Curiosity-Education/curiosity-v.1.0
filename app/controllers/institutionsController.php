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
    // return $data;
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
        $file = $data['adAv-img'];
        $randomName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
        $address = new Address($data);
        $address->calle = $data['street'];
        $address->colonia = $data['colony'];
        $address->numero = $data['number'];
        $address->codigo_postal = $data['cp'];
        $address->ciudad_id = $data['city'];
        $address->save();
        $admin = DB::table("administrativos")->where("user_id", "=", $user->id)->first();
        $institution = new Institute($data);
        $institution->nombre = $data['name'];
        $institution->active = 1;
        $institution->tipo = $data['type'];
        $institution->logo = $randomName;
        $institution->direccion_id = $address->id;
        $institution->admin_id = $admin->id;
        $institution->save();
        $destinationPath = public_path()."/packages/assets/media/images/institutions/";
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

  // function update(){
  //   $data = Input::all();
  //   $rules = array(
  //     'name' => 'required',
  //     'type' => 'required',
  //     'street' => 'required',
  //     'colony' => 'required',
  //     'number' => 'required',
  //     'cp' => 'required',
  //     'city' => 'required',
  //     'state' => 'required'
  //   );
  //   $msjs = Curiosity::getValidationMessages();
  //   $validation = Validator::make($data, $rules, $msjs);
  //   if ($validation->fails()) {
  //     return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
  //   }else {
  //     if ($this->NameActiveExist($data['nombre'])) {
  //       return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
  //     }else {
  //       $file = $data['adIn-img'];
  //       $randomName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
  //       $address = new Address($data);
  //       $address->calle = $data['street'];
  //       $address->colonia = $data['colony'];
  //       $address->numero = $data['number'];
  //       $address->codigo_postal = $data['cp'];
  //       $address->ciudad = $data['city'];
  //       $address->save();
  //       $intitution = new Institute($data);
  //       $institution->nombre = $data['name'];
  //       $institution->active = 1;
  //       $Institution->tipo = $data['type'];
  //       $Institution->logo = $randomName;
  //       $Institution->direccion_id = ;
  //       $Institution->admin_id = ;
  //       $Institution->save();
  //       $destinationPath = public_path()."/packages/assets/media/images/institutions/" . $data['nombre'];
  //       $file->move($destinationPath, $randomName);
  //     }
  //   }
  //
  // }

  function institutionInfo(){
    $id = Input::all();
    $infoInsti = Institute::where('id', '=', $id)->first();    
    $infoAddres = Address::where('id', '=', $infoInsti->direccion_id)->first();
    return array($infoAddres, $infoInsti);
  }

}


 ?>
