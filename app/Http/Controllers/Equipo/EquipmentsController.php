<?php

namespace App\Http\Controllers\Equipo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\CatalogoEquipo;

class EquipmentsController extends Controller
{
    //
    //
    public function index()
    {
      # code...
      return view('equipos.index', [
        'equipos' => CatalogoEquipo::all(),
      ]);
    }

    public function create()
    {
      return view('equipos.create');
    }

    public function store(Request $req)
    {
      $this->validate($req, [
        'nombre' => 'required',
        'descripcion' => 'required',
        'unidad' => 'required'
      ]);
      $nuevo = new CatalogoEquipo();
      $nuevo->nombre_equipo = $req->input('nombre');
      $nuevo->descripcion_equipo = $req->input('descripcion');
      $nuevo->unidad_potencia = strtoupper($req->input('unidad'));
      $nuevo->save();
      return redirect('/equipments')->with('message', 'Se ha agregado el equipo: ' . $nuevo->nombre_equipo . " al catálogo");

    }

    public function search(Request $filters)
    {
      // $data = [
      //   'nombre' => $filters->input('nombre'),
      //   'unidad' => $filters->input('unidad')
      // ];
      // return var_dump($data);
      /*
      * Se debe validar la existencia de los parametros.
      * Ejecutar el procedimiento
      * Y devolver a la misma vista pero con la data extraida del procedimiento
      * almacenado.
       */
    }
}
