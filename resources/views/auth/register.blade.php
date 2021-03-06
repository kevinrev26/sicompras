@extends('layouts.master')

@section('title', 'Registro de usuario')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form  id="departamentos" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        @if (count($instituciones) > 0)
                          <div class="form-group">
                             <label class="col-md-4 control-label">Institucion de Gobierno</label>
                             <div class="col-md-6 selectContainer">
                                 <select v-model="identificador" class="form-control" name="institucion">

                                     @foreach ($instituciones as $institucion )
                                       <option value="{{ $institucion->id }}">
                                          {{ $institucion->nombre_institucion }}
                                       </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="form-group">
                           <label class="col-md-4 control-label">Departamento</label>
                           <div class="col-md-6 selectContainer">
                             <select class="form-control" name="departamento">
                               <option v-for="d in departamentos" v-bind:value="d.codigo_departamento"> @{{ d.nombre_departamento }} </option>
                             </select>
                           </div>
                         </div>
                        @else
                          <h1>No hay instituciones para agregar al usuario, verifique con el administrador</h1>
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
  @parent
  <script src=" {{ asset('js/deptos.js') }} " ></script>

@endsection
