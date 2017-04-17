<?php

namespace App\Http\Controllers\Proveedor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class LoginController extends Controller
{

    public function __construct()
    {
      # code...
      $this->middleware('guest:proveedor');
    }


    public function showLoginForm()
    {
        return view('proveedor.login');
    }

    public function login(Request $request)
    {

      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
      ]);
      $credentials = [
        'email' => $request->email,
        'password' => $request->password
      ];
      
      if (Auth::guard('proveedor')->attempt($credentials, $request->remember)){
        return redirect()->intended('/');
      }

      return redirect()->back()->with($request->only('email', 'remember'));


    }
}
