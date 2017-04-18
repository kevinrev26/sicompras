@extends('layouts.master')
@section('title','Crear nueva orden de compra')
@section('content')

  @if (!session('oferta'))
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
            <input type="hidden" name="oferta" value="{{ session('oferta') }}" />
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Agregar oferta</button>
                </div>
              </div>
          </form>
        </div>
    </div>
  @endif

@endsection
