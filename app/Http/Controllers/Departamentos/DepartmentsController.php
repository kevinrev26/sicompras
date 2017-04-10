<?php

namespace App\Http\Controllers\Departamentos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\InstitucionGobierno;
use App\Modelos\Departamento;

class DepartmentsController extends Controller
{
  public function index()
  {
    # code...
  }

  public function store(Request $req)
  {
    //Validar la petición.
    $this->validate($req, [
      'codigo' => 'required|max:191',
      'nombre' => 'required|max:191'
    ]);
    $nuevo = new Departamento();
    $nuevo->codigo_departamento = $req->input('codigo');
    $nuevo->nombre_departamento = $req->input('nombre');
    $nuevo->institucion = $req->input('institucion');
    //return var_dump($req);
    //return "Departamento: " . $nuevo->codigo_departamento . " Nombre: " . $nuevo->nombre_departamento . " Identificador de Institucion: " . $nuevo->institucion;
    $nuevo->save();
    //Usualmente se redirige a la pagina de listar todos los departamentos.
    return redirect('/departments/create')->with('message', 'Se ha agregado un nuevo departamento: ' . $nuevo->getNombre());
  }

  public function create()
  {
    //Retornar la vista del formulario
    $instituciones = InstitucionGobierno::all();
    return view('departamentos.create', ['instituciones' => $instituciones]);
  }


}
