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

    Route::get('/', [
        'as' => 'welcome',
        'uses' => 'HomeController@welcome'
    ]);

    // Authentication Routes...
    Route::get('login',[
        'as'   => 'login',
        'uses' => 'Auth\AuthController@showLoginForm'
    ]);
    Route::post('login', 'Auth\AuthController@login');

    Route::get('logout',[
        'as'   => 'logout',
        'uses' => 'Auth\AuthController@logout'
    ]);

    // Registration Routes...
    Route::get('register',[
        'as'  =>  'register',
        'uses'  =>  'Auth\AuthController@showRegistrationForm'
    ]);
    Route::post('register', 'Auth\AuthController@register');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/homesystem', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);


});

Route::group(['middleware' => 'auth'], function (){

    Route::group(['middleware' => 'role:Admin'], function (){
        //-----------------------------------open CRUD Users-------------------------------

    // Create
        Route::get('/administracion/usuarios/crear', [
            'as'   => 'createUser',
            'uses' => 'Admin\UsersController@create']);
        Route::post('users', 'Admin\UsersController@store');

    // Read
        Route::get('/administracion/lista-de-usuarios', [
            'as'   => 'readUser',
            'uses' => 'Admin\UsersController@seeUsers']);

    // Update
        Route::get('/administracion/usuario/{id}/actualizar-datos', [
            'as'   => 'editUser',
            'uses' => 'Admin\UsersController@editUser']);

        Route::post('/administracion/usuario/{id}/actualizar-datos', [
            'as'   => 'updateUser',
            'uses' => 'Admin\UsersController@updateUser']);

    // Delete
        Route::get('/administracion/lista-de-usuarios/{id}/eliminar', [
            'as' => 'deleteUser',
            'uses' => 'Admin\UsersController@deleteUser']);

    //-----------------------------------Close CRUD Users-------------------------------

    });

    Route::group(['middleware' => 'role:Technician, Collaborate'], function (){

        //-----------------------------------open CRUD Areas-------------------------------

    // Create
        Route::get('/administracion-de-areas/crear', [
            'as'   => 'createArea',
            'uses' => 'AreaController@create']);
        Route::post('areas', 'AreaController@store');

    // Read
        Route::get('/administracion-de-areas/lista-de-areas', [
            'as'   => 'readArea',
            'uses' => 'AreaController@seeAreas']);

    // Update
        Route::get('/administracion-de-areas/{id}/actualizar-datos', [
            'as'   => 'editArea',
            'uses' => 'AreaController@editArea']);

        Route::post('/administracion-de-areas/{id}/actualizar-datos', [
            'as'   => 'updateArea',
            'uses' => 'AreaController@updateArea']);

    // Delete
        Route::get('/administracion-de-areas/{id}/eliminar', [
            'as' => 'deleteArea',
            'uses' => 'AreaController@deleteArea']);

    //-----------------------------------close CRUD Areas-------------------------------

    //-----------------------------------open CRUD Employees-------------------------------

    // Create
        Route::get('/administracion-de-empleados/crear', [
            'as'   => 'createEmployee',
            'uses' => 'EmployeeController@create']);
        Route::post('employees', 'EmployeeController@store');

    // Read
        Route::get('/administracion-de-empleados/lista-de-empleados', [
            'as'   => 'readEmployee',
            'uses' => 'EmployeeController@seeEmployees']);

    // Update
        Route::get('/administracion-de-empleados/{id}/actualizar-datos', [
            'as'   => 'editEmployee',
            'uses' => 'EmployeeController@editEmployee']);

        Route::post('/administracion-de-empleados/{id}/actualizar-datos', [
            'as'   => 'updateEmployee',
            'uses' => 'EmployeeController@updateEmployee']);

    // Delete
        Route::get('/administracion-de-empleados/{id}/eliminar', [
            'as' => 'deleteEmployee',
            'uses' => 'EmployeeController@deleteEmployee']);

    //-----------------------------------close CRUD Employees-------------------------------

    //-----------------------------------open CRUD Devices-------------------------------

    // Create
        Route::get('/administracion-de-dispositivos/crear', [
            'as'   => 'createDevice',
            'uses' => 'DeviceController@create']);
        Route::post('devices', 'DeviceController@store');

    // Read
        Route::get('/administracion-de-dispositivos/lista-de-dispositivos', [
            'as'   => 'readDevice',
            'uses' => 'DeviceController@seeDevices']);

    // Read details per device
        Route::get('/administracion-de-dispositivos/lista-de-dispositivos/{id}/detalles', [
            'as'   => 'readDetDevice',
            'uses' => 'DeviceController@seeDetail']);

    // Update
        Route::get('/administracion-de-dispositivos/{id}/actualizar-datos', [
            'as'   => 'editDevice',
            'uses' => 'DeviceController@editDevice']);

        Route::post('/administracion-de-dispositivos/{id}/actualizar-datos', [
            'as'   => 'updateDevice',
            'uses' => 'DeviceController@updateDevice']);

    // Delete
        Route::get('/administracion-de-dispositivos/{id}/eliminar', [
            'as' => 'deleteDevice',
            'uses' => 'DeviceController@deleteDevice']);

    //-----------------------------------close CRUD Devices-------------------------------

    //-----------------------------------open CRUD Equipments-------------------------------

    // Create
        Route::get('/administracion-de-equipos/crear', [
            'as'   => 'createEquipment',
            'uses' => 'EquipmentsController@create']);
        Route::post('equipments', 'EquipmentsController@store');

    // Read
        Route::get('/administracion-de-equipos/lista-de-equipos', [
            'as'   => 'readEquipments',
            'uses' => 'EquipmentsController@seeEquipments']);

    // Read Details
        Route::get('/administracion-de-equipos/detalles-equipo/{equipment}', [
            'as'   => 'readDetailsEquipment',
            'uses' => 'EquipmentsController@show']);

    // Update
        Route::get('/administracion-de-equipos/{id}/actualizar-datos', [
            'as'   => 'editEquipment',
            'uses' => 'EquipmentsController@editEquipment']);

        Route::post('/administracion-de-equipos/{id}/actualizar-datos', [
            'as'   => 'updateEquipment',
            'uses' => 'EquipmentsController@updateEquipment']);

    // Delete
        Route::get('/administracion-de-equipos/{id}/eliminar', [
            'as' => 'deleteEquipment',
            'uses' => 'EquipmentsController@deleteEquipment']);

    //-----------------------------------close CRUD Equipments-------------------------------

    //-----------------------------------OPEN CRUD LowInventory-------------------------------

    // Read Low Equipments
        Route::get('/administracion-de-equipos/baja-de-equipos/', [
            'as'   => 'seeLowEq',
            'uses' => 'LowEquipmentController@readEq']);

    // Read Low Devices
        Route::get('/administracion-de-dispositivos/baja-de-dispositivos', [
            'as'   => 'seeLowDev',
            'uses' => 'LowDeviceController@readDev']);


    //-----------------------------------CLOSE CRUD LowInventory-------------------------------

    //-----------------------------------Open CRUD AssignDevices-------------------------------

    // Create
        Route::get('/asignaciones/dispostivos/nueva-asignacion/disp/{idDev}', [
            'as' => 'createAssignDev',
            'uses' => 'AssignDeviceController@createAssignDev']);

        Route::get('/asignaciones/dispositivos/nueva-asignacion/disp/{idDev}/emp/{idEmp}', [
            'as' => 'storeAssignDev',
            'uses' => 'AssignDeviceController@storeAssignDev']);

    // Read employees without devices
        Route::get('/asignaciones/dispositivos/nueva-asignacion/dispositivos-disponibles/', [
            'as'   => 'newAssign',
            'uses' => 'AssignDeviceController@newAssign']);

    // Pass data in storeAssignDev since Details
        Route::get('/asignaciones/dispositivos/nueva-asignacion/dispositivos-disponibles/{idEmp}', [
            'as'   => 'newAssignDet',
            'uses' => 'AssignDeviceController@newAssignDet']);

    // Read employees with devices
        Route::get('/asignaciones/dispositivos/lista-de-asignaciones', [
            'as'   => 'seeEmployeesDev',
            'uses' => 'AssignDeviceController@seeAssigns']);

    // Read details of devices
        Route::get('/asignaciones/dispostivos/lista-de-asignaciones/{id}/detalles', [
            'as'   => 'seeDetailsAssignDev',
            'uses' => 'AssignDeviceController@seeDetailsAssign']);

    // Delete association between employee and device
        Route::get('/asignaciones/dispostivos/eliminar-asignacion/disp/{idDev}', [
            'as' => 'deleteAssignDev',
            'uses' => 'AssignDeviceController@deleteAssignDev']);

    //-----------------------------------Close CRUD AssignDevices-------------------------------

    //-----------------------------------Open CRUD AssignEquipment-------------------------------

    // Read employees with equipments
        Route::get('/asignaciones/equipos/lista-de-asignaciones', [
            'as'   => 'seeEmployeesEq',
            'uses' => 'AssignEquipmentController@seeAssigns']);

    // Read details of equipments
        Route::get('/asignaciones/equipos/lista-de-asignaciones/{id}/detalles', [
            'as'   => 'seeDetailsAssignEq',
            'uses' => 'AssignEquipmentController@seeDetailsAssignEq']);

    // Read employees without equipments
        Route::get('/asignaciones/equipos/nueva-asignacion/equipos-disponibles/', [
            'as'   => 'newAssignEq',
            'uses' => 'AssignEquipmentController@newAssignEq']);

    // Create
        Route::get('/asignaciones/equipos/nueva-asignacion/eq/{idEq}', [
            'as' => 'createAssignEq',
            'uses' => 'AssignEquipmentController@createAssignEq']);

        Route::get('/asignaciones/equipos/nueva-asignacion/eq/{idEq}/emp/{idEmp}', [
            'as' => 'storeAssignEq',
            'uses' => 'AssignEquipmentController@storeAssignEq']);

    // Delete association between employee and equipment
        Route::get('/asignaciones/equipos/eliminar-asignacion/eq/{idEq}', [
            'as' => 'deleteAssignEq',
            'uses' => 'AssignEquipmentController@deleteAssignEq']);

    // Pass data in storeAssignDev since Details
        Route::get('/asignaciones/equipos/nueva-asignacion/equipos-disponibles/{idEmp}', [
            'as'   => 'newAssignDetEq',
            'uses' => 'AssignEquipmentController@newAssignDetEq']);

    //-----------------------------------CLOSE CRUD AssignEquipment-------------------------------

    //-----------------------------------Open CRUD ServiceRequest-------------------------------

    // Read
        Route::get('/solicitudes/servicios/lista-hojas-de-servicio', [
            'as'   => 'seeAllRequests',
            'uses' => 'ServiceRequestController@read']);

    // Create
        Route::get('/solicitudes/servicios/crear', [
            'as'   => 'createSerquest',
            'uses' => 'ServiceRequestController@create']);
        Route::post('createSerquest', 'ServiceRequestController@store');

    // Update
        Route::get('/solicitudes/servicios/actualizar-datos-hoja/serv/{id}', [
            'as'   => 'editSerquest',
            'uses' => 'ServiceRequestController@edit']);

        Route::post('/solicitudes/servicios/actualizar-datos-hoja/serv/{id}', [
            'as'   => 'updateSerquest',
            'uses' => 'ServiceRequestController@update']);

    // Delete
        Route::get('/solicitudes/servicios/eliminar-hoja/serv/{id}', [
            'as'   => 'deleteSerquest',
            'uses' => 'ServiceRequestController@deleteSerquest']);


    //-----------------------------------CLOSE CRUD ServiceRequest-------------------------------

    //-----------------------------------Open CRUD EquipmentReception-------------------------------

    // Read
        Route::get('/solicitudes/recepciones/lista-recepcion-de-equipos', [
            'as'   => 'seeReceptions',
            'uses' => 'EquipmentReceptionController@read']);

    // Read details per reception
        Route::get('/solicitudes/recepciones/lista-recepcion-de-equipos/rec/{idRec}/emp/{idEmp}/detalles/', [
            'as'   => 'seeDetails',
            'uses' => 'EquipmentReceptionController@readDetails']);

    // Create
        Route::get('/solicitudes/recepciones/crear', [
            'as'   => 'createRec',
            'uses' => 'EquipmentReceptionController@create']);
        Route::post('storeRec', 'EquipmentReceptionController@store');

    // Update
        Route::get('/solicitudes/recepciones/actualizar-datos-recepcion/rec/{idRec}', [
            'as'   => 'editRec',
            'uses' => 'EquipmentReceptionController@edit']);

        Route::post('/solicitudes/recepciones/actualizar-datos-recepcion/rec/{idRec}', [
            'as'   => 'updateRec',
            'uses' => 'EquipmentReceptionController@update']);

    // Delete
        Route::get('/solicitudes/recepciones/eliminar-recepcion/rec/{idRec}', [
            'as'   => 'deleteRec',
            'uses' => 'EquipmentReceptionController@destroy']);

    //-----------------------------------CLOSE CRUD EquipmentReception-------------------------------

    });
});


