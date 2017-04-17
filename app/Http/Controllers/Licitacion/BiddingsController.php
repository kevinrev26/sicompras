<?php

namespace App\Http\Controllers\Licitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Licitacion;
use App\Servicios\BiddingsService;
use Auth;

class BiddingsController extends Controller
{
    //
    //

    private $biddingsService;

    public function __construct(BiddingsService $biddingsService)
    {
      # code...
      $this->biddingsService = $biddingsService;
    }

    public function index()
    {
      # code...
      # Filtrar por rol proveedor
      # Filtrar por institucion/uaci

      //Verificar si hay alguien logueado
      if (Auth::check() || Auth::guard('proveedor')->check()) {
        if (Auth::guard('proveedor')->check()) {
          return view('licitaciones.index', [
            'licitaciones' => Licitacion::all()
          ]);
        } else {
          if ((Auth::user()->getRoleSlug() === 'uaci') || (Auth::user()->getRoleSlug() === 'administrador' ) ) {

            if (Auth::user()->getRoleSlug() === 'administrador' ) {
              return view('licitaciones.index', [
                'licitaciones' => Licitacion::all()
              ]);
            } else {
              return view('licitaciones.index', [
                'licitaciones' => $this->biddingsService->filtrarPorInstitucion(Auth::user())
              ]);
            }

          } else {
            return view('errors.403');
          }

        }


      } else {
        //Retornar vista para permisos insuficientes.
        return view('errors.403');
      }

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
