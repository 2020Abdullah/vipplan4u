@extends('layouts.home')

@section('styles')
<link href="{{ asset("assets/styles/css/style.css") }}" rel="stylesheet">
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
    <div class="content-wrapper">
        <div class="col-lg-4 col-md-6">
            <div class="single-pricing-wrap text-center">
                <span class="animate-dots"></span>
                <div class="price">{{ $card->card_Rate }} %</div>
                <div class="thumb">
                    <img src="{{ asset('assets/images/packages/01.png') }}" alt="icon">
                </div>
                <h5>{{$card->card_name}}</h5>
                <ul>
                    <li><a href="#" onclick="event.preventDefault()">الحد الأدني للإيداع {{ $card->card_min }}</a></li>
                    <li><a href="#" onclick="event.preventDefault()">الحد الأقصى للإيداع {{ $card->card_mix }}</a></li>
                    <li><a href="#" onclick="event.preventDefault()">عدد مرات الربح {{ $card->card_earn_num }} مرات</a></li>
                    @if ($card->card_expire == 7)
                        <li><a href="#" onclick="event.preventDefault()">{{ $card->card_earn_num }} مرات</a></li>                                                        
                    @endif
                    <li><a href="#" onclick="event.preventDefault()">نسبة الربح {{($card->card_earn_num * $card->card_expire) / $card->card_Rate * 100 }} $ اسبوعياً</a></li>
                </ul>
            </div>
        </div>
    </div>
    <x-footer-2/>
</div>
@endsection