
@extends('layout.app')

@section('content')
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    <ul>
                        @if (count($category)>0)
                            @foreach ($category as $cat)
                    <li><a href="">{{$cat->name}}</a></li>
                            @endforeach
                            @else
                            <li><a href="#">Category Not Found</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                    <form action="{{route('search')}}" method="get">
                            <div class="hero__search__categories">
                                All Prducts
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?" name="search">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>{{$detail->phone}}</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{Voyager::image(setting('site.bread_crum'))}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @if (!Session::has('cart') || empty(Session :: get ('cart')))
    <section class="checkout spad">
        <div class="container">

        <h6>Your Cart is empty first add item in cart ! <a style="color: red" href="{{url('/shop')}}">Continuing Shoping</a></h6>
        </div>
    </section>
    @else
        <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>Shipping Details</h4>
            <form action="{{route('order')}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="fullname" id="fullname">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Address<span>*</span></p>
                                        <input type="text" placeholder="Street Address" class="checkout__input__add" name="address" id="address">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>City<span>*</span></p>
                                <input type="text" name="city" id="city">
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" class="checkout__input__add" name="state" id="state">
                            </div>
                            <div class="checkout__input">
                                <p>Post Code<span>*</span></p>
                                <input type="text" name="post_code" id="post_code" onkeypress="return (event.charCode > 47 &&
                                event.charCode < 58)">
                            </div>

                                    <div class="checkout__input">
                                        <p>Country<span>*</span></p>
                                        <input type="text" class="checkout__input__add" name="country" id="country">
                                        <div id="countryList"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" id="phone" onkeypress="return (event.charCode > 47 &&
                                        event.charCode < 58)">
                                     </div>
                                    </div>
                                    </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Shipping is same as billing ?
                                    <input type="checkbox" id="diff-acc" onclick="SetBilling(this.checked);">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <h4>Shipping Address</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="ship_fullname" id="ship_fullname">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Address<span>*</span></p>
                                        <input type="text" placeholder="Street Address" class="checkout__input__add" name="ship_address" id="ship_address">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>City<span>*</span></p>
                                <input type="text" name="ship_city" id="ship_city">
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" class="checkout__input__add" name="ship_state" id="ship_state">
                            </div>
                            <div class="checkout__input">
                                <p>Post Code<span>*</span></p>
                                <input type="text" name="ship_post_code" id="ship_post_code" onkeypress="return (event.charCode > 47 &&
                                event.charCode < 58)">
                            </div>

                                    <div class="checkout__input">
                                        <p>Country<span>*</span></p>
                                        <input type="text" class="checkout__input__add" name="ship_country" id="ship_country">
                                        <div id="countryList"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="ship_phone" id="ship_phone" onkeypress="return (event.charCode > 47 &&
                                        event.charCode < 58)">
                                     </div>
                                    </div>
                                    </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="oder_note">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                @php
                                $total = 0;
                                $finaltotal = 0;
                                $discounttotal = 0;
                            @endphp
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @if (session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    @php
                                        $total += $details['sale_price'] * $details['quantity']
                                    @endphp
                                        <li>{{$details['name']}} <span>Rs. {{$details['sale_price']}}</span></li>
                                        @endforeach

                                    @endif

                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>Rs.{{ $total }}</span></div>
                                <div class="checkout__order__total">Total <span>Rs. {{ $total }}</span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Create Account to make our valuable cutomer and claim more discount !</p>
                                <div class="checkout__input__checkbox">
                                    <input type="radio" id="payment" name="payment" value="cash_on_delivery" >
                                    <label for="cash">Cash on Delivery</label><br>
                                    <input type="radio" name="payment" value="esewa">
                                    <label for="female">Esewa</label><br>
                                    </label>
                                    <div class="tran" id="esewa">
                                        <small>*Send money in 986100 and type transaction id here !</small>
                                        <input type="text" class="checkout__input__add" name="esewa_tran" placeholder="Esewa Transaction id" >

                                    </div>
                                    <div class="tran" id="cash_on_delivery">
                                        <small>*We collect money on delivery.</small>
                                    </div>
                                </div>

                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @endif
    <!-- Checkout Section End -->
    @endsection
