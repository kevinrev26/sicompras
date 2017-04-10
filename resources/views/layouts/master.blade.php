
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
        {{-- @section('sidebar')
            This is the master sidebar.
            The navigation goes here
        @show --}}

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
