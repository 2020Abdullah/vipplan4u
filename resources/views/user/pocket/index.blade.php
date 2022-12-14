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
                <div>
                    @if (session()->has('message'))
                        <div class="p-3 bg-red text-green-800 rounded shadow-sm" style="background:red;">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>



                <div class="col-12">
                    <div class="pricing-tab">
                        <div class="content p-5 pe-5 ps-3">
                            <div class="row">
                                <div class="col-xl-8 cols-12">
                                    <!-- Start of the actions -->
                                    <div class="w-100 mx-auto actions d-flex align-items-center mb-4 overflow-hidden ">
                                        <!-- Start of the deposit -->



                                        <!-- Start of the withdraw -->

                                        <div class="action mb-0 p-3 col-md-6" data-bs-toggle="modal"
                                            data-bs-target="#recieveModal">
                                            <a href="{{ route('pocket.create') }}" class="1action">
                                                <i class="mdi mdi-import"></i>
                                                <span class="fs-5 fw-bold">إيداع</span>
                                            </a>
                                        </div>
                                        <div class="action mb-0 p-3 col-md-6" data-bs-toggle="modal"
                                            data-bs-target="#recieveModal">
                                            <a href="https://tftwallet.com/ar/user/withdraw/create" class="1action">
                                                <i class="mdi mdi-export"></i>
                                                <span class="fs-5 fw-bold">سحب</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End of the actions -->

                                    <!-- Start of the transactions row -->
                                    <div class="row">
                                        <div class="transactions">
                                            <div class="transactions">
                                                <div
                                                    class="last-transactions d-flex justify-content-between flex-wrap align-items-center ">
                                                    <span class="fs-4 fw-bold">آخر المعاملات</span>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <!-- Show all link -->
                                                        <a href="#"
                                                            class="text-black text-decoration-none fs-6 ms-3 mb-0">
                                                            عرض
                                                            0
                                                            من
                                                            0
                                                        </a>


                                                    </div>
                                                </div>
                                                <div class="alert alert-light1" role="alert">

                                                    @foreach ($disposed as $item)
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12 alert alert-light" >
                                                                    {{ $item->name }} by {{ $item->payment_method->name }}
                                                                    <br>
                                                                    @php
                                                                        $td = new DateTime($item->created_at);
                                                                        $date = $td->format('Y-m-d');
                                                                        $time = $td->format('H:i');
                                                                        $newDateTime = date('A', strtotime($time));
                                                                        $newDateTimeType = $newDateTime == 'AM' ? 'Am' : 'Pm';
                                                                        
                                                                    @endphp
                                                                    {{ $date }}
                                                                    {{ $time }}
                                                                    {{ $newDateTimeType }}

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of the transactions row -->
                                </div>

                                <div class="col-xl-4 cols-12">
                                    <!-- Start of the funds -->
                                    <div class="wallet mb-3">
                                        <div class="ecard">
                                            <img class="icon" src="https://tftwallet.com/user/images/favicon.png"
                                                alt="">
                                            <div class="details">
                                                <span class="card-title d-block">الرصيد المتاح</span>
                                                <div class="balance">{{ $total_amount }}</div>
                                            </div>
                                            <span class="card-name">{{ auth()->user()->name }}</span>
                                        </div>
                                    </div>
                                    <!-- End of the funds -->

                                    <!-- Start of the balances -->
                                    <div class="balances w-100 mx-auto">
                                        <div class="p-4">
                                            <h6 class="text-white opacity-75">الرصيد الأساسي</h6>
                                            <p class="text-white fs-3 mb-0 mb-2">{{ $total_amount }}</p>

                                            <h6 class="text-white opacity-75">رصيد قيد المعالجة</h6>
                                            <p class="text-white fs-3 mb-0 mb-5">$0.000</p>

                                            <h6 class="text-white opacity-75">رصيد قيد الإستخدام</h6>
                                            <p class="text-white fs-3 mb-0 mb-2">$0.000</p>

                                            <h6 class="text-white opacity-75">رصيد الأرباح</h6>
                                            <p class="text-white fs-3 mb-0">$0.000</p>

                                        </div>
                                    </div>
                                    <!-- End of the balances -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-roi">





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
