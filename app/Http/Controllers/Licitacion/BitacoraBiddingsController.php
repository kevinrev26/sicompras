<?php

namespace App\Http\Controllers\Licitacion;;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\BitacoraLicitacion;

use Auth;


class BitacoraBiddingsController extends Controller
{

  public function bitacora()
  {
    if ((Auth::user()->getRoleSlug() === 'uaci') || (Auth::user()->getRoleSlug() === 'administrador' ) ) {

        return view('licitaciones.bitacora', [
          'bitacoras_licitaciones' => BitacoraLicitacion::all()
        ]);
      } else {
          return view('errors.403');
      }
  }

}
