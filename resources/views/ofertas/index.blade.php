@extends('layouts.master')
@section('title', 'Ofertas realizadas')
@section('content')
  @if (count($ofertas)>0)

  @else
    <div class="alert alert-warning">
      No se ha generado ninguna oferta para ésta licitacion.
    </div>
  @endif
@endsection
