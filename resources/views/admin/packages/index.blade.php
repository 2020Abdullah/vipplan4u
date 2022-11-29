@extends('layouts.home')

@section('title')
الباقات - لوحة التحكم
@endsection

@section('header')
  @include('admin.layout.header')
@endsection

@section('sidebar')
  @include('admin.layout.sidebar')
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
              <span></span>الباقات<i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>
      <!-- content -->
      <div class="row">
          <div class="col-md-12 mb-3">
              <a href="{{route('package.create')}}" class="btn btn-gradient-success btn-rounded btn-fw">إضافة باقة جديدة</a>
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
                      <th scope="col">اتخاذ إجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($cards as $card)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $card->card_name }}</td>
                        <td>{{ $card->card_type }}</td>
                        <td>{{ $card->card_min }} $ </td>
                        <td>{{ $card->card_mix }} $</td>
                        <td>{{ $card->card_Rate }} %</td>
                        <td>
                          @if ($card->card_expire == 1)
                              بعد 1 يوم
                          @elseif($card->card_expire == 7)
                              اسبوع
                          @elseif($card->card_expire == 30)
                              شهر
                          @elseif($card->card_expire == 12)
                              سنة
                          @endif
                        </td>
                        <td>
                            @if ($card->card_earn_date == 1)
                                كل 24 ساعة
                            @elseif($card->card_earn_date == 168)
                                كل اسبوع
                            @elseif($card->card_earn_date == 720)
                                كل شهر
                            @endif
                        </td>
                        <td>{{ $card->card_earn_num }}</td>
                        <td>
                          <a href="{{route('package.edit', $card->id)}}" class="btn btn-success btn-rounded btn-icon">
                            <i class="mdi mdi-table-edit"></i>
                          </a>
                          <form action="{{ route('package.destroy', $card->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-success btn-rounded btn-icon"><i class="mdi mdi-delete"></i></button>
                          </form>
                        </td>
                      </tr>
                    @empty
                        <tr class="text-center">
                          <td colspan="10">لا توجد باقة مضافة أو مفعلة بعد</td>
                        </tr>
                    @endforelse ($cards as $card)
                  </tbody>
              </table>
            </div>
          </div>
      </div>
      <!-- End content -->
    </div>
    <!-- content-wrapper ends -->
      <!-- footer -->
      <x-footer-2/>
      <!-- End footer -->
  </div>
  <!-- main-panel ends -->
@endsection

