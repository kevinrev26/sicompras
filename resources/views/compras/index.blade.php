@extends('layouts.master')
@section('title','Catalogo de equipos')

@section('content')
  <h1>Compras registradas en el sistema.</h1>
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  <a class="btn btn-success" role="button" href="{{url('/createpurchase') }}" >Agregar una nueva compra</a>



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

  @if (count($compras)>0)
    <table class="table table-stripped table-responsive">
      <thead>
        <tr>
          <th>Fecha de compra </th>
          <th>Proveedor</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($compras as $compra)
          <tr>
            <td>{{ $compra->fecha_compra }}</td>
            <td>{{ $compra->retail->name }}</td>

          <tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="alert alert-warning">
      <strong>Oops!</strong> Parece que no hay compras que mostrar.
      <p>
        Puede agregar una nueva compra. <a class="btn btn-info" role="button" href="{{ url('/createpurchase') }}">NUEVA</a>
      </p>
    </div>
  @endif

@endsection
