<?php

class childrenHasAvatarController extends BaseController{

    public function save(){
        $av = Input::get('data');
        $myId = Auth::User()->Peson()->first()->Son()->pluck('id');
        DB::table('hijos_avatars')->insert(array(
            'hijo_id' => $myId,
            'avatar_id' => $av
        ));
        $us = Auth::user();
        $us->flag = 0;
        $us->save();
        return Response::json(array("status" => 200, "statusMessage" => "success"));
    }
}
