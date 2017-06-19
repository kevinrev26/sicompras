@extends('layouts.master')

@section('title','Agregar una nueva compra')


@section('content')
  <h1>Nueva Compra.</h1>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="form-horizontal" method="POST" action="{{ url('/purchases') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-sm-2" for="fecha">Fecha de compra:</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="22/12/2017" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="orden">Número de Órden de compra</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="orden" name="orden" placeholder="25" required>
      </div>
    </div>
    @if (count($proveedores) > 0)
      <div class="form-group">
         <label class="col-sm-2 control-label">Proveedor</label>
         <div class="col-sm-10 selectContainer">
             <select class="form-control" name="proveedor" required>

                 @foreach ($proveedores as $proveedor )
                   <option value="{{ $proveedor->id }}">
                      {{ $proveedor->name }}
                   </option>
                 @endforeach
             </select>
         </div>
     </div>
     <div class="form-group">
       <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-default">Agregar</button>
       </div>
     </div>
    @else
      <div class="alert alert-danger">
        <h1>No Proveedores en el sistema, no se puede agregar Órden de compra</h1>
      </div>
    @endif



  </form>
@endsection
