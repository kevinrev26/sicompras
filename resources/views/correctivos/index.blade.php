@extends('layouts.master')
@section('title', 'Licitaciones')

@section('content')
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  <h1>Contratos correctivos.</h1>
    @if (count($contratos)>0)
      <div class="panel panel-default">
        <div class="panel-heading"> Listado de licitaciones.</div>
        <div class="panel-body">
          <table class="table table-stripped table-responsive" >
            <thead>
              <tr>
                <th> Monto</th>
                <th> Fecha de ejecución</th>
                <th> Finalizado</th>
                <th> Equipo</th>
                <th> Proveedor </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contratos as $contrato)
                <tr>
                  <td> {{ $contrato->monto }} </td>
                  <td> {{ $contrato->fecha_ejecucion }} </td>
                  <td> {{ ($contrato->finalizado) "No" : "Si" }} </td>
                  <td> {{ $contrato->equipment->inv_equipo }} </td>
                  <td> {{ $contrato->retial->name }} </td>
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
