<?php

class childrenHasGoal extends BaseController{

   public function update(){
      $data = Input::all();
      $son  = Auth::User()->Person()->first()->Son()->first();
      DB::table('hijos_metas_diarias')
      ->where('hijo_id', '=', $son->id)
      ->update(array( 'meta_diaria_id' => $data["id"] ));
      return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => null));
   }

   public function getChildSelected(){
      $user    = Auth::user();
      $person  = Person::where("user_id", "=", $user["id"])->first();
      $idSon   = Son::where("persona_id", "=", $person["id"])->first()["id"];
      $data    = DB::table("hijos_metas_diarias")
      ->join("metas_diarias", "hijos_metas_diarias.meta_diaria_id", "=", "metas_diarias.id")
      ->where("hijos_metas_diarias.hijo_id", "=", $idSon)
      ->select("metas_diarias.*")
      ->first();
      return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $data));
   }

}
