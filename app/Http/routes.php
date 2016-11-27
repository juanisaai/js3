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

Route::group(['middlewareGroups' => ['Admin']], function() {
    require __DIR__ . '/routes/admin.routes.php';
});

Route::group(['middleware' => 'auth'], function (){

    Route::group(['middlewareGroups' => 'role:Technician, Collaborate'], function (){

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

    //-----------------------------------open CRUD Devices Printers-------------------------------

    // Create
        Route::get('/administracion-de-impresoras/registrar/impresora', [
            'as'   => 'createDevice',
            'uses' => 'DeviceController@create']);
        Route::post('printers', 'DeviceController@store');

    // Read
        Route::get('/administracion-de-impresoras/lista-de-impresoras', [
            'as'   => 'readDevice',
            'uses' => 'DeviceController@seeDevices']);

    // Print all devices
        Route::get('/administracion-de-impresoras/lista-de-impresoras/inventario-dev-impresoras/{ver}', [
            'as'   => 'printAllDev',
            'uses' => 'DeviceController@printAllDev']);

        // Read details per device
        Route::get('/administracion-de-impresoras/lista-de-impresoras/{id}/detalles', [
            'as'   => 'readDetDevice',
            'uses' => 'DeviceController@seeDetail']);

    // Update
        Route::get('/administracion-de-impresoras/{id}/actualizar-datos', [
            'as'   => 'editDevice',
            'uses' => 'DeviceController@editDevice']);

        Route::post('/administracion-de-impresoras/{id}/actualizar-datos', [
            'as'   => 'updateDevice',
            'uses' => 'DeviceController@updateDevice']);

    // Delete
        Route::get('/administracion-de-impresoras/{id}/eliminar', [
            'as' => 'deleteDevice',
            'uses' => 'DeviceController@deleteDevice']);

    //-----------------------------------close CRUD Devices Printers-------------------------------

        //-----------------------------------open CRUD Devices Networks-------------------------------

        // Create
        Route::get('/administracion-de-dispositivos-red/registrar/dispositivo', [
            'as'   => 'createDeviceN',
            'uses' => 'DeviceNController@createN']);
        Route::post('devicesN', 'DeviceNController@storeN');

        // Read
        Route::get('/administracion-de-dispositivos-red/lista-de-dispositivos', [
            'as'   => 'readDeviceN',
            'uses' => 'DeviceNController@seeDevicesN']);

        // Print all devices
        Route::get('/administracion-de-dispositivos-red/lista-de-dispositivos/reporte-inventario-dev-red/{ver}', [
            'as'   => 'printAllDevN',
            'uses' => 'DeviceNController@printAllDevN']);

        // Read details per device
        Route::get('/administracion-de-dispositivos-red/lista-de-dispositivos/{id}/detalles', [
            'as'   => 'readDetDeviceN',
            'uses' => 'DeviceNController@seeDetailN']);

        // Update
        Route::get('/administracion-de-dispositivos-red/{id}/actualizar-datos', [
            'as'   => 'editDeviceN',
            'uses' => 'DeviceNController@editDeviceN']);

        Route::post('/administracion-de-dispositivos-red/{id}/actualizar-datos', [
            'as'   => 'updateDeviceN',
            'uses' => 'DeviceNController@updateDeviceN']);

        // Delete
        Route::get('/administracion-de-dispositivos-red/{id}/eliminar', [
            'as' => 'deleteDeviceN',
            'uses' => 'DeviceNController@deleteDeviceN']);


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

    // Print all devices
        Route::get('/administracion-de-equipos/lista-de-equipos/inventario-equipos-computo/{ver}', [
            'as'   => 'printAllEq',
            'uses' => 'EquipmentsController@printAllEq']);

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

    // Read details of devices
        Route::get('/asignaciones/dispostivos/lista-de-asignaciones/asig/{id}/emp/{idEmp}/detalles/rep-inv/imprimir/{ver}', [
            'as'   => 'printInvDev',
            'uses' => 'AssignDeviceController@printInvDev']);

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

    // print details of equipments for inventory
        Route::get('/asignaciones/equipos/lista-de-asignaciones/asig/{id}/emp/{idEmp}/detalles/rep-inv/imprimir/{ver}', [
            'as'   => 'printInvEq',
            'uses' => 'AssignEquipmentController@printInvEq']);

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

    // Read and print details per request
        Route::get('/solicitudes/servicios/lista-hojas-de-servicio/serv/{id}/emp/{idEmp}/detalles/imprimir/{ver}', [
            'as'   => 'printDetailsSerq',
            'uses' => 'ServiceRequestController@printDetails']);

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

    // Read and print details per reception
        Route::get('/solicitudes/recepciones/lista-recepcion-de-equipos/rec/{idRec}/emp/{idEmp}/detalles/imprimir/{ver}', [
            'as'   => 'printReception',
            'uses' => 'EquipmentReceptionController@printReception']);

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

        // Create dictum device
        Route::get('/dictamen/dispositivos/crear', [
            'as' => 'createDictumDev',
            'uses' => 'DictumController@createDev']);
        Route::post('dictumdev', 'DictumController@storeDev');


        // Read all dictums
        Route::get('/dictamen/dispositivos/ver-todos', [
            'as' => 'readDictums',
            'uses' => 'DictumController@readDev']);

        // print dictum dev
        Route::get('/dictamen/dispositivos/detalles/dictamen/{idDictum}/eq/{idDev}/tech/{idUser}/{area}', [
            'as' => 'detailDictumDev',
            'uses' => 'DictumController@showDev']);

        // print dictum dev
        Route::get('/dictamen/dispositivos/imprimir/dictamen/{idDictum}/eq/{idDev}/tech/{idUser}/{area}/{ver}', [
            'as' => 'printDictumDev',
            'uses' => 'DictumController@printDev']);

        // update dictum Dev
        Route::get('/dictamen/dispositivo/actualizar/dictamen/{idDictum}', [
            'as' => 'editDev',
            'uses' => 'DictumController@editDev']);

        Route::post('/dictamen/dispositivo/actualizar/dictamen/{idDictum}', [
            'as' => 'updateDev',
            'uses' => 'DictumController@updateDev']);

        // Delete Dev dictum
        Route::get('/dictamen/dispositivo/eliminar/dictamen/{idDictum}', [
            'as' => 'deleteDev',
            'uses' => 'DictumController@destroyDev']);


        //------------------------------dictumEq

        // Read all dictums
        Route::get('/dictamen/equipos/ver-todos', [
            'as' => 'readDictumsEq',
            'uses' => 'DictumController@readEq']);

        // print dictum Eq
        Route::get('/dictamen/equipos/imprimir/dictamen/{idDictumEq}/eq/{idEq}/tech/{idUser}/{area}/{ver}', [
            'as' => 'printDictumEq',
            'uses' => 'DictumController@printEq']);

        // view detail dictum Eq
        Route::get('/dictamen/equipos/detalles/dictamen/{idDictumEq}/eq/{idEq}/tech/{idUser}/{area}', [
            'as' => 'detailDictumEq',
            'uses' => 'DictumController@showEq']);

        // Create dictum eq
        Route::get('/dictamen/equipos/crear', [
            'as' => 'createDictumEq',
            'uses' => 'DictumController@createEq']);
        Route::post('dictumeq', 'DictumController@storeEq');

        // update dictum eq
        Route::get('/dictamen/equipo/actualizar/dictamen/{idDictum}', [
            'as' => 'editEq',
            'uses' => 'DictumController@editEq']);

        Route::post('/dictamen/equipo/actualizar/dictamen/{idDictum}', [
            'as' => 'updateEq',
            'uses' => 'DictumController@updateEq']);

        // Delete Dev dictum
        Route::get('/dictamen/equipo/eliminar/dictamen/{idDictum}', [
            'as' => 'deleteEq',
            'uses' => 'DictumController@destroyEq']);


    });
});


