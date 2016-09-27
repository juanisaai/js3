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
Route::get('/management/areas/create', [
    'as'   => 'createArea',
    'uses' => 'AreaController@create']);
Route::post('areas', 'AreaController@store');

//------------------------R
Route::get('/management/areas', [
    'as'   => 'readArea',
    'uses' => 'AreaController@seeAreas']);

//------------------------U
Route::get('/management/areas/update/{id}', [
    'as'   => 'editArea',
    'uses' => 'AreaController@editArea']);

Route::post('/management/areas/update/{id}', [
    'as'   => 'updateArea',
    'uses' => 'AreaController@updateArea']);

//------------------------D
Route::get('/management/areas/delete/{id}', [
    'as' => 'deleteArea',
    'uses' => 'AreaController@deleteArea']);

//-----------------------------------close CRUD Areas-------------------------------

//-----------------------------------open CRUD Employees-------------------------------

//------------------------C
Route::get('/management/employees/create', [
    'as'   => 'createEmployee',
    'uses' => 'EmployeeController@create']);
Route::post('employees', 'EmployeeController@store');

//------------------------R
Route::get('/management/employees', [
    'as'   => 'readEmployee',
    'uses' => 'EmployeeController@seeEmployees']);

//------------------------U
Route::get('/management/employees/update/{id}', [
    'as'   => 'editEmployee',
    'uses' => 'EmployeeController@editEmployee']);

Route::post('/management/employees/update/{id}', [
    'as'   => 'updateEmployee',
    'uses' => 'EmployeeController@updateEmployee']);

//------------------------D
Route::get('/management/employees/delete/{id}', [
    'as' => 'deleteEmployee',
    'uses' => 'EmployeeController@deleteEmployee']);

//-----------------------------------close CRUD Employees-------------------------------

//-----------------------------------open CRUD Devices-------------------------------

//------------------------C
Route::get('/management/devices/create', [
    'as'   => 'createDevice',
    'uses' => 'DeviceController@create']);
Route::post('devices', 'DeviceController@store');

//------------------------R
Route::get('/management/devices', [
    'as'   => 'readDevice',
    'uses' => 'DeviceController@seeDevices']);

//------------------------U
Route::get('/management/devices/update/{id}', [
    'as'   => 'editDevice',
    'uses' => 'DeviceController@editDevice']);

Route::post('/management/devices/update/{id}', [
    'as'   => 'updateDevice',
    'uses' => 'DeviceController@updateDevice']);

//------------------------D
Route::get('/management/devices/delete/{id}', [
    'as' => 'deleteDevice',
    'uses' => 'DeviceController@deleteDevice']);

//-----------------------------------close CRUD Devices-------------------------------

//-----------------------------------open CRUD Equipments-------------------------------

//------------------------C
Route::get('/management/equipments/create', [
    'as'   => 'createEquipment',
    'uses' => 'EquipmentsController@create']);
Route::post('equipments', 'EquipmentsController@store');

//------------------------R
Route::get('/management/equipments', [
    'as'   => 'readEquipments',
    'uses' => 'EquipmentsController@seeEquipments']);

//------------------------U
Route::get('/management/equipment/update/{id}', [
    'as'   => 'editEquipment',
    'uses' => 'EquipmentsController@editEquipment']);

Route::post('/management/equipment/update/{id}', [
    'as'   => 'updateEquipment',
    'uses' => 'EquipmentsController@updateEquipment']);

//------------------------D
Route::get('/management/equipment/delete/{id}', [
    'as' => 'deleteEquipment',
    'uses' => 'EquipmentsController@deleteEquipment']);

//-----------------------------------close CRUD Equipments-------------------------------
