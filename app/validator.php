<?php

	/*
	|--------------------------------------------------------------------------
	| Custom validation here
	|--------------------------------------------------------------------------
	|
	| This section is for create custom validation of input data of client and
	| this data is resived in served and validate with this validations
	| 	
	*/

//this validation accept letter width spaces
Validator::extend('alpha_spaces',function($attribute,$value,$parameters){
	return preg_match('/^([-a-zA-Z0-9_-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöùúûüýøþÿÐdŒ\s])+$/i',$value);
});

//this password is for validate a double number or float number
Validator::extend('decimal',function($attribute,$value,$parameters){
	return preg_match('/^(\d|-)?(\d|,)*\.?\d*$/',$value);
});
// this validation accept only letters with accents
Validator::extend('letter',function($attribute,$value,$parameters){
	return preg_match('/^[a-zA-Z_-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöùúûüýøþÿÐdŒ\s]*$/', $value);
});
// this validation validate a cvc target
Validator::extend('cvc',function($attribute,$value,$parameters){
	return preg_match('/[0-9]{3}/', $value);
});
// this validation accept movil number of 10 digit with lada phone
Validator::extend('telephone',function($attribute,$value,$parameters){
	return preg_match('/^\([0-9]{3}\){1}\s[0-9]{3}\-[0-9]{4}/',$value);
});

// this validation accept number card of 16 digit
Validator::extend('credit_card',function($attribute,$value,$parameters){
	return preg_match("/^((67\d{2})|(4\d{3})|(5[1-5]\d{2})|(6011))(-?\s?\d{4}){3}|(3[4,7])\ d{2}-?\s?\d{6}-?\s?\d{5}$/",$value);
});
// this validation acceot number home of 1 to 5 digits and one letter from A to Z
Validator::extend('numero_casa',function($attribute,$value,$parameters){
	return preg_match('/^[0-9]([0-9]{1,3})?([A-Za-z]{1})?$/',$value);
});

// this validation validate sicurity of password, if this is easy or strong
Validator::extend('validate_password',function($attribute, $value, $parameters){
	return Hash::check($value, Auth::user()->clave);
});
// this validation is for update username, this check that username should not be same that anything username in database but this can same to username current
Validator::extend('user_check',function($attribute, $value, $parameters){
	if(DB::table("users")->where("username","=",$value)->where("username","!=",Auth::user()->username)->get()){
		return false;
	}else return true;
});
