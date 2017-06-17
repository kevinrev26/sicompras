@extends('layouts.master')
@section('title', 'Agregar equipo')

@section('content')
  <h1>Agregar un nuevo equipo.</h1>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="form-horizontal" method="POST" action="{{ url('/stockequipments') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-sm-2" for="codigo">Código del equipo:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="01112254ab">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="marca">Marca del equipo:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="marca" name="marca" placeholder="Panasonic">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="modelo">Modelo del equipo:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="AV-115">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="precio">Precio $:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="precio" name="precio" placeholder="250.55">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="catalogo">Catalogo de equipo $:</label>
      <div class="col-sm-10">
        <select class="form-control" name="catalogo">
          @foreach ($catalogos as $catalogo)
              <option value="{{ $catalogo->id }}"> {{$catalogo->nombre_equipo}} </option>
          @endforeach
        </select>
      </div>
    </div>
    <input type="hidden" name="departamento" value="{{ Auth::user()->depto->codigo_departamento }}" />
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Agregar nuevo equipo.</button>
      </div>
    </div>
  </form>
@endsection
