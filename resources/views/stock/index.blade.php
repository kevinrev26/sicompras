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
  <h1 style="text-align:center; color:#3097d1;">Inventario de equipos: <br/>
  {{ Auth::user()->depto->nombre_departamento }}.
  </h1>
  <br/>
  
  @if (session('message'))
    <div class="alert alert-success center">
      {{ session('message') }}
    </div>
  @endif
  
  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
      <p><a class="btn btn-success" role="button" href="{{url('/create-stockequipments') }}" >Agregar equipo</a></p>
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

  @if (count($equipos)>0)
	<div>  
    <table class="table">
      <thead>
        <tr style="color:#3097d1;">
          <th style="text-align:center;">Código </th>
          <th style="text-align:center;">Marca</th>
          <th style="text-align:center;">Modelo </th>
          <th style="text-align:center;">Precio </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($equipos as $equipo)
          <tr>
            <td>{{ $equipo->inv_equipo }}</td>
            <td>{{ $equipo->marca }}</td>
            <td>{{ $equipo->modelo }}</td>
            <td>{{ $equipo->precio_equipo }}</td>
            <td> <a href="{{url('/stocks/'. $equipo->id_equipo .'/binnacles')}}"><button class="btn btn-primary">Ver Mantenimientos</button></a> </td>
          <tr>
        @endforeach
      </tbody>
    </table>
	</div>
  @else
	  
	 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	  <br/>
	  <p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>¡Oops!</strong> Parece que no hay equipos que mostrar, puede agregar un nuevo equipo.</p>
		<br/>
	 </div>
	 
	 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
      <p><a class="btn btn-success" role="button" href="{{ url('/create-stockequipments') }}">NUEVO</a></p>
	  <br/>
    </div>
	
  @endif

@endsection
