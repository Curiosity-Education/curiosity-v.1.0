<?php

/**
 *
 */
class landingController extends BaseController
{

  function landingpage(){
     if(Auth::check()){
        $routeView = loginController::getAccess();
        return Redirect::to($routeView);
     }
     else {
        $escuelas = array('escuelas' => School::where('active', '=', 1)->get());
        return View::make('landing.index', $escuelas);
     }
  }

}
