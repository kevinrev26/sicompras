@extends('layouts.master')
@section('title','Crear nueva orden de compra')
@section('content')

  @if (!$oferta)
    <div class="alert alert-warning">
      Parece que no se ha modificado ninguna oferta.
    </div>

  @else
    <div class="panel panel-default">
        <div class="panel-heading">
          Agregar una nueva orden de compra. Fecha: {{ date('l F o') }}
        </div>
        <div class="panel-body">
          <form class="form-horizontal" method="post" action="{{ url('/purchaseorders') }}">
            {{ csrf_field() }}
            <input type="hidden" name="usuario" value="{{ Auth::user()->id }}"/>
            <input type="hidden" name="oferta" value="{{ $oferta->id }}" />
            <div class="form-group">
              <label class="control-label col-sm-2" for="proveedor">Proveedor: </label>
              <span> {{$oferta->retail->name}} </span>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Fecha de entrega: </label>
              <input name="fecha-entrega" type="date" placeholder="dd/MM/YYYY" required />
            </div>
            <div class="form-group">
              <ul>
                @foreach ($oferta->bidding->solicitud->equipos as $equipo)
                  <li>
                    {{$equipo->nombre_equipo}}
                  </li>
                @endforeach
              </ul>
            </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Agregar Orden de compra</button>
                </div>
              </div>
          </form>
        </div>
    </div>
  @endif

@endsection
