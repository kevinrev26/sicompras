<?php

namespace App\Http\Controllers\Ordenes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\OrdenCompra;

class PurchaseOrdersController extends Controller
{

    public function index()
    {
      # code...
      return view('ordenes.index');
    }

    public function create()
    {
      return view('ordenes.create');
    }

    public function store(Request $req)
    {
      $nueva = new OrdenCompra();
      $nueva->fecha = date('d m o');
      $nueva->tecnico = false;
      $nueva->uaci = false;
      $nueva->jefe = false;
      $nueva->usuario = $req->input('usuario');
      $nueva->oferta = $req->input('oferta');
      $nueva->save();
      return redirect('/purchaseorders')->with('message','Nueva orden de compra agregada');

    }
}
