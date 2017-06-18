@extends('layouts.master')
@section('title', 'Empleados con Mantenimientos realizados')
@section('content')

@if (count($employees) > 0)
    <table class="table table-stripped table-responsive">
      <thead>
        <tr>
          <th> Fecha de Mantenimiento </th>
          <th> Nombre del Empleado </th>
          <th> Descripción del Mantenimiento </th>
          <th> Código de Equipo </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $o)
          <tr>
            <td> {{ $o->fecha_mantenimiento }}</td>
            <td> {{ $o->nombre_completo }} </td>
            <td> {{ $o->descripcion_mantenimiento }} </td>
            <td> {{ $o->inv_equipo }} </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@else
<h1>No hay registros que mostrar</h1>
@endif
@endsection
