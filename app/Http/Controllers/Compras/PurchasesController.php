<?php

namespace App\Http\Controllers\Compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Compra;
use App\Modelos\Proveedor;


class PurchasesController extends Controller
{
    public function index()
    {

      return view('compras.index', [
        'compras' => Compra::all()
      ]);
    }


    public function create()
    {
      return view('compras.create', [
        'proveedores' => Proveedor::all()
      ]);
    }

    public function store(Request $req)
    {
      $nueva = new Compra();
      $nueva->fecha_compra = $req->input('fecha');
      $nueva->proveedor = $req->input('proveedor');
      $nueva->orden_compra = $req->input('orden');
      $nueva->save();
      return redirect('/purchases')->with('messages', 'Se ha agregado una nueva orden de compra: '. $nueva->id);

    }
}
