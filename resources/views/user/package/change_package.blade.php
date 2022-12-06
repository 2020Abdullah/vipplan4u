@extends('layouts.home')

@section('title')
    إحصائيات - لوحة التحكم
@endsection
    @section('styles')
        <link href="{{ asset('assets/styles/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('asset-css/custom.css') }}" rel="stylesheet">
    @endsection
@section('header')
    @include('user.layout.header')
@endsection

@section('sidebar')
    @include('user.layout.sidebar')
@endsection

@section('content')
    <!-- main-panel -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> لوحة التحكم
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>إحصائيات <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>


            <div class="row">
           
                <div class="col-12">
                    <div class="pricing-tab">
                        <nav>
                            <div class="nav nav-tabs text-center" id="nav-tab">
                                <a class="btn ml-0 nav-item nav-link active" id="nav-monthly-tab" data-toggle="tab"
                                    href="#nav-roi">الباقات المتوفرة</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-roi">
                                <div class="row justify-content-center">
                                    @foreach ($package as $card)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-pricing-wrap text-center">
                                                <span class="animate-dots"></span>
                                                <div class="price">{{ $card->card_Rate }} %</div>
                                                <div class="thumb">
                                                    <img src="{{ asset('assets/images/packages/01.png') }}" alt="icon">
                                                </div>
                                                <h5>{{ $card->card_name }}</h5>
                                                <ul>
                                                    <li><a href="#" onclick="event.preventDefault()">الحد الأدني
                                                            للإيداع {{ $card->card_min }}</a></li>
                                                    <li><a href="#" onclick="event.preventDefault()">الحد الأقصى
                                                            للإيداع {{ $card->card_mix }}</a></li>
                                                    <li><a href="#" onclick="event.preventDefault()">عدد مرات الربح
                                                            {{ $card->card_earn_num }} مرات</a></li>
                                                    @if ($card->card_expire == 7)
                                                        <li><a href="#"
                                                                onclick="event.preventDefault()">{{ $card->card_earn_num }}
                                                                مرات</a></li>
                                                    @endif
                                                    <li><a href="#" onclick="event.preventDefault()">نسبة الربح
                                                            {{ (($card->card_earn_num * $card->card_expire) / $card->card_Rate) * 100 }}
                                                            $ اسبوعياً</a></li>
                                                </ul>
                                                <form method="POST" action="{{ route('payment.index', $card->id) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="card_id" value="{{ $card->id }}">
                                                    <a class="btn btn-plus" href="#"><i class="fa fa-plus"></i></a>
                                                    <input class="btn btn-white" type="submit" value="اشترى الآن">
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-fixed">
                                <div class="row justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>


        </div>
        <!-- content-wrapper ends -->
        <!-- footer -->
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
                <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © المهندس</span>
                <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="#" target="_blank">عبد الله
                        محمد</a> تصميم وبرمجة</span>
            </div>
        </footer>
        <!-- End footer -->
    </div>
    <!-- main-panel ends -->
@endsection
