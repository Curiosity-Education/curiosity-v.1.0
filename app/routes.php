<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/my-account', function(){
	return View::make('child.configuration_account');
});

Route::get('/profile-child', function(){
	return View::make('child.profile');
});

Route::get('/library-pdfs', function(){
	return View::make('parent.library_pdfs');
});

Route::get('/library-videos', function(){
	return View::make('child.library_videos');
});

Route::get('/parent-profile', function(){
    return View::make('parent.profile');
});


Route::get('/', function()
{
	return View::make('child.init');
});

Route::get('/menu-studio',function(){
	return View::make('child.menu-studio');
});

Route::get("/child-registration",function(){
    return View::make("parent.child_registration");
});

Route::get('/padre-inicio', function(){
	return View::make('parent.home');
});

Route::get('/menu-estudio', function(){
	return View::make('child.studyMenu');
});

Route::get('/tienda', function(){
    return View::make('child.curiosity-store');
});

Route::get('/juego', function(){
    return View::make('child.view-game');
});

Route::get('/1', 'activitiesVideosController@save');


// //Ahora las rutas se manejaran con prefijos
// Route::group(array('prefix' => 'teachers'), function()
// {
//
//     Route::get('/', function()
//     {
//         if(Request::ajax())
//         {
//              $data = [
//                 'status'    => '200',
//                 'message'   => 'The ajax has been found success',
//                 'type'      => 'JSON'
//             ];
//         }
//         return Response::json($data);
//     });
//
//
// });
//
// /*
// *   The routes will be updated for put
// *   it with the classes's functions current
// *   and to add the prefix
//
//
//
// // ---./ Webhooks para saber quien ha pagado y quien no
// Route::post('/webhook/check-suscription','userController@webhook_check_pay');
// Route::get('/', 'principalController@verPagina');
// Route::get('/nosotros', 'principalController@verNosotros');
// Route::get('/proximamente',function(){
//     return View::make('aviso_beta');
// });
// Route::get('/missedSession','sesionInfoController@missedSession');
// Route::post('/last-session','sesionInfoController@getLastSession');
// Route::get('/terminos-y-condiciones',function(){
//     return View::make('terminos');
// });
// Route::get('/aviso-privacidad',function(){
//     return View::make('aviso-privacidad');
// });
//
// Route::get('/nuestro-equipo',function(){
// 	return View::make('nuestro-equipo');
// });
// Route::get('/mentores',function(){
// 	return View::make('mentores');
// });
// Route::get('/preguntas-frecuentes',function(){
// 	return View::make('preguntas-frecuentes');
// });
//
// Route::get('/registro-exitoso',function(){
//     return View::make('registro_exitoso');
// });
//
//
// /*
// *   Register for users
// */
// Route::group(array('prefix' => 'register'),function(){
// 	Route::group(array('before' => ''), function(){
// 		Route::match(array('GET', 'POST'), '/', 'padreController@viewPage');
// 		Route::post('remote-email','padreController@remoteEmail');
//     Route::get('confirm/{token}','padreController@confirmar');
// 	});
//     Route::group(array('before' => ''), function(){
// 			Route::match(array('GET', 'POST'), '/', 'suscripcionController@viewPage');
// 			Route::match(array('GET','POST'),'suscription','suscripcionController@suscripcion');
