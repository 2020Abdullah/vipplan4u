@extends('layouts.home')

@section('title')
إحصائيات - لوحة التحكم
@endsection

@section('header')
<x-navbar-2 />
@endsection

@section('content')
<div class="container-fluid page-body-wrapper pt-0">
    <!-- sidebar -->
      <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">إحصائيات</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('package.index') }}">
          <i class="mdi mdi-card" aria-hidden="true"></i>
          <span class="menu-title">الباقات</span>
        </a>
      </li>
    </ul>
  </nav>
    <!-- End sidebar -->
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
                <span></span>إحصائيات <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav>
        </div>
        <div class="row">
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
              <div class="card-body">
                <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">إجمالي المودع
                </h4>
                <h2 class="mb-5">0</h2>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
              <div class="card-body">
                <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">إجمالي المبلغ المستثمر
                </h4>
                <h2 class="mb-5">0</h2>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
              <div class="card-body">
                <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">إجمالي الربح
                </h4>
                <h2 class="mb-5">0</h2>
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
                <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="#" target="_blank">عبد الله محمد</a> تصميم وبرمجة</span>
            </div>
        </footer>
        <!-- End footer -->
    </div>
    <!-- main-panel ends -->
</div>

@endsection
