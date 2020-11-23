
<!-- Header Section Begin -->
<header class="header">
<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="header__top__left" data-toggle="tooltip" data-placement="top" title="Gmail">
                    <ul>
                    <li><i class="fa fa-envelope" ></i>{{$detail->email}}</li>
                    <li>{{$detail->extra_info}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header__top__right">
                    <div class="header__top__right__social">
                        <a href="https://{{$detail->facebook_link}}" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" ></i></a>
                        <a href="https://{{$detail->instagram_link}}" target="_blank" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-twitter"></i></a>
                        <a href="https://{{$detail->twitter_link}}" target="_blank" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                        <a href="https://{{$detail->pinintrest_link}}" target="_blank" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a>
                    </div>
                    <div class="header__top__right__language">
                        <img src="img/language.png" alt="">
                        <div>English</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="#">Spanis</a></li>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                        <div class="header__top__right__social" data-toggle="tooltip" data-placement="top" title="Track your order.">
                            <a href="{{url('/track')}}"><i class="fa fa-truck"></i> Track Order</a>

                        </div>


                    <div class="header__top__right__auth" data-toggle="tooltip" data-placement="top" title="Login">
                    <a href="#"><i class="fa fa-user"></i> Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="header__logo">
            <a href="{{url('/')}}"><img src={{ Voyager::image(setting('site.logo')) }} alt=""></a>
            </div>
        </div>
        <div class="col-lg-6">
            <nav class="header__menu">
                <ul>
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                <li class="{{ Request::is('shop') ? 'active' : '' }}"><a href="{{url('/shop')}}">Shop</a></li>
                <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="{{url('/blog')}}">Blog</a></li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{url('/contact')}}">Contact</a></li>
                <li class="{{ Request::is('pay_process') or Request::is('how') or Request::is('terms_condition') ? 'active' : '' }}">
                <a href="#">C Services</a>
                <ul class="header__menu__dropdown">
                    <li><a href="/how">How to Order?</a></li>
                    <li><a href="/pay_process">Payment Process</a></li>
                    <li><a href="/terms_condition">Terms and Conditions</a></li>
                </ul>
            </li>


                </ul>
            </nav>
        </div>
        <div class="col-lg-3">
            <div class="header__cart">
                <ul>
                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-bag cart_count"></i> <span>{{ count((array) session('cart')) }}</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="humberger__open">
        <i class="fa fa-bars"></i>
    </div>
</div>
</header>
<!-- Header Section End -->
