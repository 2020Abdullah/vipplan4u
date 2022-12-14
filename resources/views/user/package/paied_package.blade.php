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
                        <nav>
                            <div class="nav nav-tabs text-center" id="nav-tab">
                                <a class="btn ml-0 nav-item nav-link active" id="nav-monthly-tab" data-toggle="tab"
                                    href="#nav-roi">الباقات المتوفرة</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-roi">
                                <!-- content -->
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <a href="{{ url('/change_package') }}"
                                            class="btn btn-gradient-success btn-rounded btn-fw">pay باقة جديدة</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered bg-white">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">رقم الباقة</th>
                                                        <th scope="col">اسم الباقة</th>
                                                        <th scope="col">نوع الباقة</th>
                                                        <th scope="col">الحد الأدني للإيداع</th>
                                                        <th scope="col">الحد الأقصي للإيداع</th>
                                                        <th scope="col">نسبة الربح</th>
                                                        <th scope="col">مدة انتهاء الباقة</th>
                                                        <th scope="col">موعد نزول الربح </th>
                                                        <th scope="col">عدد مرات الربح</th>
                                                        {{-- <th scope="col">اتخاذ إجراء</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($paied_package2 as $card)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $card->package->card_name }}</td>
                                                            <td>{{ $card->package->card_type }}</td>
                                                            <td>{{ $card->package->card_min }}</td>

                                                            <td>{{ $card->package->card_mix }}</td>
                                                      
                                                            <td> {{ (($card->package->card_earn_num * $card->package->card_expire) / $card->package->card_Rate) * 100 }}
                                                            </td>
                                                            <td>{{ $card->package->card_expire }}</td>

                                                            <td>{{ $card->package->card_earn_date }}</td>

                                                            <td>{{ $card->package->card_earn_num }}</td>
                                                            {{-- <td>delete</td> --}}

                                                        </tr>
                                                    @empty
                                                        <tr class="text-center">
                                                            <td colspan="10">لا توجد باقة payment أو  </td>
                                                        </tr>
                                                    @endforelse ($cards as $card)
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
