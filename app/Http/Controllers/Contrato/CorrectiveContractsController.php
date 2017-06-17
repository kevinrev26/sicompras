<?php

namespace App\Http\Controllers\Contrato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\ContratoMantenimientoCorrectivo;
use App\Modelos\Oferta;
use App\Modelos\Equipo;
use App\Modelos\SolicitudMantenimiento;

class CorrectiveContractsController extends Controller
{
      public function create($id)
      {
        return view('correctivos.create', [
          'oferta' => Oferta::find($id),
          'equipos' => Equipo::orderBy('marca', 'asc')->get(),
        ]);
      }

      public function store(Request $req, $oferta)
      {
        $nuevo = new ContratoMantenimientoCorrectivo();
        $nuevo->monto = $req->input('monto');
        $nuevo->fecha_ejecucion = $req->input('fecha');
        $nuevo->finalizado = false;
        $nuevo->equipo= $req->input('equipo');
        $nuevo->usuario= $req->input('usuario');
        $nuevo->proveedor= $req->input('proveedor');
        $nuevo->save();
        return redirect('/correctivecontracts')->with('message', 'Se ha agregado un nuevo contrato');
      }

      public function index()
      {
        return view('correctivos.index',[
          'contratos' => ContratoMantenimientoCorrectivo::all()
        ]);
      }

      /*public function update($id)
      {
        return redirect('/addbiddings')->with('solicitudId', SolicitudMantenimiento::find($id));
      }*/
}
