@extends('layouts.master')

@section('title', 'Solicitudes en el sistema')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')
  <h1 style="text-align:center; color:#3097d1;">Solicitudes en el sistema</h1>
  <br/>
  
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  
  <div id="filtros" class="row">
    <form class="form-inline" method="GET" action="{{ url('/solicitude/search') }}" >
      
	  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label class="col-sm-4" for="numero">Número de solicitud: </label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="numero" name="numero" />
		</div>
	  </div> 
	  
	  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
		<label  class="col-sm-4" for="lugar">Lugar de entrega: </label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="lugar" name="lugar" />
		</div>
      </div>
	  
	  <br/><br/>
	  
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label class="col-sm-4" for="total">Total de la solicitud: </label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="total" name="total" />
		</div>
	  </div>
	  
	  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
		<label class="col-sm-4" for="estado">Estado de la solicitud: </label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="estado" name="estado" />
		</div>
      </div>
	  
	  <br/>
	  <br/>
	  
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	    <br/>
		<button type="submit" class="btn btn-default"><i style="color:;" class="fa fa-search" aria-hidden="true"></i> <b>Buscar</b></button>
	  </div>
	  
    </form>
  </div>
  <br/>
  
  @if (count($solicitudes)>0)
	  
	<div style="overflow-x:auto;">  
    <table class="table">
      <thead>
        <tr>
          <th> id </th>
          <th> Cantidad </th>
          <th> Precio Estimado </th>
          <th> Estado </th>
          <th> Autor </th>
          <th> Institución </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($solicitudes as $solicitud)
          <tr>
            <td>{{ $solicitud->id }}</td>
            {{-- <td>{{ $solicitud->pivot->cantidad }}</td> --}}
            <td>DEBUG</td>
            {{--La propiedad pivot, la posee el catalogo de equipos --}}
            <td>{{ $solicitud->precio_estimado }} $</td>
            <td>
              @if ($solicitud->estado)
                <h3> <span class="label label-default">APROBADA</span> </h3>
              @else
                @if (Auth::user()->getRoleSlug() === 'uaci')
                <a href="{{url('/solicitude/'.$solicitud->id)}}" class="btn btn-info" method="put">VER DETALLES</a>
                @else
                  <h4> <span class="label label-warning">PENDIENTE</span> </h4>
                @endif
              @endif
            </td>
            <td>{{ $solicitud->user->name}} </td>
             <td>{{ $solicitud->user->depto->inst->nombre_institucion }} </td>
          <tr>
        @endforeach
      </tbody>
    </table>
	</div>
	
  @else

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	<br/>
	<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>¡Oops!</strong> Parece que no hay solicitudes que mostrar, puede agregar una nueva solicitud.</p>
	<br/>
	</div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
      <p><a class="btn btn-success" role="button" href="{{ url('/addsolicitud') }}">NUEVO</a></p>
	  <br/>
    </div>
  @endif

@endsection
