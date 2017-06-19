@extends('layouts.master')
@section('title', 'Licitaciones')

@section('content')
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  <!-- <div id="filtros">
    <form class="form-inline" method="GET" action="{{ url('/biddings/search') }}" >
      <div class="form-group">
        <label for="id">Identificador (id): </label>
        <input type="text" class="form-control" id="id" name="id" />

      </div>
      <div class="form-group">
        <label for="titulo">Titulo: </label>
        <input type="text" class="form-control" id="titulo" name="titulo" />
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search">Buscar</span></button>
      </div>

    </form>
  </div> -->

  <h1>Licitaciones.</h1>
  <a href="{{url('/bitacorabiddings/')}}">
    <button class="btn btn-primary">Ver bitácora</button>
  </a>
    @if (count($licitaciones)>0)
      <div class="panel panel-default">
        <div class="panel-heading"> Listado de licitaciones.</div>
        <div class="panel-body">
          <table class="table table-stripped table-responsive" >
            <thead>
              <tr>
                <!-- <th> Institución</th> -->
                <th> Código</th>
                <th> Nombre de la convocatoria</th>
                <th> Objeto de la convocatoria</th>
                <th> Estado </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($licitaciones as $licitacion)
                <tr>
                  
                  <td> {{ $licitacion->id }} </td>
                  <td> {{ $licitacion->nombre_convocatoria }} </td>
                  <td> {{ $licitacion->objeto }} </td>
                  <td> {{ $licitacion->estado }} </td>
                  <td>
                    <a href="{{url('/biddings/'.$licitacion->id)}}">
                      <button class="btn btn-primary">Ver detalles</button>
                    </a>
                  </td>
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
