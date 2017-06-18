@extends('layouts.master')
@section('title', 'Empleados con Mantenimientos realizados')
@section('content')

@if (count($bitacora) > 0)
    <table class="table table-stripped table-responsive">
      <thead>
        <tr>
          <th> Id de Mantenimiento </th>
          <th> Fecha del Mantenimiento </th>
          <th> Descripción del Mantenimiento </th>
          <th> Técnico Encargado </th>
          <th> Tipo de Mantenimiento Realizado </th>
          <th> Empleado a Cargo </th>
          <th> Código de Equipo </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bitacora as $o)
          <tr>
            <td> {{ $o->id }}</td>
            <td> {{ $o->fecha_mantenimiento }} </td>
            <td> {{ $o->descripcion_mantenimiento }} </td>
            <td> {{ $o->usuario }} </td>
            <td> {{ $o->tipo_mantenimiento }} </td>
            <td> {{ $o->empleado }} </td>
            <td> {{ $o->equipo }} </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@else
<h1>No hay registros que mostrar</h1>
@endif
@endsection
