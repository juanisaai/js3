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

//-----------------------------------open CRUD Users-------------------------------

//Create
Route::get('/management/users/create', [
    'as'   => 'createUser',
    'uses' => 'Admin\UsersController@create']);
Route::post('users', 'Admin\UsersController@store');

//Read
Route::get('/management/users', [
    'as'   => 'readUser',
    'uses' => 'Admin\UsersController@seeUsers']);

//------------------------U
Route::get('/management/users/{id}/update', [
    'as'   => 'editUser',
    'uses' => 'Admin\UsersController@editUser']);

Route::post('/management/users/{id}/update', [
    'as'   => 'updateUser',
    'uses' => 'Admin\UsersController@updateUser']);

//------------------------D
Route::get('/management/users/delete/{id}', [
    'as' => 'deleteUser',
    'uses' => 'Admin\UsersController@deleteUser']);

//-----------------------------------Close CRUD Users-------------------------------

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

//------------------------R-Details
Route::get('/management/details/{equipment}', [
    'as'   => 'readDetailsEquipment',
    'uses' => 'EquipmentsController@show']);

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

//-----------------------------------Open CRUD AssignDevices-------------------------------

// CREATE
Route::get('/transactions/assign-devices/new-assign/employees/{idDev}', [
    'as' => 'createAssignDev',
    'uses' => 'AssignDeviceController@createAssignDev']);

Route::get('/transactions/assign-devices/new-assign/employees/{idDev}/{idEmp}', [
    'as' => 'storeAssignDev',
    'uses' => 'AssignDeviceController@storeAssignDev']);

// READ employees without devices
Route::get('/transactions/assign-devices/new-assign/devices-without-employees/', [
    'as'   => 'newAssign',
    'uses' => 'AssignDeviceController@newAssign']);

// Pass data in storeAssignDev since Details
Route::get('/transactions/assign-devices/new-assign/devices-without-employees/{idEmp}', [
    'as'   => 'newAssignDet',
    'uses' => 'AssignDeviceController@newAssignDet']);

// READ employees with devices
Route::get('/transactions/assign-devices/list-employees', [
    'as'   => 'seeEmployeesDev',
    'uses' => 'AssignDeviceController@seeAssigns']);

// READ details of devices
Route::get('/transactions/assign-devices/list-employees/{id}/details', [
    'as'   => 'seeDetailsAssignDev',
    'uses' => 'AssignDeviceController@seeDetailsAssign']);

// DELETE association between employee and device
Route::get('/transactions/assign-devices/delete-assign/employees/{idDev}', [
    'as' => 'deleteAssignDev',
    'uses' => 'AssignDeviceController@deleteAssignDev']);

//-----------------------------------Close CRUD AssignDevices-------------------------------

//-----------------------------------Open CRUD AssignEquipment-------------------------------

// READ employees with equipments
Route::get('/transactions/assign-equipments/list-employees', [
    'as'   => 'seeEmployeesEq',
    'uses' => 'AssignEquipmentController@seeAssigns']);

// READ details of equipments
Route::get('/transactions/assign-equipments/list-employees/{id}/details', [
    'as'   => 'seeDetailsAssignEq',
    'uses' => 'AssignEquipmentController@seeDetailsAssignEq']);

// READ employees without equipments
Route::get('/transactions/assign-equipments/new-assign/equipments-without-employees/', [
    'as'   => 'newAssignEq',
    'uses' => 'AssignEquipmentController@newAssignEq']);

// CREATE
Route::get('/transactions/assign-equipments/new-assign/employees/{idEq}', [
    'as' => 'createAssignEq',
    'uses' => 'AssignEquipmentController@createAssignEq']);

Route::get('/transactions/assign-equipments/new-assign/employees/{idEq}/{idEmp}', [
    'as' => 'storeAssignEq',
    'uses' => 'AssignEquipmentController@storeAssignEq']);

// DELETE association between employee and equipment
Route::get('/transactions/assign-equipments/delete-assign/employees/{idEq}', [
    'as' => 'deleteAssignEq',
    'uses' => 'AssignEquipmentController@deleteAssignEq']);

// Pass data in storeAssignDev since Details
Route::get('/transactions/assign-equipments/new-assign/equipments-without-employees/{idEmp}', [
    'as'   => 'newAssignDetEq',
    'uses' => 'AssignEquipmentController@newAssignDetEq']);
//-----------------------------------CLOSE CRUD AssignEquipment-------------------------------

//-----------------------------------Open CRUD ServiceRequest-------------------------------

// Read
Route::get('/services/all-services-request', [
    'as'   => 'seeAllRequests',
    'uses' => 'ServiceRequestController@read']);

// Create
Route::get('/services/create-new-service-request', [
    'as'   => 'createSerquest',
    'uses' => 'ServiceRequestController@create']);
Route::post('createSerquest', 'ServiceRequestController@store');

// Delete
Route::get('/services/delete-service-request/{id}', [
    'as'   => 'deleteSerquest',
    'uses' => 'ServiceRequestController@deleteSerquest']);

// Update
//------------------------U
Route::get('/services/update-service-request/{id}', [
    'as'   => 'editSerquest',
    'uses' => 'ServiceRequestController@edit']);

Route::post('/services/update-service-request/{id}', [
    'as'   => 'updateSerquest',
    'uses' => 'ServiceRequestController@update']);

//-----------------------------------CLOSE CRUD ServiceRequest-------------------------------

//-----------------------------------Open CRUD EquipmentReception-------------------------------

// Read
Route::get('/services/all-equipment-receptions', [
    'as'   => 'seeReceptions',
    'uses' => 'EquipmentReceptionController@read']);

// Read details per reception
Route::get('/services/all-equipment-receptions/{idRec}/{idEmp}/details/', [
    'as'   => 'seeDetails',
    'uses' => 'EquipmentReceptionController@readDetails']);

// Create
Route::get('/services/create-equipment-receptions', [
    'as'   => 'createRec',
    'uses' => 'EquipmentReceptionController@create']);
Route::post('storeRec', 'EquipmentReceptionController@store');

// Update
Route::get('/services/update-equipment-receptions/{idRec}', [
    'as'   => 'editRec',
    'uses' => 'EquipmentReceptionController@edit']);

Route::post('/services/update-equipment-receptions/{idRec}', [
    'as'   => 'updateRec',
    'uses' => 'EquipmentReceptionController@update']);

// Delete
// Update
Route::get('/services/delete-equipment-receptions/{idRec}', [
    'as'   => 'deleteRec',
    'uses' => 'EquipmentReceptionController@destroy']);
