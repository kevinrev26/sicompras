@extends('layouts.master')
@section('title', 'Ofertas realizadas')
@section('content')

  @if (session('message'))
    <div class="alert alert-success center">
      {{ session('message') }}
    </div>
  @endif

  <div id="filtros" class="row">
    <form class="form-inline" method="GET" action="{{ url('/offers/search') }}" >
	
	  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label class="col-sm-4" for="precio">Precio de la oferta:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="precio" name="precio" />
		</div>
	    </br>
      </div>
	  
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label class="col-sm-4" for="proveedor">Proveedor:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="proveedor" name="proveedor" />
		</div>
      </div>
	  
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	    <br/>
		<button type="submit" class="btn btn-default"><i style="color:;" class="fa fa-search" aria-hidden="true"></i> <b>Buscar</b></button>
	  </div>

    </form>
  </div>

  @if (count($ofertas)>0)
	
    <div style="overflow-x:auto;">
    <table class="table">
      <thead>
        <tr style="color:#3097d1;">
          <th style="text-align:center;">Precio oferta</th>
          <th style="text-align:center;">Numero licitacion</th>
          <th style="text-align:center;">Nombre de proveedor</th>
          <th style="text-align:center;">Equipo</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ofertas as $o)
          <tr>
            <td style="text-align:center;"> {{ $o->precio_oferta }} $</td>
            <td style="text-align:center;"> {{ $o->licitacion }} </td>
            <td style="text-align:center;"> {{ $o->retail->name }} </td>
            <td style="text-align:center;"> <img src="{{ asset($o->foto_equipo) }}" width="500px" height="400px"  /></td>
            <td style="text-align:center;">
              <form method="post" action="{{ url('/offers/'.$o->id .'/purchaseorders') }}">
                {{ csrf_field() }}
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
                <button type="submit" class="btn btn-info" >Seleccionar Oferta</button>
				</div>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
	</div>
	
  @else
	 
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	<br/>
	<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡No se ha generado ninguna oferta para ésta licitacion!</p>
	<br/>
	</div>
	
  @endif
@endsection
