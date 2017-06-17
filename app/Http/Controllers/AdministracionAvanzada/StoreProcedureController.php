<?php

namespace App\Http\Controllers\AdministracionAvanzada;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use \DateTime;

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

    return view('Avanzada.index', ['message' => $mensaje]);
  }

  public function consultEquipments(Request $req){
    $mensaje = 'Esta otra función tambien funciona';
    return view('Avanzada.index', ['message' => $mensaje]);
  }

}
