<?php

namespace App\Http\Controllers\Ordenes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\OrdenCompra;
use App\Modelos\Oferta;
use App\Modelos\Solicitud;

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
      $oferta = Oferta::find($req->input('oferta'));
      $solicitud = Solicitud::find($oferta->bidding->solicitud);
      //Asignar equipos

      foreach($solicitud->equipos as $equipo){
        $nueva->equipos()->attach($equipo);

      }
      //$nueva->save();
      return redirect('/purchaseorders')->with('message','Nueva orden de compra agregada');

    }

    public function search(Request $filters)
    {
      $fecha = $filters->input('fecha');
      $id = $filters->input('id');
      $data = DB::select('CALL getOrdenes(?,?)', array($fecha, $id));
      return view('ordenes.index', ['ordenes' => $data]);
    }
}
