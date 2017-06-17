@extends('layouts.master')
@section('title','Ordenes de compra')
@section('content')
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  <div id="filtros">
    <form class="form-inline" method="GET" action="{{ url('/purchaseorders/search') }}" >
      <div class="form-group">
        <label for="fecha">Fecha: </label>
        <input type="text" class="form-control" id="fecha" name="fecha" />

      </div>
      <div class="form-group">
        <label for="id">Identificador (id): </label>
        <input type="text" class="form-control" id="id" name="id" />
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search">Buscar</span></button>
      </div>

    </form>
  </div>
  @if (count($ordenes)>0)
    <div class="panel panel-default">
      <div class="panel-heading"> Listado de licitaciones.</div>
      <div class="panel-body">
        <table class="table table-stripped table-responsive" >
          <thead>
            <tr>
              <th> Institución</th>
              <th> Aprobado por UACI</th>
              <th> Aprobado por el técnico</th>
              <th> Aprobado por el Jefe de institución</th>
              <th> Fecha de entrega</th>
              <th> Número </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ordenes as $orden)
              <tr>
                <td> {{ $orden->user->depto->inst->nombre_institucion }} </td>
                <td> {{ ($orden->uaci ? '<span>Aprobado</span>' : '<span>No Aprobado</span>') }} </td>
                <td> {{ ($orden->tecnico ? '<span>Aprobado</span>' : '<span>No Aprobado</span>') }} </td>
                <td> {{ ($orden->jefe ? '<span>Aprobado</span>' : '<span>No Aprobado</span>') }} </td>
                <td> {{ $orden->fecha_entrega }} </td>
                <td> {{ $orden->id }} </td>
                {{-- <td>
                  <a href="{{url('/biddings/'.$licitacion->id)}}">
                    <button class="btn btn-primary">Ver detalles</button>
                  </a>
                </td> --}}
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @else
    <div class="alert alert-warning">
      No hay licitaciones que mostrar.
    </div>
  @endif

@endsection
