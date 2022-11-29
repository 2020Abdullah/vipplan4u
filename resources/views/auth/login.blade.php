@extends('layouts.app')

@section('title')
    تسجيل الدخول
@endsection

@section('header')
    <x-navbar/>
@endsection

@section('content')
    <div class="check-profit-area pb-5" style="background-image: url('{{ asset('assets/images/banner/bg3.jpg') }}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form method="POST" action="{{route('login')}}">
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
                            <label>البريد الإلكتروني :</label>
                            <input type="email" name="email" class="sign_input form-control" required="" autocomplete="email" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>كلمة السر :</label>
                            <input type="password" name="password" class="sign_input form-control" required="" autocomplete="current-password">
                        </div>

                        <div class="form-group sign_submit">
                            <button type="submit" class="btn btn-success btn-block">تسجيل الدخول</button>
                        </div>

                        <div class="form_other">
                            <div class="mt-2">
                                <a href="showEmailForm.html">هل نسيت كلمة السر ؟</a>
                            </div>
                            <div class="mt-2">
                                <a href="register.html">هل ليس لديك حساب ؟</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
