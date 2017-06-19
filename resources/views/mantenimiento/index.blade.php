@extends('layouts.master')
@section('title', 'Solicitudes de Mantenimiento en el sistema')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')

  <h1 style="text-align:center; color:#3097d1;">Solicitudes de Mantenimiento en el sistema</h1>
  <br/>
  
  @if (session('message'))
    <div class="alert alert-success center">
      {{ session('message') }}
    </div>
  @endif
  
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
  <p><a class="btn btn-success" role="button" href="{{ url('/addsolicitudMantenimiento') }}">Agregar Solicitud</a></p>
  <br/>
  </div>
  
  @if (count($solicitudes)>0)
	  
	<div>  
    <table class="table">
      <thead>
        <tr style="color:#3097d1;">
          <th style="text-align:center;">id </th>
          <th style="text-align:center;">Presupuesto Estimado </th>
          <th style="text-align:center;">Fecha de Creación </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($solicitudes as $solicitud)
          <tr>
            <td style="text-align:center;">{{ $solicitud->id_sol_mant }}</td>
            <td style="text-align:center;">{{ $solicitud->presupuesto }}</td>
            <td style="text-align:center;">{{ $solicitud->fecha_creacion }} $</td>
            @if(Auth::user()->getRoleSlug() === 'uaci' )
            <td>
              <form action="{{url('/updatesolicitude/'.$solicitud->id_sol_mant)}}" method="post">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-info">Generar licitacion</button>
                </form>
            </td>
            @endif

             
            <!-- <td>
              @if ($solicitud->estado)
                <h3> <span class="label label-default">APROBADA</span> </h3>
              @else
                @if (Auth::user()->getRoleSlug() === 'uaci')
                  <form action="{{url('/solicitude/'.$solicitud->id)}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info">PENDIENTE</button>
                  </form>
                @else
                  <h4> <span class="label label-warning">PENDIENTE</span> </h4>
                @endif
              @endif
            </td> -->
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
      <p><a class="btn btn-success" role="button" href="{{ url('/addsolicitudMantenimiento') }}">NUEVO</a></p>
	  <br/>
    </div>
  @endif

@endsection
