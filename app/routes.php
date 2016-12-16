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

Route::get('/', function()
{
	return View::make('hello');
});
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

    Route::match(['POST','GET'],'all',function(){
        $data1 = [
            'status' => '200',
            'message'   => 'The ajax has been found success',
            'type'  => 'JSON'
        ];

        $data2 = [
            'status' => '200',
            'message'   => 'The ajax has been found success',
            'type'  => 'JSON'
        ];
        $arrayData = [];
        array_push($arrayData,$data1);
        array_push($arrayData,$data2);
        return Response::json($arrayData);
    });

    Route::post('save',function(){
        return Input::all();
    });

    Route::post('find',function(){

        return Input::all();
    });
});



