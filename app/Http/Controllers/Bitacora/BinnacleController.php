<?php

namespace App\Http\Controllers\Bitacora;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\BitacoraMantenimiento;
use App\Modelos\Proveedor;

class BinnacleController extends Controller
{
    //
    //
    public function index($equipo)
    {
      return view('bitacoras.index',[
        'bitacoras' => BitacoraMantenimiento::where('equipo',$equipo)->orderBy('id','desc')->get(),
        'equipo'=>$equipo,
        'proveedores'=>Proveedor::all()
      ]);
    }

    public function store($equipo, Request $req)
    {
      $nueva = new BitacoraMantenimiento();
      $nueva->fecha_mantenimiento = $req->input('fecha');
      $nueva->descripcion_mantenimiento = $req->input('descripcion');
      $imageName = mt_rand(999,999999)."_".time()."_".".".$req->file('imagen')->getClientOriginalExtension();
      $req->imagen->move( public_path('images') ,$imageName);
      $path = "images". "/" . $imageName;
      $nueva->imagen = $path;
      $nueva->usuario = $req->input('usuario');
      $nueva->tipo_mantenimiento = $req->input('mantenimiento');
      $nueva->empleado = $req->input('empleado');
      $nueva->equipo = $equipo;

      $nueva->save();
      return redirect('/stocks/'.$equipo.'/binnacles')->with('message', 'Se ha agreado el registro.');



    }
}
