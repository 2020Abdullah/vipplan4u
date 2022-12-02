<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/css/all.min.css") }}">
    <link href="{{ asset("assets/plugins/css/bootstrap.rtl.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/vendors/css/vendor.bundle.base.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/vendors/mdi/css/materialdesignicons.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/css/style.css") }}" rel="stylesheet">

            <link href="{{ asset("asset-css/wizard.css") }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
    @yield('header')
    <div class="container-fluid page-body-wrapper pt-0">
        @yield('sidebar')
        @yield('content')
    </div>
    <script src="{{ asset('assets/plugins/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/misc.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dashboard.js') }}"></script>
    @yield('scripts')
</body>
</html>
