@extends('layouts.master')

@section('title', 'Solicitudes en el sistema')

@section('content')
  <h1>Solicitudes en el sistema.</h1>
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  <a class="btn btn-success" role="button" href="{{url('/addsolicitud') }}" >Agregar solicitud</a>
  @if (count($solicitudes)>0)
    <table class="table table-stripped table-responsive">
      <thead>
        <tr>
          <th> id </th>
          <th> Cantidad </th>
          <th> Precio Estimado </th>
          <th> Estado </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($solicitudes as $solicitud)
          <tr>
            <td>{{ $solicitud->id }}</td>
            <td>{{ $solicitud->cantidad }}</td>
            <td>{{ $solicitud->precio_estimado }} $</td>
            <td>
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
            </td>
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
