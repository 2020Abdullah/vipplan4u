@extends('layouts.home')

@section('title')
طرق الدفع - لوحة التحكم
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
              <a href="{{route('payment_method.create')}}" class="btn btn-gradient-success btn-rounded btn-fw">إضافة وسيلة دفع جديدة</a>
          </div>
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-bordered bg-white">
                  <thead>
                    <tr>
                      <th scope="col"># </th>
                      <th scope="col"> name</th>
                      <th scope="col"> number_account</th>
                      <th scope="col">photo  </th>
           
                      <th scope="col">اتخاذ إجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($payment_methods as $payment_method)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment_method->name }}</td>
                        <td>{{ $payment_method->number_account }}</td>
                        <td><img src="{{ asset('assets/uploads') . '/' . $payment_method->photo }}"/>  </td>
                    
                        <td>
                          <a href="{{route('payment_method.edit', $payment_method->id)}}" class="btn btn-success btn-rounded btn-icon">
                            <i class="mdi mdi-table-edit"></i>
                          </a>
                          <form action="{{ route('payment_method.destroy', $payment_method->id) }}" method="POST">
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
                    @endforelse ($payment_methods as $payment_method)
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

