<?php

class imageController extends BaseController{
    public function save(){
        $x = round(Input::get("x"));
        $y = round(Input::get("y"));
        $width = round(Input::get("w"));
        $height = round(Input::get("h"));

        if(Input::hasFile('image')){// si se establecio una imagen para recortar
            $bitMapImage = Input::file('image');
            $image = Image::make($bitMapImage->getRealPath());
            $alto = $image->height;
            $ancho = $image->width;

            //guardar imagen original
            $image->save(public_path()."/packages/images/perfil/original/".Auth::user()->username.".".$bitMapImage->getClientOriginalExtension());
            $image->crop($width,$height,$x,$y);
            $imageSave =public_path()."/packages/images/perfil/".Auth::user()->username.".".$bitMapImage->getClientOriginalExtension();

            $image->save($imageSave);

            $profile =Auth::user()->perfil()->first();
            $profile->foto_perfil=Auth::user()->username.".".$bitMapImage->getClientOriginalExtension();
            $profile->save();
            return asset(str_replace(public_path(),"",$imageSave).'?'.$v=rand());
        }else{
            $image = Image::make(public_path().'/packages/images/perfil/original/'.Auth::user()->perfil()->first()->foto_perfil);
            $image->crop($width,$height,$x,$y);
            $path= public_path().'/packages/images/perfil/'.Auth::user()->perfil()->first()->foto_perfil;
            $image->save($path);
            return asset(str_replace(public_path(),"",$path).'?'.$v=rand());
        }
    }
}
