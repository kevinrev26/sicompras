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


Route::group(['middleware' => ['web']], function(){
  Route::get('/', function () {
      return view('home');
  });
  Route::get('/home', 'HomeController@index');
  Auth::routes();

  /*Departamentos*/
  Route::get('/departments/create', 'Departamentos\DepartmentsController@create');
  Route::post('/departments', 'Departamentos\DepartmentsController@store');
  Route::get('institutions/{id}/deparments', 'Departamentos\DepartmentsController@listDepartmentsByInstitution');

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
  Route::post('/biddings', 'Licitacion\BiddingsController@store');
  Route::get('/biddings', 'Licitacion\BiddingsController@index');
  Route::get('/biddings/{id}', 'Licitacion\BiddingsController@show');
    Route::get('/biddings/{id}/offers', 'Licitacion\BiddingsController@showOffers');

  /*Proveedores*/
  Route::get('/proveedor/login', 'Proveedor\LoginController@showloginform');
  Route::post('/proveedor/login','Proveedor\LoginController@login');

});



/*ruta de prueba*/
//Route::get('/prueba', 'Proveedor\ProveedorController@prueba');
