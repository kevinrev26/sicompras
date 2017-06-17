<?php

namespace App\Http\Controllers\Empleados;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Empleado;


class EmployeesController extends Controller
{
    public function index($id)
    {
      $empleados = Empleado::where('proveedor',$id)
                              ->orderby('nombre_completo','asc')->get();
      return view('empleados.index',[
        'empleados' => $empleados
      ]);
    }

    public function store(Request $req)
    {
      $id = $req->input('id');
      $empleado = new Empleado();
      $empleado->nombre_completo = $req->input('nombre');
      $empleado->proveedor = $id;
      $empleado->save();

      return redirect('/'.$id.'/employees')->with('message', 'Se ha agregado el nuevo empleado: ' . $empleado->nombre_completo);
    }

    public function destroy($id)
    {
      $emp = Empleado::find($id);
      $nombre = $emp->nombre_completo;
      $proveedor = $emp->proveedor;

      $emp->delete();
      return redirect('/'.$proveedor.'/employees')->with('message', 'Se ha eliminado el empleado: ' . $nombre);
    }

    public function getEmployees($id)
    {
      return response()->json(Empleado::where('proveedor',$id)
                              ->orderby('nombre_completo','asc')->get());
    }
}
