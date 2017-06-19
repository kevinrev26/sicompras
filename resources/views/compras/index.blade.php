@extends('layouts.master')
@section('title','Catalogo de equipos')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')

  <h1 style="text-align:center; color:#3097d1; font-weight:bold;">Compras registradas en el sistema</h1>
  <br/>

  @if (session('message'))
    <div class="alert alert-success">
	<center>
      {{ session('message') }}
	</center>
    </div>
  @endif
  
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	<br/>
	<a class="btn btn-success" role="button" href="{{url('/createpurchase') }}" >Agregar una nueva compra</a>
	<br/>
  </div>




  {{-- <div id="filtros">
    <form class="form-inline" method="GET" action="{{ url('/equipments/search') }}" >
      <div class="form-group">
        <label for="nombre">Nombre de equipo: </label>
        <input type="text" class="form-control" id="nombre" name="nombre" />

      </div>
      <div class="form-group">
        <label for="unidad">Unidad de potencia: </label>
        <input type="text" class="form-control" id="unidad" name="unidad" />
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search">Buscar</span></button>
      </div>

    </form>
  </div> --}}

  @if (count($compras)>0)
	<div style="overflow-x:auto;">
    <table class="table">
      <thead>
        <tr style="color:#3097d1;">
          <th style="text-align:center;">Fecha de compra </th>
          <th style="text-align:center;">Proveedor</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($compras as $compra)
          <tr>
            <td>{{ $compra->fecha_compra }}</td>
            
          <tr>
        @endforeach
      </tbody>
    </table>
	</div>
  @else
	  
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	<br/>
	<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>¡Oops!</strong> Parece que no hay compras que mostrar, puede agregar una nueva compra.</p>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	  <br/>
      <p><a class="btn btn-success" role="button" href="{{ url('/createpurchase') }}">NUEVA</a></p>
	  <br/>
    </div>

  @endif

@endsection
