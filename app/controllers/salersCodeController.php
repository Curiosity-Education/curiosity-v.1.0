<?php
class salersCodeController extends BaseController{

   function all(){
      $codes = SalerCode::join("planes", "planes.id", "=", "codigos_vendedores.plan_id")
      ->join("trabajadores", "codigos_vendedores.trabajador_id", "=", "trabajadores.id")
      ->join("puestos", "puestos.id", "=", "trabajadores.puestos_id")
      ->where("trabajadores.active", "=", 1)
      ->where("codigos_vendedores.active", "=", 1)
      ->where("planes.active", "=", 1)
      ->where("puestos.id", "=", 0)
      ->select("trabajadores.*", "codigos_vendedores.*", "planes.*", "codigos_vendedores.id as codigos_vendedoresID")
      ->get();
      return $codes;
   }

	function save(){
      $data = Input::all();
		$rules = array(
			'trabajador_id' => 'required',
         'plan_id' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
			if ($this->hasPlanRelationship($data['trabajador_id'], $data['plan_id']) == true){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$code = new SalerCode($data);
            $code->codigo = $this->makeCode();
				$code->active = 1;
				$code->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
			}
		}
	}

	function update(){
      $data = Input::all();
		$rules = array(
         'id' => 'required',
			'trabajador_id' => 'required',
         'plan_id' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
      else{
         $rel = SalerCode::where("id", "=", $data["id"])->first();
         $rel->active = 0;
         $rel->save();
         $code = new SalerCode($data);
         $code->codigo = $this->makeCode();
         $code->active = 1;
         $code->save();
         return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
      }
	}

	function delete(){
      $data = Input::all();
      $rel = SalerCode::where("id", "=", $data["id"])->first();
      $rel->active = 0;
      $rel->save();
      return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
	}

   private function hasPlanRelationship($emp, $plan){
		$objs = SalerCode::where('trabajador_id', '=', $emp)->select('plan_id', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->plan_id == $plan && $obj->active == 1){ $toLive = true; }
		}
		return $toLive;
	}

   function makeCode(){
      $characters1 = "ABCDEFGHIJKLMNOPQRSTUVWXZ";
      $characters2 = "ABCDEFGHIJKLMNOPQRSTUVWXZ1234567890";
      $mazCharacters = 3;
      $randomCode1 = "";
      $randomCode2 = "";
      for($i=0; $i < $mazCharacters; $i++){
         $randomCode1 .= substr($characters1, rand(0,strlen($characters1)), 1);
         $randomCode2 .= substr($characters2, rand(0,strlen($characters2)), 1);
      }
      return "CE".$randomCode2."-".rand(1000, 9999).$randomCode1."-".date("d").date("m").date("y");
   }

}
?>
