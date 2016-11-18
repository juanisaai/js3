<?php

//-----------------------------------open CRUD Users-------------------------------

// Create
Route::get('/administracion/usuarios/crear', [
'as'   => 'createUser',
'uses' => 'Admin\UsersController@create']);
Route::post('users', 'Admin\UsersController@store');

// Create Admin
Route::get('/administracion/administrador/crear', [
'as'   => 'createAdmin',
'uses' => 'Admin\UsersController@createAd']);
Route::post('admin', 'Admin\UsersController@storeAd');

// Read User
Route::get('/administracion/lista-de-usuarios', [
'as'   => 'readUser',
'uses' => 'Admin\UsersController@seeUsers']);

// Read Admin
Route::get('/administracion/administrador/config', [
'as'   => 'readAdmin',
'uses' => 'Admin\UsersController@seeAdmin']);

// Update
Route::get('/administracion/usuario/{id}/actualizar-datos', [
'as'   => 'editUser',
'uses' => 'Admin\UsersController@editUser']);

Route::post('/administracion/usuario/{id}/actualizar-datos', [
'as'   => 'updateUser',
'uses' => 'Admin\UsersController@updateUser']);


// Update Admin
Route::get('/administracion/administrador/{id}/actualizar-datos', [
'as'   => 'editAdmin',
'uses' => 'Admin\UsersController@editAdmin']);

Route::post('/administracion/administrador/{id}/actualizar-datos', [
'as'   => 'updateAdmin',
'uses' => 'Admin\UsersController@updateAdmin']);

// Delete
Route::get('/administracion/lista-de-usuarios/{id}/eliminar', [
'as' => 'deleteUser',
'uses' => 'Admin\UsersController@deleteUser']);
// Delete Admin
Route::get('/administracion/administrador/{id}/eliminar', [
'as' => 'deleteAdmin',
'uses' => 'Admin\UsersController@deleteAdmin']);

//-----------------------------------Close CRUD Users-------------------------------

