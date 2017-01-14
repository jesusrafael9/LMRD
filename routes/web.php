<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('welcome');
    /*$redis = app()->make('redis');
    $redis->set("key1", "hola redis");
    return $redis->get("key1");*/
});
Route::get('tasks','TaskController@index');
// show a task
Route::get('task/{id}','TaskController@show');
// delete a task
Route::delete('task/{id}','TaskController@destroy');
// update existing task
Route::put('task','TaskController@store');
// create new task
Route::post('task','TaskController@store');
