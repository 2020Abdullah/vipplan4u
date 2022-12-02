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
         <form action="{{ route('payment_method.update', 'test') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" value="{{ $payment->id }}" name="payment_id">
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for=""> method name</label>
                      <input type="text" class="form-control" name="name" value="{{ $payment->name }}">
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label for=""> method account</label>
                      <input type="text" class="form-control" name="number_account"  value="{{ $payment->number_account }}">
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="">photo</label> 
                       <img class="custom_img" style="width:100px;height:100px;"
                                                src="{{ asset('assets/uploads') . '/' . $payment->photo }}"
                                                alt="image logo">
                      <input type="file" class="form-control" name="photo" >
                  </div>
              </div>
  
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn btn-gradient-success btn-rounded btn-fw" value="حفظ البيانات">
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

