<?php

namespace App\Http\Controllers\Mantenimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\SolicitudMantenimiento;
use App\Modelos\Equipo;
use \DateTime;

class SolicitudMantenimientoController extends Controller
{
    //
    //
    //
    public function __construct()
    {
      # code...
      $this->middleware('auth');
    }

    public function index()
    {
      //Filtrar por institucion

      return view('mantenimiento.index', [
        'solicitudes' => SolicitudMantenimiento::all(),
      ]);
    }

    public function create()
    {
      # code...
      #
      return view('mantenimiento.create', [
        'equipos' => Equipo::all(),
      ]);

    }

    public function store(Request $req)
    {
      # code...
      if (!$req->input('equipo')) {
        return redirect('/addsolicitudMantenimiento')->withErrors(['No se ha agregado ningún equipo a la solicitud.' ]);
      } else {
        //$valores = array_map('intval', $req->input('equipos'));

        $nuevo = new SolicitudMantenimiento();
        $nuevo->id_sol_mant = intval($req->input('id'));
        if ($req->input('presupuesto') <= 0.00){
          return redirect('/addsolicitudMantenimiento')->withErrors(['El presupuesto no está dentro de los valores permitidos. No se admiten caracteres.']);
        }
        else{
          $nuevo->presupuesto = floatval($req->input('presupuesto'));
        }
        $nuevo->fecha_creacion = new DateTime("now");
        $nuevo->usuario = intval($req->input('usuario'));
        //$llaves = array_map(null, $valores);
        $llave = $req->input('equipo');
        $nuevo->equipo = $llave;
        $nuevo->save();
        /*
          No comprendo porque al hacer Solicitud::find($nuevo->id), el valor
          retornado es null. Y peor aun, no comprendo porque hay que recuperar
          la solicitud que acabamos de agregar para agregarle los equipos.
         */
        // $sol = SolicitudMantenimiento::find($req->input('id'));
        // $llaves = array_map('intval', $valores);
        // $equipos = Equipo::find($llaves);
        // foreach ($equipos as $equipo){
        //   $sol->equipos()->attach($equipo);
        // }
        return redirect('/mantenimiento')->with('message','Se ha agregado la solicitud al sistema.');
      }


    }

    public function update($id)
    {
      # code...
      $s = Solicitud::find($id);
      $s->estado = true;
      $s->save();

      return redirect('/addbiddings')->with('solicitudId', $s);
    }
}
