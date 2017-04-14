@extends('layouts.master')
@section('title', 'Usuarios')

@section('content')
  @foreach ($users as $user)
    <h1>{{ $user->name }}</h1>
    <h2>{{ $user->email }}</h2>
    <h3>{{ $user->role->nombre_rol }}</h3>
    {{-- @if ($user->role->menus->items)
      @foreach ($item as $user->role->menus->items)
        <p> {{$item->nombre_item}}, <a href="{{ $item->ruta }}"></a>  </p>
      @endforeach
    @endif --}}
    @if (count($user->role->menus) > 0)
      @foreach ($user->role->menus as $menu)
        @foreach ($menu->items as $item)
          <p>Item: {{ $item->nombre_item  }}, Enlace: <a href="{{ $item->ruta }}">{{ $item->ruta }}</a></p>
        @endforeach
      @endforeach
    @else
      <h4>No existe menú asociado.</h4>
    @endif


    <hr />
  @endforeach

@endsection
