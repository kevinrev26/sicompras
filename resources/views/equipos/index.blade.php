@extends('layouts.master')
@section('title','Catalogo de equipos')

@section('content')
  <h1>Catalogo de equipos genérico.</h1>
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  <a class="btn btn-success" role="button" href="{{url('/addequipments') }}" >Agregar equipo</a>
  @if (count($equipos)>0)
    <table class="table table-stripped table-responsive">
      <thead>
        <tr>
          <th> Nombre </th>
          <th>Descripción</th>
          <th> Unidad de medida </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($equipos as $equipo)
          <tr>
            <td>{{ $equipo->nombre_equipo }}</td>
            <td>{{ $equipo->descripcion_equipo }}</td>
            <td>{{ $equipo->unidad_potencia }}</td>
          <tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="alert alert-warning">
      <strong>Oops!</strong> Parece que no hay equipos que mostrar.
      <p>
        Puede agregar un nuevo equipo. <a class="btn btn-info" role="button" href="{{ url('/addequipments') }}">NUEVO</a>
      </p>
    </div>
  @endif

@endsection
