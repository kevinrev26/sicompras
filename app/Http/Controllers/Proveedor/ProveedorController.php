<?php

namespace App\Http\Controllers\Proveedor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:proveedor');
  }

  public function prueba()
  {
    # code...
    return view('proveedor.prueba');
  }

}
