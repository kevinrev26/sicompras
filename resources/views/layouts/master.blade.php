
<html>
    <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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

        <div class="container">
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
</html>
