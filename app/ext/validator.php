<?php


//******************************//
//	Todas las validaciones	   //
//	personalisadas aquí       //
//***************************//

Validator::extend('alpha_spaces',function($attribute,$value,$parameters){
	return preg_match('/^([-a-zA-Z0-9_-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöùúûüýøþÿÐdŒ\s])+$/i',$value);
});

Validator::extend('letter',function($attribute,$value,$parameters){
	return preg_match('/^[a-zA-Z_-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöùúûüýøþÿÐdŒ\s]*$/', $value);
});

Validator::extend('cvc',function($attribute,$value,$parameters){
	return preg_match('/[0-9]{3}/', $value);
});

Validator::extend('telephone',function($attribute,$value,$parameters){
	return preg_match('/^\([0-9]{3}\){1}\s[0-9]{3}\-[0-9]{4}/',$value);
});

Validator::extend('credit_card',function($attribute,$value,$parameters){
	return preg_match("/^((67\d{2})|(4\d{3})|(5[1-5]\d{2})|(6011))(-?\s?\d{4}){3}|(3[4,7])\ d{2}-?\s?\d{6}-?\s?\d{5}$/",$value);
});

Validator::extend('numero_casa',function($attribute,$value,$parameters){
	return preg_match('/^[0-9]([0-9]{1,3})?([A-Za-z]{1})?$/',$value);
});
Validator::extend('validate_password',function($attribute, $value, $parameters){
	return Hash::check($value, Auth::user()->clave);
});
Validator::extend('user_check',function($attribute, $value, $parameters){
	if(DB::table("users")->where("username","=",$value)->where("username","!=",Auth::user()->username)->get()){
		return false;
	}else return true;
});
