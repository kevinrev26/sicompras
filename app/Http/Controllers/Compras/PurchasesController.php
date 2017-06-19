<?php

namespace App\Http\Controllers\Compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Compra;
use App\Modelos\Proveedor;
use App\Servicios\PurchasesService;
use Auth;
use App\Modelos\OrdenCompra;

class PurchasesController extends Controller
{

    private $service;

    public function __construct(PurchasesService $service)
    {
      $this->service = $service;
    }

    public function index()
    {

      //return $this->service->filtrarPorDepartamento(Auth::user());

      return view('compras.index', [
        //'compras' => $this->service->filtrarPorDepartamento(Auth::user())
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
      if(OrdenCompra::find($nueva->orden_compra)){
        $nueva->save();
        return redirect('/purchases')->with('messages', 'Se ha agregado una nueva orden de compra: '. $nueva->id);
      }else{
        return redirect('/createpurchase')->withErrors(['Se necesita asignar la compra a una Orden de compra existente']);
      }


    }
}
