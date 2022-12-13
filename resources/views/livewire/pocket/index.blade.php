<div>
    @extends('layouts.home')

    @section('styles')
        <link href="{{ asset('assets/styles/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('asset-css/custom.css') }}" rel="stylesheet">
    @endsection

    @section('title')
        شراء باقة
    @endsection

    @section('header')
        @include('user.layout.header')
    @endsection

    @section('sidebar')
        @include('user.layout.sidebar')
    @endsection

    @section('content')
        <div>
            @livewire('pocket.pocket')
        </div>
    @endsection
</div>
