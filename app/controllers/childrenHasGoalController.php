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

}
