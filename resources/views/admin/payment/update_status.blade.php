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
            <form action="{{ route('paymentAdmin.update_status',['id' =>$paymentAdmins->id])   }}" method="POST" enctype="multipart/form-data">
                @csrf
                                      {{-- {{ csrf_field() }} --}}

                <input type="hidden" value="{{ $paymentAdmins->id }}" name="payment_id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""> total_deposited_amount name</label>
                            <input type="text" class="form-control" name="total_deposited_amount"
                                value="{{ $paymentAdmins->total_deposited_amount }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""> payment_method_id</label>
                            <input type="text" class="form-control" name="payment_method_id"
                                value="{{ $paymentAdmins->payment_method_id }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""> package_id</label>
                            <input type="text" class="form-control" name="package_id" value="{{ $paymentAdmins->package_id }}" readonly>
                        </div>
                    </div>
                


                    <div class="col">
                        <label for="inputName" class="control-label"> status </label>
                        <select name="status" id="status" class="form-control">
                            <!--placeholder-->
                            <option selected="true" disabled="disabled">choose </option>
                            <option value="active">active</option>
                            <option value="inactive"> inactive</option>
                        </select>

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
        <x-footer-2 />
        <!-- End footer -->
    </div>
    <!-- main-panel ends -->
@endsection
