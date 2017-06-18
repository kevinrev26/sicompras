@extends('layouts.master')
@section('title','Ordenes de compra')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Opciones Avanzadas del Administrador</div>

            <div class="panel-body">
              <a href="{{ url('/resetPurchaseLimit') }}">Reiniciar Límite de Compras para los Proveedores</a>
              <p>{{ $message }}</p>
              <a href="{{ url('/consultEquipments') }}">Consulta de equipos con mantenimientos</a>
              <p>{{ $message }}</p>
              <a href="{{ url('/consultEmployees') }}">Consulta de Empleados con Mantenimientos</a>
              <p>{{ $message }}</p>
              <a href="{{ url('/consultBinnacle') }}">Consultar la Bitácora de Mantenimientos</a>
            </div>

        </div>
    </div>
</div>
@endsection
