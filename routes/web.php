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


//Route::group(['middleware' => ['web']], function(){
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

  Route::get('/equipments/search', 'Equipo\EquipmentsController@search');

  /*Solicitudes*/
  Route::get('/addsolicitud', 'Solicitud\SolicitudeController@create');
  Route::post('/solicitude', 'Solicitud\SolicitudeController@store');
  Route::get('/solicitude', 'Solicitud\SolicitudeController@index');
  Route::get('/solicitude/{id}', 'Solicitud\SolicitudeController@show');
  Route::post('/solicitude/{id}', 'Solicitud\SolicitudeController@update');

  Route::get('/solicitude/search', 'Solicitud\SolicitudeController@search');

  /*Solicitudes de Mantenimiento*/
  Route::get('/solicitud', 'Mantenimiento\SolicitudMantenimientoController@index');
  Route::post('/solicitud', 'Mantenimiento\SolicitudMantenimientoController@store');
  Route::get('/addsolicitudMantenimiento', 'Mantenimiento\SolicitudMantenimientoController@create');
  Route::post('/updatesolicitude/{id}','Mantenimiento\SolicitudMantenimientoController@update');


  /*Licitaciones*/
  Route::get('/addbiddings', 'Licitacion\BiddingsController@create');
  Route::post('/biddings', 'Licitacion\BiddingsController@store');
  Route::get('/biddings', 'Licitacion\BiddingsController@index');
  Route::get('/biddings/{id}', 'Licitacion\BiddingsController@show');
  Route::post('/biddings/{id}', 'Licitacion\BiddingsController@update');
  Route::get('/biddings/{id}/offers', 'Licitacion\BiddingsController@showOffers');
  Route::get('/biddings/search', 'Licitacion\BiddingsController@search');

  /*Ofertas*/
  Route::get('/offers/create', 'Ofertas\OffersController@create');
  Route::get('/offers','Ofertas\OffersController@index');
  Route::post('/offers', 'Ofertas\OffersController@store');
  Route::post('/offers/{id}/purchaseorders','Ofertas\OffersController@createPurchaseOrder');
  Route::get('/offers/search', 'Ofertas\OffersController@search');
  Route::get('/offers/{id}/contracts','Contrato\CorrectiveContractsController@create');
  Route::post('/offers/{id}/contracts', 'Contrato\CorrectiveContractsController@store');

  /*Ordenes de compra*/
  Route::get('/pruchaseorders/create', 'Ordenes\PurchaseOrdersController@create');
  Route::post('/purchaseorders', 'Ordenes\PurchaseOrdersController@store');
  Route::get('/purchaseorders', 'Ordenes\PurchaseOrdersController@index');
  Route::get('/purchaseorders/search', 'Ordenes\PurchaseOrdersController@search');


  /*Proveedores*/
  Route::get('/proveedor/login', 'Proveedor\LoginController@showloginform');
  Route::post('/proveedor/login','Proveedor\LoginController@login');

  //Empleados del proveedor.
  Route::get('/{id}/employees','Empleados\EmployeesController@index');
  //Route::get('/employees-create','Empleados\EmployeesController@create');
  Route::post('/employees','Empleados\EmployeesController@store');
  Route::post('employees/{id}', 'Empleados\EmployeesController@destroy');
  Route::get('/api/{id}/employees','Empleados\EmployeesController@getEmployees');


  /*Compras*/
  Route::get('/purchases', 'Compras\PurchasesController@index');
  Route::post('/purchases', 'Compras\PurchasesController@store');
  Route::get('/createpurchase','Compras\PurchasesController@create');

  /*Inventario de Equipos*/
  Route::get('/stockequipments', 'Equipo\StockEquipmentsController@index');
  Route::post('/stockequipments', 'Equipo\StockEquipmentsController@store');
  Route::get('/create-stockequipments', 'Equipo\StockEquipmentsController@create');
  Route::get('/stocks/{id}/binnacles', 'Bitacora\BinnacleController@index');
  Route::post('/stocks/{id}/binnacles', 'Bitacora\BinnacleController@store');

  //Contratos
  Route::get('/correctivecontracts', 'Contrato\CorrectiveContractsController@index');
  Route::get('/preventivecontracts','Contrato\PreventiveContractsController@index');
  Route::post('/preventivecontracts','Contrato\PreventiveContractsController@store');
  Route::get('/add-preventivecontracts','Contrato\PreventiveContractsController@create');
  Route::post('/correctivecontracts/{id}', 'Mantenimiento\SolicitudMantenimientoController@update');


  /*Procedimientos*/
  Route::get('/avanzada', 'AdministracionAvanzada\StoreProcedureController@index');
  Route::get('/resetPurchaseLimit', 'AdministracionAvanzada\StoreProcedureController@resetPurchaseLimit');
  Route::get('/consultEquipments', 'AdministracionAvanzada\StoreProcedureController@consultEquipments');
  Route::get('/consultEmployees', 'AdministracionAvanzada\StoreProcedureController@consultEmployees');
  Route::get('/consultBinnacle', 'AdministracionAvanzada\StoreProcedureController@consultBinnacle');


  /* Bitacora de licitaciones */
  Route::get('/bitacorabiddings', 'Licitacion\BitacoraBiddingsController@bitacora');

//});



/*ruta de prueba*/
//Route::get('/prueba', 'Proveedor\ProveedorController@prueba');
