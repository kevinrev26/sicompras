@extends('layouts.master')

@section('content')

<style>
@media only screen and (max-width: 767px)  {
	.letras {
		font-size:9px !important;
	}
}
</style>

<div class="container">
    <div class="row">
		
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 center">
		</div>
		
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 center">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 style="text-align:center; color:#3097d1; font-weight:bold;">Recuperar Contraseña</h4></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
                                <button type="submit" class="btn btn-primary">
                                    <span class="letras">Enviar enlace para recuperar contraseña</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 center">
		</div>
		
    </div>
</div>
@endsection
