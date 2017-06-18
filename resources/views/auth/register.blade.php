@extends('layouts.master')

@section('title', 'Registro de usuario')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 style="text-align:center; color:#3097d1; font-weight:bold;">Registro de Usuarios</h1></div>
                <div class="panel-body">
                    <form  id="departamentos" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre: <span class="asterisk">*</span></label>

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
                            <label for="email" class="col-md-4 control-label">Correo Electrónico: <span class="asterisk">*</span></label>

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
                            <label for="password" class="col-md-4 control-label">Contraseña: <span class="asterisk">*</span></label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña: <span class="asterisk">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        @if (count($instituciones) > 0)
                          <div class="form-group">
                             <label class="col-md-4 control-label">Institucion de Gobierno: <span class="asterisk">*</span></label>
                             <div class="col-md-6 selectContainer">
                                 <select v-model="identificador" class="form-control" name="institucion">
									 <option disabled selected value> -- selecciona una opción -- </option>
                                     
									 @foreach ($instituciones as $institucion )
                                       <option value="{{ $institucion->id }}">
                                          {{ $institucion->nombre_institucion }}
                                       </option>
                                     @endforeach
									 
                                 </select>
                             </div>
                         </div>
                         <div class="form-group">
                           <label class="col-md-4 control-label">Departamento: <span class="asterisk">*</span></label>
                           <div class="col-md-6 selectContainer">
                             <select class="form-control" name="departamento">
							 <option disabled selected value> -- selecciona una opción -- </option>
							 
							 <option v-for="d in departamentos" v-bind:value="d.codigo_departamento"> @{{ d.nombre_departamento}}</option>

                             </select>
                           </div>
                         </div>
                        @else
						  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
							<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡No hay instituciones para agregar al usuario, verifique con el administrador!</p>
						  </div>	
                          <h1></h1>
                        @endif

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
                                <button type="submit" class="btn btn-primary">
                                    ¡Registrarse!
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
