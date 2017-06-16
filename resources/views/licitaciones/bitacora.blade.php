@extends('layouts.master')
@section('title', 'Licitaciones')

@section('content')
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  <h1>Bitacora</h1>
  @if (count($bitacoras_licitaciones)>0)
    <div class="panel panel-default">
      <div class="panel-heading"> Bitacora de licitaciones</div>
      <div class="panel-body">
        <table class="table table-stripped table-responsive" >
          <thead>
            <tr>
              <th> Código</th>
              <th> Fecha</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bitacoras_licitaciones as $bitacoras_licitacion)
              <tr>
                <td> {{ $bitacoras_licitacion->licitacion }} </td>
                <td> {{ $bitacoras_licitacion->fecha_creacion }} </td>
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
