<?php

/**
 *
 */
class landingController extends BaseController
{

  function landingpage(){
    $escuelas = array('escuelas' => School::where('active', '=', 1)->get());
    	return View::make('landing.index', $escuelas);
  }

}
