<?php

namespace App\Http\Controllers\Solicitud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\CatalogoEquipo;
use App\Modelos\TipoSolicitud;
use App\Modelos\Solicitud;

class SolicitudeController extends Controller
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

      return view('solicitudes.index', [
        'solicitudes' => Solicitud::all(),
      ]);
    }

    public function create()
    {
      # code...
      #
      return view('solicitudes.create', [
        'equipos' => CatalogoEquipo::all(),
        'tipos' => TipoSolicitud::all()
      ]);

    }

    public function store(Request $req)
    {
      # code...
      # Validar precio estimado
      if (!$req->input('equipos')) {
        return redirect('/addsolicitud')->withErrors(['No se ha agregado ningun equipo a la solicitud.' ]);
      } else {
        $valores = array_map('intval', $req->input('equipos'));

        $nuevo = new Solicitud();
        $nuevo->id = intval($req->input('id'));

        $nuevo->unidad_medida = strtoupper($req->input('unidad'));
        $nuevo->cantidad = count($valores);
        $nuevo->especificaciones_tecnicas = $req->input('especificaciones');
        if ($req->input('precio') <= 0.00){
          return redirect('/addsolicitud')->withErrors(['El precio debe de ser un número real mayor que cero. No se admiten caracteres.']);
        }
        else{
          $nuevo->precio_estimado = floatval($req->input('precio'));
        }
        $nuevo->forma_entrega = strtoupper($req->input('forma'));
        $nuevo->lugar_entrega = strtoupper($req->input('lugar'));
        $nuevo->estado = false;
        $nuevo->tipo = intval($req->input('tipo'));
        $nuevo->usuario = intval($req->input('usuario'));
        //return var_dump($valores);
        $nuevo->save();
        /*
          No comprendo porque al hacer Solicitud::find($nuevo->id), el valor
          retornado es null. Y peor aun, no comprendo porque hay que recuperar
          la solicitud que acabamos de agregar para agregarle los equipos.
         */
        $sol = Solicitud::find($req->input('id'));
        $llaves = array_map('intval', $valores);
        $equipos = CatalogoEquipo::find($llaves);
        foreach ($equipos as $equipo){
          $sol->equipos()->attach($equipo);
        }
        return redirect('/solicitude')->with('message','Se ha agregado la solicitud al sistema.');
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
