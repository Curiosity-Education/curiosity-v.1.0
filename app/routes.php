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


Route::get('/biblioteca-pdfs', function(){
	return View::make('child.library_pdfs');
});

Route::get('/', function()
{
	return View::make('child.init');
});

Route::get('/menu-studio',function(){
	return View::make('child.menu-studio');
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

//Ahora las rutas se manejaran con prefijos
Route::group(array('prefix' => 'teachers'), function()
{

    Route::get('get', function()
    {
        $data = [
            'status' => '200',
            'message'   => 'The ajax has been found success',
            'type'  => 'JSON'
        ];
        return Response::json($data);
    });


});
