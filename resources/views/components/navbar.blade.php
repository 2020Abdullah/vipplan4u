<nav class="navbar navbar-area navbar-expand-lg nav-transparent">
    <div class="container nav-container nav-white nav-all">
        <div class="responsive-mobile-menu">
            <button class="menu toggle-btn d-block d-lg-none" data-target="#investon_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-left"></span>
                <span class="icon-right"></span>
            </button>
        </div>
        <div class="logo">
            <a href="{{url('/')}}"> <img src="{{ asset("assets/images/logo/logo.png") }}" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="investon_main_menu">
            <ul class="navbar-nav menu-open me-auto">
                    <li>
                        <a href="{{url('/')}}">الرئيسية</a>
                    </li>
                    <li>
                        <a href="single/Menu/2.html">من نحن</a>
                    </li>
                    <li>
                        <a href="single/Menu/3.html">خدماتنا</a>
                    </li>
                    <li>
                        <a href="news.html">أخبارنا</a>
                    </li>
                    <li>
                        <a href="contact.html">اتصل بنا</a>
                    </li>
                    @if (auth('admin')->check())
                        <li class="menu-item">
                            <a href="{{ route('admin.dashboard') }}">حسابي</a>
                        </li>
                    @elseif(auth('web')->check())
                        <li class="menu-item">
                            <a href="{{ route('user.dashboard') }}">حسابي</a>
                        </li>
                    @else 
                        <li class="menu-item-has-children">
                            <a href="#">الحساب<i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('user.register') }}"><i class="fa fa-long-arrow-right"></i>إنشاء حساب جديد</a></li>
                                <li><a href="{{ route('user.login') }}"><i class="fa fa-long-arrow-right"></i>تسجيل الدخول</a></li>
                            </ul>
                        </li>
                    @endif
            </ul>
        </div>
    </div>
</nav>
