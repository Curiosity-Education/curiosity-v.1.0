<?php
class sponsoredController extends BaseController{

    function getChildren(){
        $data = Input::all();
        $children = Children::where("institucion_id", "=", $data)->where('active', '=', 1)->get();
        $folder = DB::table('instituciones')->where('id', '=', $data)->first();
        return ["children" => $children, "folder" => Curiosity::clean_string($folder->nombre)];
    }


    function save(){
        $data = Input::all();
        $file = $data['agf_photo'];
        $rules = array(
            'nombre'            => 'required',
            'apellidos'         => 'required',
            'sexo'              => 'required',
            'institucion_id'    => 'required',
            'apadrinado'        => 'required'
		);
        $msjs = Curiosity::getValidationMessages();
        $validation = Validator::make($data, $rules, $msjs);
        if( $validation->fails()){
            return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
        else {
            $inst = DB::table('instituciones')->where('id', '=', $data["institucion_id"])->first();
            $destinationPath = public_path()."/packages/assets/media/images/padrino_curiosity/".Curiosity::clean_string($inst->nombre)."/";
            $imgName = Curiosity::clean_string($data["nombre"]." ".$data["apellidos"]).".".$file->getClientOriginalExtension();
            $file->move($destinationPath, $imgName);
            $child = new Children($data);
			$child->foto = $imgName;
            $child->save();
            $folder = DB::table('instituciones')->where('id', '=', $child->institucion_id)->first();
			return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => [
                "child"     =>$child,
                "folder"    =>Curiosity::clean_string($folder->nombre)
            ]));
        }
    }

    function update(){
        $data = Input::all();
        $file = $data['agf_photo'];
        $rules = array(
            'nombre'            => 'required',
            'apellidos'         => 'required',
            'sexo'              => 'required',
            'institucion_id'    => 'required',
            'apadrinado'        => 'required'
		);
        $msjs = Curiosity::getValidationMessages();
        $validation = Validator::make($data, $rules, $msjs);
        if( $validation->fails()){
            return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
        else {
            $child = Children::where("id", "=", $data["id"])->first();
            if ($file != null){
                $inst = DB::table('instituciones')->where('id', '=', $data["institucion_id"])->first();
                $destinationPath = public_path()."/packages/assets/media/images/padrino_curiosity/".Curiosity::clean_string($inst->nombre)."/";
                unlink($destinationPath.$child->foto);
                $imgName = Curiosity::clean_string($data["nombre"]." ".$data["apellidos"]).".".$file->getClientOriginalExtension();
                $file->move($destinationPath, $imgName);
                $child->foto = $imgName;
            }
            $child->nombre = $data["nombre"];
            $child->apellidos = $data["apellidos"];
            $child->sexo = $data["sexo"];
            $child->apadrinado = $data["apadrinado"];
            $child->save();
            $folder = DB::table('instituciones')->where('id', '=', $child->institucion_id)->first();
			return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => [
                "child"     => $child,
                "folder"    => Curiosity::clean_string($folder->nombre)
            ]));
        }
    }

    function delete(){
        $data = Input::all();
        $child =  Children::where("id", "=", $data["id"])->first();
        $child->active = 0;
        $child->save();
        return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => ["child" => $child]));
    }


}
