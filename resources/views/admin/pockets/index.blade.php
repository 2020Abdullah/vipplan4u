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
                            <span></span>payments<i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- content -->
            <div class="row">
                <div class="col-md-12 mb-3">
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                    <th scope="col"># </th>
                                    <th scope="col"> name</th>
                                    <th scope="col"> price</th>
                                    <th scope="col">photo </th>
                                    <th scope="col"> account_id</th>
                                    <th scope="col"> method-id </th>
                                    <th scope="col"> status</th>

                                    <th scope="col">اتخاذ إجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pockets as $pocket)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pocket->name }}</td>
                                        <td>{{ $pocket->price }}</td>

                                        @if ($pocket->photo)
                                            <td><img src="{{ Storage::url($pocket->photo) }}"
                                                    style="width:200px;height:200px;" /></td><br>
                                        @endif


                                        <td>{{ $pocket->account_id }}</td>
                                        <td>{{ $pocket->payment_method->name }}</td>
                                        <td>
                                            @if ($pocket->status == 'active')
                                                <span class="badge badge-success">{{ $pocket->status }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $pocket->status }}</span>
                                            @endif
                                        </td>







                                        <td>
                                            <a href="{{ route('pocket.change_status', $pocket->id) }}"
                                                class="btn btn-success btn-rounded btn-icon">
                                                <i class="mdi mdi-table-edit"></i>
                                            </a>
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-success btn-rounded btn-icon"><i
                                                        class="mdi mdi-delete"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="10">لا توجد باقة مضافة أو مفعلة بعد</td>
                                    </tr>
                                @endforelse ($payments as $payment)
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End content -->
        </div>
        <!-- content-wrapper ends -->
        <!-- footer -->
        <x-footer-2 />
        <!-- End footer -->
    </div>
    <!-- main-panel ends -->
@endsection
