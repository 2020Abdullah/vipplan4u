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
                                    <th scope="col"> total_deposited_amounttt</th>
                                    <th scope="col"> status</th>
                                    <th scope="col">payment_method_id </th>
                                    <th scope="col"> account_id</th>
                                    <th scope="col"> package_id </th>
                                    <th scope="col"> photo</th>

                                    <th scope="col">اتخاذ إجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pockets as $pocket)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pocket->total_deposited_amount }}</td>



                                        <td>
                                            @if ($pocket->status == 'active')
                                                <span class="badge badge-success">{{ $pocket->status }}</span>
                                         
                                            @else
                                                <span class="badge badge-danger">{{ $pocket->status }}</span>
                                            @endif
                                        </td>



                                        <td>{{ $pocket->payment_method->name }}</td>
                                        {{-- <td>{{ \App\Models\paymentMethod::where('id', $payment->payment_method_id)->value('name') }} --}}
                                            {{-- <td>{{ \App\Models\Account::where('id', $payment->account_id)->value('user_id') }} --}}

                                        <td>{{ $pocket->account_id }}</td>
                                        {{-- <td>{{ $pocket->package->card_name }}</td> --}}

                                        {{-- <td>{{ \App\Models\package::where('id', $payment->package_id)->value('card_name') }} --}}
           {{-- <td><img src="{{ $payment->Proof_img->temporaryUrl()}}"></td>  --}}

                                            @if ($pocket->Proof_img)
                                        <td><img src="{{ Storage::url($pocket->Proof_img) }}"
                                                style="width:200px;height:200px;" /></td><br>
                                @endif

                                <td>
                                    <a href="{{ route('pocket.change_status', $pocket->id) }}" class="btn btn-success btn-rounded btn-icon">
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
