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

@endsection
