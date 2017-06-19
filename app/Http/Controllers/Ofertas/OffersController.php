<?php

namespace App\Http\Controllers\Ofertas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Oferta;
use App\Modelos\Licitacion;
use App\Modelos\Solicitud;
use Auth;
class OffersController extends Controller
{
    //
    //
    public function index()
    {
      return view('ofertas.mines',[
        'ofertas' => Oferta::where('proveedor',Auth::guard('proveedor')->user()->id)->get()
      ]);
    }

    public function create()
    {
      # code...
      return view('ofertas.create');
    }

    public function store(Request $req)
    {
      # code...
      # Validar la entrada
      $this->validate($req,[
        'imagen' => 'required|image'
      ]);
      #
      #
      $nueva = new Oferta();
      $nueva->precio_oferta = $req->input('precio');
      $nueva->descripcion_oferta = $req->input('descripcion');
      $nueva->licitacion = $req->input('licitacion');
      $nueva->proveedor = $req->input('proveedor');
      $imageName = mt_rand(999,999999)."_".time()."_".".".$req->file('imagen')->getClientOriginalExtension();
      $req->imagen->move( public_path('images') ,$imageName);
      $path = "images". "/" . $imageName;
      $nueva->foto_equipo = $path;
      //return var_dump($nueva);
      $nueva->save();
      return redirect('/biddings')->with('message', 'Se ha agreado la oferta.');
    }

    public function createPurchaseOrder($id)
    {
      $o = Oferta::find($id);

      $l = Licitacion::find($o->licitacion);
      $l->estado = 'FINALIZADA';
      $l->save();

      if(Solicitud::find($l->solicitud)){
        return redirect('/pruchaseorders/create')->with('oferta', $id);
      } else {
        /*Creacion de contratos...*/
        return redirect('/offers/'.$id.'/contracts');
      }

    }

    public function search(Request $filters)
    {
      # code...
    }
}
