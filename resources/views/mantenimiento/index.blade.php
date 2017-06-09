@extends('layouts.master')

@section('title', 'Solicitudes de Mantenimiento en el sistema')

@section('content')
  <h1>Solicitudes de Mantenimiento en el sistema.</h1>
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  <a class="btn btn-success" role="button" href="{{url('/addsolicitudMantenimiento') }}" >Agregar Solicitud</a>
  @if (count($solicitudes)>0)
    <table class="table table-stripped table-responsive">
      <thead>
        <tr>
          <th> id </th>
          <th> Presupuesto Estimado </th>
          <th> Fecha de Creación </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($solicitudes as $solicitud)
          <tr>
            <td>{{ $solicitud->id_sol_mant }}</td>
            <td>{{ $solicitud->presupuesto }}</td>
            <td>{{ $solicitud->fecha_creacion }} $</td>
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
          <tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="alert alert-warning">
      <strong>Oops!</strong> Parece que no hay solicitudes que mostrar.
      <p>
        Puede agregar una nueva solicitud. <a class="btn btn-info" role="button" href="{{ url('/addsolicitudMantenimiento') }}">NUEVO</a>
      </p>
    </div>
  @endif

@endsection
