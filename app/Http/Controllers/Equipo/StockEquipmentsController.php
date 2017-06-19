<?php

namespace App\Http\Controllers\Equipo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Equipo;
use App\Modelos\CatalogoEquipo;
use Auth;

class StockEquipmentsController extends Controller
{


  public function index()
  {
    return view('stock.index', [
      'equipos' => Equipo::where('id_equipo',Auth::user()->departamento)
    ]);
  }

  public function create()
  {
    return view('stock.create', [
      'catalogos'=> CatalogoEquipo::all()
    ]);
  }

  public function store(Request $req)
  {
    $nuevo = new Equipo();
    $nuevo->inv_equipo = $req->input('codigo');
    $nuevo->marca = $req->input('marca');
    $nuevo->modelo = $req->input('modelo');
    $nuevo->precio_equipo = $req->input('precio');
    $nuevo->id_catalogo = $req->input('catalogo');
    $nuevo->id_departamento = $req->input('departamento');
    $nuevo->save();
    return redirect('/stockequipments')->with('messages', 'Se ha agregado un nuevo equipo al inventario con codigo: '. $nuevo->inv_equipo);
  }

}
