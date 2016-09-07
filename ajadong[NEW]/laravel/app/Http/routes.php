<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/user',"UserController@getAll");
Route::post('/user',"UserController@create");
Route::get('/user/{id}',"UserController@getSingle");
Route::post('/user/{id}',"UserController@modify");
Route::delete('/user/{id}',"UserController@delete");

Route::get('/course',"CourseController@getAll");
Route::post('/course',"CourseController@create");
Route::get('/course/{id}',"CourseController@getSingle");
Route::post('/course/{id}',"CourseController@modify");
Route::delete('/course/{id}',"CourseController@delete");
