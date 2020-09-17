@extends('layout.app')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{Voyager::image(setting('site.bread_crum'))}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>Billing Details</h4>
            <form action="{{route('order')}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="fullname">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Address<span>*</span></p>
                                        <input type="text" placeholder="Street Address" class="checkout__input__add" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>City<span>*</span></p>
                                <input type="text" name="city">
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" class="checkout__input__add" name="state">
                            </div>
                            <div class="checkout__input">
                                <p>Post Code<span>*</span></p>
                                <input type="text" name="post_code">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Country<span>*</span></p>
                                        <input type="text" name="country">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
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
                                    <input type="radio" id="payment" name="payment" value="cash_on_delivery">
                                    <label for="cash">Cash on Delivery</label><br>
                                    <input type="radio" id="payment" name="payment" value="esewa">
                                    <label for="female">Esewa</label><br>
                                    </label>
                                </div>

                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    @endsection
