
<!-- Header Section Begin -->
<header class="header">
<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="header__top__left">
                    <ul>
                    <li><i class="fa fa-envelope"></i>{{$detail->email}}</li>
                    <li>{{$detail->extra_info}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header__top__right">
                    <div class="header__top__right__social">
                        <a href="{{$detail->facebook_link}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="{{$detail->instagram_link}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="{{$detail->twitter_link}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="{{$detail->pinintrest_link}}" target="_blank"><i class="fa fa-pinterest-p"></i></a>
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
                        <div class="header__top__right__social">
                            <a href="{{url('/track')}}"><i class="fa fa-truck"></i> Track Order</a>

                        </div>

                    <div class="header__top__right__auth">
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
                <a href="./index.html"><img src={{ Voyager::image(setting('site.logo')) }} alt=""></a>
            </div>
        </div>
        <div class="col-lg-6">
            <nav class="header__menu">
                <ul>
                <li class="active"><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/shop')}}">Shop</a></li>
                <li><a href="{{url('/blog')}}">Blog</a></li>
                <li><a href="{{url('/contact')}}">Contact</a></li>
                <li>
                <a href="#">C Services</a>
                <ul class="header__menu__dropdown">
                    <li><a href="/">How to Order?</a></li>
                    <li><a href="/">Payment Process</a></li>
                    <li><a href="/">Terms and Conditions</a></li>
                </ul>
            </li>


                </ul>
            </nav>
        </div>
        <div class="col-lg-3">
            <div class="header__cart">
                <ul>
                    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{ count((array) session('cart')) }}</span></a></li>
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
