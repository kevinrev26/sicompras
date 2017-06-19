<?php

namespace App\Http\Controllers\AdministracionAvanzada;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Modelos\Proveedor;
use App\Modelos\Equipo;
use App\Modelos\BitacoraMantenimiento;
use \DB;

class StoreProcedureController extends Controller
{
  public function index()
  {
    $mensaje = '';
    return view('Avanzada.index', ['message' => $mensaje]);
  }

  public function resetPurchaseLimit(Request $req){
    // $time = time();
    // $fecha_hoy = date('Y/m/d', $time);
    // $fecha_fin = date('Y', $time)."/12/31";
    // $datetime1 = new DateTime($fecha_hoy);
    // $datetime2 = new DateTime($fecha_fin);
    // if ($datetime1 < $datetime2)
    //   $mensaje = "Aún no es tiempo de resetear el limite de compras a 0.";
    // else {
    //   $mensaje = "Límites puestos a cero nuevamente.";
    // }

    //Llamando al Procedimiento que reseteará los totales de los proveedores.
    DB::select('CALL resetBudget()');
    $mensaje = "Valores actualizados satisfactoriamente";
    return view('Avanzada.index', ['message' => $mensaje]);
  }

  public function consultEquipments(Request $req){
    $data = DB::select('CALL equipmentsMaintenance()');
    return view('Avanzada.equipments', ['equipments' => $data]);
  }

  public function consultEmployees(Request $req){
    $data = DB::select('CALL employeesMaintenance()');
    return view('Avanzada.employees', ['employees' => $data]);
  }

  public function consultBinnacle(Request $req){
    $data = BitacoraMantenimiento::all();
    return view('Avanzada.bitacora', ['bitacora' => $data]);
  }

}
