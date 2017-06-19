@extends('layouts.master')

@section('title', 'Solicitudes en el sistema')

@section('content')
  <h1>Solicitudes en el sistema.</h1>
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  <div id="filtros">
    <form class="form-inline" method="GET" action="{{ url('/solicitude/search') }}" >
      <div class="form-group">
        <label for="numero">Numero de solicitud: </label>
        <input type="text" class="form-control" id="numero" name="numero" />

      </div>
      <div class="form-group">
        <label for="total">Total de la solicitud: </label>
        <input type="text" class="form-control" id="total" name="total" />

      </div>
      <div class="form-group">
        <label for="lugar">Lugar de entrega:  </label>
        <input type="text" class="form-control" id="lugar" name="lugar" />
      </div>
      
    </form>
  </div>
  @if (count($solicitudes)>0)
    <table class="table table-stripped table-responsive">
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
  @else
    <div class="alert alert-warning">
      <strong>Oops!</strong> Parece que no hay solicitudes que mostrar.
      <p>
        Puede agregar una nueva solicitud. <a class="btn btn-info" role="button" href="{{ url('/addsolicitud') }}">NUEVO</a>
      </p>
    </div>
  @endif

@endsection
