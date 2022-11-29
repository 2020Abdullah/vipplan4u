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
              <span></span>إضافة<i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>
      <!-- content -->
      <form action="{{ route('package.update', 'test') }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" value="{{ $card->id }}" name="card_id">
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="">اسم الخطة</label>
                      <input type="text" class="form-control" value="{{ $card->card_name }}" name="card_name">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="">نوع الخطة</label>
                      <input type="text" class="form-control" value="{{ $card->card_type }}" name="card_type">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="">الحد الأدني للخطة</label> 
                      <input type="text" class="form-control" value="{{ $card->card_min }}" name="card_min">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="">الحد الأقصي للخطة</label>
                      <input type="text" class="form-control" value="{{ $card->card_mix }}" name="card_mix">
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="">مدة الباقة</label>
                      <select name="card_expire" class="form-select">
                          <option value="1">يومية</option>
                          <option value="7">اسبوعية</option>
                          <option value="30">شهرى</option>
                          <option value="12">سنوية</option>
                      </select>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="">موعد نزول الربح</label>
                      <select name="card_earn_date" class="form-select">
                          <option value="1">كل ساعة</option>
                          <option value="168">كل اسبوع</option>
                          <option value="720">كل شهر</option>
                          <option value="8760">كل سنة</option>
                      </select>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="">عدد مرات الربح</label>
                      <input type="number" class="form-control" value="{{ $card->card_earn_num }}" name="card_earn_num">
                  </div>
              </div>
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn btn-success btn-rounded btn-fw" value="حفظ البيانات">
          </div>
      </form>
      <!-- End content -->
    </div>
    <!-- content-wrapper ends -->
      <!-- footer -->
          <x-footer-2/>
      <!-- End footer -->
  </div>
  <!-- main-panel ends -->

@endsection

