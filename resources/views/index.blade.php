@extends('layouts.app')

@section('title')
الرئيسية
@endsection


@section('header')
   <x-navbar/>
@endsection

@section('content')
<!-- banner area section 1 -->
    <div class="banner-area-2" style="background-image: url('{{ asset('assets/images/banner/bg.png') }}') ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="banner-inner text-center text-lg-left">
                        <p class="subtitle">أفضل شركة استثمار في عام 2022</p>
                        <h2>أفضل موقع استثمار في عام 2022</h2>
                        <p>نستثمر أموالك في أسواق الأسهم والأسهم ونعيد رأس مالك وأرباحك بعد فترة قصيرة من الزمن. لدينا خبراء في تداول العملات الرقمية يسعون لك للوصول إلى الحرية المالية معًا</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center banner-thumb-wrap">
                    <div class="banner-thumb item-bounce text-center d-none d-lg-block">
                        <img src="{{ asset("assets/images/banner/invest.png")}}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- why about us -->
<div class="shape-2">
    <!-- why-choose-us-area start -->
    <div class="why-choose-us-area pd-bottom-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 align-self-center">
                    <div class="thumb item-bounce d-none d-lg-block">
                        <img src="{{asset('assets/images/service/service.png')}}" alt="img">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="single-facility d-flex">
                        <span class="number">1</span>
                        <div class="thumb align-self-center">
                            <img src="{{asset('assets/images/service/1.png')}}" alt="icon">
                        </div>
                        <div class="facility-details media-body">
                            <h5>مستقرة  &amp; ومربحة</h5>
                            <p>يعرف أصحاب الأعمال والمديرون ذوو الخبرة أن هناك 3 أشياء ضرورية لضمان نجاح أي عمل على المدى الطويل: النمو والربح والاستقرار</p>
                        </div>
                    </div>
                    <div class="single-facility d-flex">
                        <span class="number">2</span>
                        <div class="thumb align-self-center">
                            <img src="{{asset('assets/images/service/2.png')}}" alt="icon">
                        </div>
                        <div class="facility-details">
                            <h5>سحب فوري</h5>
                            <p>سرعة السحب: تصل إلى 4 ساعات القواعد العامة لإيداع وسحب الأموال. إذا كان الإيداع أو السحب غير خاضع للتنفيذ الفوري</p>
                        </div>
                    </div>
                    <div class="single-facility d-flex">
                        <span class="number">3</span>
                        <div class="thumb align-self-center">
                            <img src="{{asset('assets/images/service/3.png')}}" alt="icon">
                        </div>
                        <div class="facility-details media-body">
                            <h5>نوفر الإحالة</h5>
                            <p>برنامج الإحالة هو عملية منظمة يكافأ العملاء علي التسويق لخدماتنا.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- why-choose-us-area end -->

    <!-- packages-area start -->
    <div class="pricing-area pd-bottom-85">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h5 class="subtitle"><span></span>أفضل باقاتنا</h5>
                        <h3 class="title">احصل على باقتنا الضخمة</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pricing-tab">
                        <nav>
                            <div class="nav nav-tabs text-center" id="nav-tab">
                                <a class="btn ml-0 nav-item nav-link active" id="nav-monthly-tab" data-toggle="tab" href="#nav-roi">الباقات المتوفرة</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-roi">
                                <div class="row justify-content-center">
                                    @foreach ($cards as $card)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-pricing-wrap text-center">
                                                <span class="animate-dots"></span>
                                                <div class="price">{{ $card->card_Rate }} %</div>
                                                <div class="thumb">
                                                    <img src="{{ asset('assets/images/packages/01.png') }}" alt="icon">
                                                </div>
                                                <h5>{{$card->card_name}}</h5>
                                                <ul>
                                                    <li><a href="#" onclick="event.preventDefault()">الحد الأدني للإيداع {{ $card->card_min }}</a></li>
                                                    <li><a href="#" onclick="event.preventDefault()">الحد الأقصى للإيداع {{ $card->card_mix }}</a></li>
                                                    <li><a href="#" onclick="event.preventDefault()">عدد مرات الربح {{ $card->card_earn_num }} مرات</a></li>
                                                    @if ($card->card_expire == 7)
                                                        <li><a href="#" onclick="event.preventDefault()">{{ $card->card_earn_num }} مرات</a></li>                                                        
                                                    @endif
                                                    <li><a href="#" onclick="event.preventDefault()">نسبة الربح {{($card->card_earn_num * $card->card_expire) / $card->card_Rate * 100 }} $ اسبوعياً</a></li>
                                                </ul>
                                                <form method="POST" action="{{ route('payment.index', $card->id) }}" >
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="card_id" value="{{ $card->id }}" >
                                                    <a class="btn btn-plus" href="#"><i class="fa fa-plus"></i></a>
                                                    <input class="btn btn-white" type="submit" value="اشترى الآن">
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-fixed">
                                <div class="row justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- packages-area end -->
</div>
<!-- footer-area end -->

    <footer class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-widget widget widget-about-us">
                            <a href="index.htm" class="footer-logo">
                                <img src="{{ asset("assets/images/logo/logo.png") }}" alt="footer logo">
                            </a>
                            <p></p>
                            <ul class="footer-social social-area-2">
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/osamaahmad_1/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://t.me/T_OsAmA_AhmAd" target="_blank"><i class="fab fa-telegram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="footer-widget widget widget_nav_menu">
                            <h4 class="widget-title">صفحات <span class="dot">.</span></h4>
                            <ul>
                                <li><a href="{{ route('user.register') }}"><i class="fa fa-long-arrow-right"></i>إنشاء حساب جديد</a></li>
                                <li><a href="{{ route('user.login') }}"><i class="fa fa-long-arrow-right"></i>تسجيل الدخول</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="footer-widget widget contact-widget">
                            <h4 class="widget-title">تواصل معنا <span class="dot">.</span></h4>
                            <p></p><p>Turkey, Istanbul</p>
                            <p></p><p>vipplan4u@gmail.com</p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <p class="copyright">جميع الحقوق محفوظة لموقع vipplan4u</p>
                </div>
            </div>
        </div>
    
    </footer>

    <!-- footer-area end -->
@endsection




{{-- @section('scripts')
<script>
window.livewire.on('card_id',()=>{
    let inputField = document.getElementById('card_id');
    let file = inputField.files[0];
    let reader = new FileReader();
    reader.onloadend = ()=>{
window.livewire.emit('fileUploaded34',reader.result)    }
    reader.readAsDataURL(file);
    
})
</script>

@endsection --}}