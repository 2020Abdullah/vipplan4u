<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/plugins/css/all.min.css") }}">
    <link href="{{ asset("assets/plugins/css/bootstrap.rtl.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/styles/css/style.css") }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div class="wrapper">
        @yield('header')
        @yield('sidebar')
        @yield('content')
    </div>
    <script src="{{ asset('assets/plugins/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/bootstrap.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
