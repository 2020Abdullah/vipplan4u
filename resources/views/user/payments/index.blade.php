@extends('layouts.home')

@section('styles')
    <link href="{{ asset('assets/styles/css/style.css') }}" rel="stylesheet">
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
    <div class="main-panel">
        <div class="content-wrapper row">
        
@livewire('payment',['cardid'=>$request->card_id]);            
        </div>
        <x-footer-2 />
    </div>
@endsection
