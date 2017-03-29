<?php
class sponsoredController extends BaseController{

    function getChildren(){
        $data = Input::all();
        $children = Children::where("institucion_id", "=", $data)->get();
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
			return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $child));
        }
    }


}
