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

  <form class="form-horizontal" method="POST" action="{{ url('/equipments') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Nombre del equipo:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Horno microondas">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="descripcion">Descripción del equipo:</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="descripcion" rows="2"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="unidad">Unidad de Potencia:</label>
      <div class="col-sm-10">
        <select class="form-control" name="unidad">
          <option value="BTU"> BTU </option>
          <option value="WATTS"> WATTS </option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Agregar nuevo equipo.</button>
      </div>
    </div>
  </form>
@endsection
