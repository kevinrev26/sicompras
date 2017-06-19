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
    <div class="alert alert-success center">
      {{ session('message') }}
    </div>
  @endif

  
  <div id="filtros" class="row">

    </form>
  </div>
  <br/>
  
  @if (count($solicitudes)>0)
	  
	<div>  
    <table class="table">
      <thead>
        <tr style="color:#3097d1;">
          <th style="text-align:center;">id </th>
          <th style="text-align:center;">Cantidad </th>
          <th style="text-align:center;">Precio Estimado </th>
          <th style="text-align:center;">Estado </th>
          <th style="text-align:center;">Autor </th>
          <th style="text-align:center;">Institución </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($solicitudes as $solicitud)
          <tr style="text-align:center;">
            <td>{{ $solicitud->id }}</td>
            {{-- <td>{{ $solicitud->pivot->cantidad }}</td> --}}

            {{--La propiedad pivot, la posee el catalogo de equipos --}}
            <td>{{ $solicitud->precio_estimado }} $</td>
            <td>
              @if ($solicitud->estado)
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
					<p class="alertass" style="color:#3c763d; background-color:rgba(96, 175, 100, 0.52);"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>¡APROBADA!</strong></p>
				</div>  
              @else
                @if (Auth::user()->getRoleSlug() === 'uaci')
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
                 <a href="{{url('/solicitude/'.$solicitud->id)}}" class="btn btn-info" method="put">VER DETALLES</a>
				</div>
                @else
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
						<p class="alertass" style="color:#31708f; background-color:rgba(239, 171, 74, 0.74);"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>¡PENDIENTE!</strong></p>
					</div>
                @endif
              @endif
            </td>
            <td>{{ $solicitud->user->name}} </td>
            <td>{{ $solicitud->user->depto->inst->nombre_institucion }} </td>
          </tr>
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
