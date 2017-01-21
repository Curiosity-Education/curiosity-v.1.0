<?php
class employeeController extends BaseController{

	function all(){
		$empl = Employee::where('active', '=', 1)->get();
		return $empl;
	}

	function getByPosition(){
      $data = Input::all();
		$emp = Employee::where("active", "=", 1)
		->where("puestos_id", "=", $data)
		->get();
		return $emp;
	}

	function getBySalers(){
		$emp = Employee::where("active", "=", 1)
		->where("puestos_id", "=", 0)
		->get();
		return $emp;
	}

	function save(){
		$data = Input::all();
		$file = $data['aemp_photo'];
		$rules = array(
			'nombre' => 'required',
         'apellidos' => 'required',
         'telefono' => 'required',
         'sexo' => 'required',
         'puesto' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
         if($file != null){
				$destinationPath = public_path()."/packages/assets/media/images/employees/";
				$imgName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
				$file->move($destinationPath, $imgName);
			}
			else{
				$imgName = 'employeeDef.png';
			}
			$employee = new Employee($data);
			$employee->foto = $imgName;
			$employee->puestos_id = $data["puesto"];
			$employee->active = 1;
			$employee->save();
			return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $employee));
		}
	}

   function update(){
      $form = Input::all();
      $file = $form['aemp_photo'];
      $rules = array(
			'nombre' => 'required',
         'apellidos' => 'required',
         'telefono' => 'required',
         'sexo' => 'required',
         'puesto' => 'required'
		);
      $msjs = Curiosity::getValidationMessages();
      $validate = Validator::make($form, $rules, $msjs);
      if($validate->fails()){
         return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
      }
      else{
         $empUp = Employee::where("id", "=", $form['id'])->first();
         if($file != null){
            $destinationPath = public_path()."/packages/assets/media/images/employees/";
            $name = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
            $file->move($destinationPath, $name);
            if ($empUp->foto != "employeeDef.png"){
               unlink($destinationPath.$empUp->foto);
            }
            $empUp->foto = $name;
         }
         $empUp->nombre = $form['nombre'];
         $empUp->apellidos = $form['apellidos'];
         $empUp->correo = $form['correo'];
         $empUp->telefono = $form['telefono'];
         $empUp->sexo = $form['sexo'];
         $empUp->save();
         return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $empUp));
      }
   }

	function delete(){
		$id = Input::all();
		Employee::where('id', '=', $id)->update(array( 'active' => 0 ));
		$empl = Employee::where('id', '=', $id)->first();
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $empl));
	}

}
?>
