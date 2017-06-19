@extends('layouts.master')
@section('title', 'Empleados con Mantenimientos realizados')
@section('content')

@if (count($equipments) > 0)
    <table class="table table-stripped table-responsive">
      <thead>
        <tr>
          <th> Código de Inventario </th>
          <th> Nombre del equipo </th>
          <th> Tipo de Mantenimiento </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($equipments as $o)
          <tr>
            <td> {{ $o->inv_equipo }}</td>
            <td> {{ $o->nombre_equipo }} </td>
            <td> {{ $o->tipo_mantenimiento }} </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@else
<h1>No hay registros que mostrar</h1>
@endif
@endsection
