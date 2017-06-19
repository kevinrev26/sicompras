<?php

namespace App\Http\Controllers\Contrato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\ContratoMantenimientoPreventivo;
use App\Modelos\Equipo;

class PreventiveContractsController extends Controller
{
    public function index()
    {
      return view('preventivos.index',[
        'contratos'=> ContratoMantenimientoPreventivo::all()
      ]);
    }

    public function create()
    {
      return view('preventivos.create',[
        'equipos' => Equipo::all()
      ]);
    }

    public function store()
    {
      # code...
    }
}
