<?php

namespace App\Http\Controllers\Solicitud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\CatalogoEquipo;
use App\Modelos\TipoSolicitud;

class SolicitudeController extends Controller
{
    //
    //
    public function create()
    {
      # code...
      #
      return view('solicitudes.create', [
        'equipos' => CatalogoEquipo::all(),
        'tipos' => TipoSolicitud::all()
      ]);

    }
}
