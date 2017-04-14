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
    return view('welcome');
});

Route::get('/departments/create', 'Departamentos\DepartmentsController@create');
Route::post('/departments', 'Departamentos\DepartmentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('institutions/{id}/deparments', 'Departamentos\DepartmentsController@listDepartmentsByInstitution');
Route::get('/users', 'Usuarios\UsersController@index');
