@extends('layouts.master')
@section('title', 'Licitaciones')

@section('content')
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  <h1>Contratos preventivos.</h1>
    @if (count($contratos)>0)
      <div class="panel panel-default">
        <div class="panel-heading"> Listado de Contratos.</div>
        <div class="panel-body">
          <table class="table table-stripped table-responsive" >
            <thead>
              <tr>
                <th> Monto</th>
                <th> vigencia</th>
                <th> Fecha de inicio</th>
                <th> Fecha Fin</th>


              </tr>
            </thead>
            <tbody>
              @foreach ($contratos as $contrato)
                <tr>
                  <td> {{ $contrato->monto }} </td>
                  <td> {{ $contrato->vigencia }} </td>
                  <td> {{ $contrato->fecha_inicio }} </td>
                  <td> {{ $contrato->fecha_fin }} </td>

                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @else
      <div class="alert alert-warning">
        No hay contratos que mostrar.
      </div>
    @endif


@endsection
