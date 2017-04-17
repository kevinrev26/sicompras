<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/departments/create', 'Departamentos\DepartmentsController@create');
Route::post('/departments', 'Departamentos\DepartmentsController@store');

Auth::routes();

/*Usuarios*/
Route::get('/users', 'Usuarios\UsersController@index');
Route::post('/users/{id}','Usuarios\UsersController@update');

/*Catalogo de equipo*/
Route::get('/equipments', 'Equipo\EquipmentsController@index');
Route::get('/addequipments', 'Equipo\EquipmentsController@create');
Route::post('/equipments', 'Equipo\EquipmentsController@store');

/*Solicitudes*/
Route::get('/addsolicitud', 'Solicitud\SolicitudeController@create');
Route::post('/solicitude', 'Solicitud\SolicitudeController@store');
Route::get('/solicitude', 'Solicitud\SolicitudeController@index');
Route::post('/solicitude/{id}', 'Solicitud\SolicitudeController@update');

/*Licitaciones*/
Route::get('/addbiddings', 'Licitacion\BiddingsController@create');

Route::get('/home', 'HomeController@index');
Route::get('institutions/{id}/deparments', 'Departamentos\DepartmentsController@listDepartmentsByInstitution');
