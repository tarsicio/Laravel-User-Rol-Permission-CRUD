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
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

/**
 * Ruta con el prefijo admin para el controlador RolesController, se mostraran las rutas como el siguiente
 * Ejemplo: el prefijo admin se refiere que solo tienen acceso los difinidos en el grupo Admin
 * http://aplicacion.app/admin/roles
 * http://aplicacion.app/admin/roles/{role}/edit donde {role} es una variable numerica 1,2,3.... n
 *
 */

Route::group(['prefix' => 'admin', 'namespace' => 'Seguridad'], function () {

    Route::resource('roles', 'RolesController');
    Route::resource('permisos', 'PermissionsController');
});

Route::group(['prefix' => 'admin2', 'namespace' => 'Seguridad'], function () {
    Route::get('roles','PermissionsRolesController@index');
    Route::get('roles/asignar','PermissionsRolesController@asignar');
    Route::get('roles/desasignar','PermissionsRolesController@desasignar');
});

Route::group(['prefix' => 'admin3', 'namespace' => 'Seguridad'], function () {
    Route::get('permisousuario','PermissionsUsersController@index');
    Route::get('permisousuario/asignar','PermissionsUsersController@asignar');
    Route::get('permisousuario/desasignar','PermissionsUsersController@desasignar');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Modulos'], function () {

    Route::get('modulos', 'ModulosController@seguridad');
});

Route::group(['prefix' => 'admin', 'namespace' => 'User'], function () {

    Route::resource('users', 'UsersController');
});

