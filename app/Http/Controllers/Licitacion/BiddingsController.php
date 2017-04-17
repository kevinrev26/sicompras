<?php

namespace App\Http\Controllers\Licitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Licitacion;

class BiddingsController extends Controller
{
    //
    //
    //
    public function __construct()
    {
      # code...
      //$this->middleware('auth');
    }

    public function index()
    {
      # code...
      # Filtrar por rol proveedor
      # Filtrar por institucion/uaci
      return view('licitaciones.index');


    }

    public function create()
    {
      # code...
      #
      return view('licitaciones.create');
    }

    public function store(Request $req)
    {
      //Validar entrada
      $nueva = new Licitacion();
      $nueva->nombre_convocatoria = $req->input('nombre');
      $nueva->objeto = $req->input('objeto');
      $nueva->informacion_adicional = $req->input('informacion');
      $nueva->fuente_financiamiento = $req->input('fuente');
      $nueva->estado = 'PUBLICADA';
      $nueva->tipo_licitacion = $req->input('tipo');
      $nueva->usuario = $req->input('usuario');
      $nueva->solicitud = $req->input('solicitud');
      $nueva->save();
      return redirect('/biddings')->with('message', 'Se ha agregado la licitación a los registros');
    }
}
