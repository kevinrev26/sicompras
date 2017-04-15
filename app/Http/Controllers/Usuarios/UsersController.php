<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Modelos\Rol;

class UsersController extends Controller
{
    //
    //
    public function index()
    {
      # code...
      return view('usuarios.index', [
        'users' => User::all(),
        'roles' => Rol::all(),
      ]);
    }

    public function update($id, Request $req)
    {
      $usuario = User::find($id);
      $usuario->rol = $req->input('rol');
      $usuario->save();
      return redirect('/users')->with('message', 'Se ha actualizado el nuevo rol de usuario.');
    }
}
