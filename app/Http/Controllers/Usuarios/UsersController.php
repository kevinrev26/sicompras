<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UsersController extends Controller
{
    //
    //
    public function index()
    {
      # code...
      return view('usuarios.index', [
        'users' => User::all()
      ]);
    }
}
