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
  <h1 style="text-align:center; color:#3097d1;">Catalogo de equipos genérico</h1>
  <br>

  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  <div class="center">
	<a class="btn btn-success" role="button" href="{{url('/addequipments') }}" >Agregar equipo</a>
  </div>
  <br/>
  <br/>

  <div id="filtros" class="row">
    <form class="form-inline" method="GET" action="{{ url('/equipments/search') }}" >
	
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label for="nombre">Nombre de equipo: </label>
        <input type="text" class="form-control" id="nombre" name="nombre" />
	  </div>
	  
	  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label for="unidad">Unidad de potencia: </label>
        <input type="text" class="form-control" id="unidad" name="unidad" />
      </div>
	  
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
		<br/>
		<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search">Buscar</span></button>
		<br/>
		<br/>
	  </div>
	  
    </form>
  </div>

  @if (count($equipos)>0)
	<div style="overflow-x:auto;">  
    <table class="table">
      <thead>
        <tr style="color:#3097d1;">
          <th style="text-align:center;">Nombre </th>
          <th style="text-align:center;">Descripción</th>
          <th style="text-align:center;">Unidad de medida </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($equipos as $equipo)
          <tr>
            <td style="text-align:center;">{{ $equipo->nombre_equipo }}</td>
            <td style="text-align:center;">{{ $equipo->descripcion_equipo }}</td>
            <td style="text-align:center;">{{ $equipo->unidad_potencia }}</td>
          <tr>
        @endforeach
      </tbody>
    </table>
	</div>
  @else  
    <div class="alert alert-warning center">
      <p><strong>Oops!</strong> Parece que no hay equipos que mostrar, puede agregar un nuevo equipo.
	  <br/>
	  <br/>	  
	  <a class="btn btn-info" role="button" href="{{ url('/addequipments') }}">NUEVO</a>
      </p>
    </div>
  @endif

@endsection
