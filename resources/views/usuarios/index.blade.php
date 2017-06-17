@extends('layouts.master')
@section('title', 'Usuarios')

@section('content')
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  
  <div style="overflow-x:auto;">
  <table class="table"> <!-- table-stripped table-responsive -->
    <thead>
      <tr style="color:#3097d1;">
        <th style="text-align:center;">Nombre</th>
        <th style="text-align:center;">E-mail</th>
        <th style="text-align:center;">Departamento</th>
        <th style="text-align:center;">Institución</th>
        <th style="text-align:center;">Rol</th>
      </tr>
    </thead>
	
    <tbody>
      @foreach ($users as $user)
	  
        <tr>
          <td> {{ $user->name }} </td>
          <td> {{ $user->email }} </td>
          <td> {{ $user->depto->getNombre() }} </td>
          <td> {{ $user->depto->inst->nombre_institucion }} </td>
          <form action=" {{ url('/users/'. $user->id  ) }}"  method="post">
            {{ csrf_field() }}
            <td>
              <select class="form-control" name="rol">
                <option value="{{ $user->role->id }}">{{ $user->role->nombre_rol }}</option>
                @foreach ($roles as $rol)
                @if ($rol->nombre_rol != 'Proveedor')
                  @if ($rol->id != $user->role->id)
                    <option value="{{ $rol->id }}"> {{ $rol->nombre_rol }} </option>
                  @endif
                @endif
                @endforeach
               </select>
             </td>
            <td> <button type="submit" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span> </button></td>
          </form>
          <td>
            <form id="eliminar" action="{{ url('/users/'.$user->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button id="eliminar" type="submit" class="btn btn-danger" name="remove-users">
                <span class="glyphicon glyphicon-trash"></span>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
	
  </table>
  </div>
@endsection
