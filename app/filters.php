<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    /**************************
    *
    * Descommeneted on producction
    *
    **************************/
	// if( ! Request::secure())
    // {
    //     return Redirect::secure(Request::path());
    // }
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('/');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


/*
|--------------------------------------------------------------------------
| Filters obout the system Curiosity
|--------------------------------------------------------------------------}
*/

Route::filter('manage_content',function(){
   if(!Entrust::can('manage_content')){
       return View::make('errors.404');
   }
});

Route::filter('manage_school_aliance',function(){
   if(!Entrust::can('manage_school_aliance')){
       return View::make('errors.404');
   }
});

Route::filter('manage_teacher_aliance',function(){
   if(!Entrust::can('manage_teacher_aliance')){
       return View::make('errors.404');
   }
});

Route::filter('manage_employees',function(){
   if(!Entrust::can('manage_employees')){
       return View::make('errors.404');
   }
});

Route::filter('child_actions',function(){
   if(!Entrust::can('child_actions')){
       return View::make('errors.404');
   }
});

Route::filter('only_session',function(){
    $role = Auth::user()->roles[0]->name;
    if($role == 'child'){
        $session_real=User::where('id','=',Auth::user()->id)->select('id_session')->get();
        if(isset($session_real)){
            if($session_real[0]->id_session != Session::get('sessionId') ){
                Auth::logout();
                return Redirect::to('/');
            }
        }
    }
});
