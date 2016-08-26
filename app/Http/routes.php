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

Route::group(['middleware' => ['web']], function(){


    Route::get('/', function () {
        return view('welcome');
    });

    Route::auth();

    Route::get('/home', 'HomeController@index');


});

//-----------------------------------open CRUD Areas-------------------------------

//------------------------C
Route::get('areas/create', [
    'as'   => 'create',
    'uses' => 'AreaController@create']);
Route::post('areas', 'AreaController@store');

//------------------------R
Route::get('/areas', [
    'as'   => 'read',
    'uses' => 'AreaController@seeAreas']);

//------------------------U
Route::get('/areas/update/{id}', [
    'as'   => 'editArea',
    'uses' => 'AreaController@editArea']);

Route::post('areas/update/{id}', [
    'as'   => 'updateArea',
    'uses' => 'AreaController@updateArea']);

//------------------------D
Route::get('areas/delete/{id}', [
    'as' => 'deleteArea',
    'uses' => 'AreaController@deleteArea']);

//-----------------------------------close CRUD Areas-------------------------------
