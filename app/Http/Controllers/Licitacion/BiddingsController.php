<?php

namespace App\Http\Controllers\Licitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BiddingsController extends Controller
{
    //
    //
    //
    public function __construct()
    {
      # code...
      $this->middleware('auth');
    }

    public function create()
    {
      # code...
      #
      return view('licitaciones.create');
    }
}
