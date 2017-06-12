<?php

namespace App\Http\Controllers\Ordenes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\OrdenCompra;
use App\Modelos\Oferta;

class PurchaseOrdersController extends Controller
{

    public function index()
    {
      # code...
      return view('ordenes.index',[
        'ordenes' => OrdenCompra::all()
      ]);
    }

    public function create()
    {

      $idOferta = session('oferta');
      return view('ordenes.create', [
        'oferta' => Oferta::find($idOferta)
      ]);
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
      $nueva->fecha_entrega = $req->input('fecha-entrega');
      $nueva->save();

      //Asignar equipos
      $oferta = Oferta::find($req->input('oferta'));
      foreach($oferta->bidding->solicitude->equipos as $equipo){
        $nueva->equipos()->attach($equipo);

      }
      //$nueva->save();
      return redirect('/purchaseorders')->with('message','Nueva orden de compra agregada');

    }

    public function search(Request $filters)
    {
      # code...
    }
}
