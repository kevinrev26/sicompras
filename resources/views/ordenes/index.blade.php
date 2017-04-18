@extends('layouts.master')
@section('title','Ordenes de compra')
@section('content')
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

@endsection
