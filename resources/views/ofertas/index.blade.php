@extends('layouts.master')
@section('title', 'Ofertas realizadas')
@section('content')
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  @if (count($ofertas)>0)
    <table class="table table-stripped table-responsive">
      <thead>
        <tr>
          <th> Precio oferta </th>
          <th> Numero licitacion </th>
          <th> Nombre de proveedor </th>
          <th> Equipo </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ofertas as $o)
          <tr>
            <td> {{ $o->precio_oferta }} $</td>
            <td> {{ $o->licitacion }} </td>
            <td> {{ $o->retail->name }} </td>
            <td> <img src="{{ asset($o->foto_equipo) }}" width="500" height="400"  /></td>
            <td>
              <form method="post" action="{{ url('/offers/'.$o->id .'/purchaseorders') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-info" > Seleccionar oferta </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="alert alert-warning">
      No se ha generado ninguna oferta para ésta licitacion.
    </div>
  @endif
@endsection
