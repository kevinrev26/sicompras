@extends('layouts.master')
@section('title','Catalogo de equipos')

@section('content')
  <h1>Mis empleados.</h1>
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif


  <form class="form-inline" method="POST" action="{{ url('/employees') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Nombre completo:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="IVAN PEDRO RAMIREZ CORDOVA" required>
      </div>
    </div>
    <input type="hidden" name="id" value="{{ Auth::guard('proveedor')->user()->id }}"
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Agregar</button>
      </div>
    </div>
  </form>


  @if (count($empleados)>0)
    <table class="table table-stripped table-responsive">
      <thead>
        <tr>
          <th>Identificador </th>
          <th>Nombre</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($empleados as $empleado)
          <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->nombre_completo }}</td>
            <td> <form action="{{url('employees/'.$empleado->id)}}" method="post">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></button>
            </form> </td>
          <tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="alert alert-warning">
      <strong>Oops!</strong> Parece que no hay empleados que mostrar.
    </div>
  @endif

@endsection
