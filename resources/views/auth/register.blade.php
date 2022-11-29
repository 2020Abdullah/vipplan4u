@extends('layouts.app')

@section('title')
    إنشاء حساب جديد
@endsection

@section('header')
    <x-navbar/>
@endsection

@section('content')
<!-- page-Register area -->
<div class="check-profit-area pb-5" style="background-image: url('{{ asset('assets/images/banner/bg3.jpg') }}')">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <input type="hidden" name="type" value="{{$type}}">                        
                    <div class="title">
                        @if (Request::is('user/*'))
                            <a class="form formlogin" href="{{ route('user.login') }}"><i class="fa fa-long-arrow-right"></i>تسجيل الدخول</a>
                            <a class="form formReg" href="{{ route('user.register') }}"><i class="fa fa-long-arrow-right"></i>إنشاء حساب جديد</a>
                        @else
                            <a class="form formlogin" href="{{ route('admin.login') }}"><i class="fa fa-long-arrow-right"></i>تسجيل الدخول</a>
                            <a class="form formReg" href="{{ route('admin.register') }}"><i class="fa fa-long-arrow-right"></i>إنشاء حساب جديد</a>
                        @endif
                    </div> 
                    <div class="form-group ">
                        <label>اسمك بالكامل :</label>
                        <input type="text" name="name" class="sign_input form-control" required="" autocomplete="email" autofocus="">
                    </div>
                    <div class="form-group">
                        <label>بريدك الإلكتروني :</label>
                        <input type="text" name="email" class="sign_input form-control" required="" autocomplete="current-password">
                    </div>
                    <div class="form-group">
                        <label>كلمة السر :</label>
                        <input type="password" name="password" class="sign_input form-control" required="" autocomplete="current-password">
                    </div>       
                    <div class="form-group sign_submit">
                        <button type="submit" class="btn btn-success btn-block">إنشاء حساب</button>
                    </div>      
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End page-Register area -->
@endsection

@section('scripts')
<script>
    var currentURL = window.location.pathname;
    if(currentURL.includes('login')){
        $(".formlogin").addClass('active')
    }
    else if (currentURL.includes('register')) {
        $(".formReg").addClass('active')
    }
</script>
@endsection