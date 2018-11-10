<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> 
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Graduate" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-info" style="font-family: 'Fredericka the Great', cursive; background: url('/storage/images/bg4.jpg')">
    @include('inc.nav')
    <main class="container">
        @include('inc.alerts')
        @yield('content')
    </main>

    <footer id="footer" class="text-center text-white" style="font-family: 'Nunito', serif">
            <p>Copyright 2018 &copy; PrettyViews</p>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous">
    </script>
</body>
</html>
