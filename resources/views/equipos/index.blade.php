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



  <div id="filtros">
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
  </div>

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
