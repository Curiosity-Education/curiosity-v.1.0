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
        $escuelas = School::where('active', '=', 1)->get();
        $planes = Plan::where("active", "=", 1)->where("visible", "=", 1)->get();
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
