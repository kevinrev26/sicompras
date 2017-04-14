@extends('layouts.master')
@section('title', 'Usuarios')

@section('content')
  @foreach ($users as $user)
    <h1>{{ $user->name }}</h1>
    <h2>{{ $user->email }}</h2>
    <h3>{{ $user->role->nombre_rol }}</h3>
    
    <hr />
  @endforeach

@endsection
