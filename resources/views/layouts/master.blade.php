<html>
    <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	  <link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
      <!-- Scripts -->
      <script>
          window.Laravel = {!! json_encode([
              'csrfToken' => csrf_token(),
          ]) !!};
      </script>
      <title>SICOMPRAS - @yield('title')</title>
    </head>
    <body>
        @include('partials.navbar')  
		<img src="{{ asset('images/backg2.jpg') }}" alt="" width="100%" height="auto" style="margin-top: -22px;"/>
		<br/>
		<br/>
        <div class="container"> <!-- style="height:450px;" -->
            @yield('content')
        </div>

        @section('scripts')
          {{-- JQUERY --}}
          <script src=" {{ asset('js/app.js') }}" ></script>
          {{-- Bootstrap --}}
          {{-- <script src=" {{ asset('js/bootstrap.min.js') }}" ></script> --}}
          {{-- VUEJS --}}
          <script src=" {{ asset('js/vue.js') }} "></script>
          {{-- VUE resource --}}
          <script src=" {{ asset('js/vue-resource.min.js') }} "></script>
        @show
    </body>
	
	<footer style="background-color: #fff;">
		<div class="container">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
					<p>
						<a href="#" title="Ver"><strong>Términos y condiciones de uso</strong></a> |
						<a href="#" title="Ver"><strong>Politícas de privacidad</strong></a>
						<br>
						<strong>© 2017. Derechos reservados.</strong>
					</p>
				</div>
				<div id="bottom" class="col-xs-12 col-sm-4 col-md-4 col-lg-6" style="float: right;">
					<p>
					<a style="float: right;" href="#" title="Ir a">Powered by <strong>BAD-115 Group#2</strong></a>
					</p>
				</div>
		</div>
	</footer>
	
</html>
