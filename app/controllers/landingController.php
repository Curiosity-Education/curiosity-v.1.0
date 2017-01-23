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
        $planes = Plan::all();
    	return View::make('landing.index',array(
            'escuelas' => $escuelas,
            'planes'   => $planes,
            'trans'    => [
                'month' => 'mes',
                'semester'  => 'semestre',
                'year'  =>  'año'
            ]
        ));
     }
  }

}
