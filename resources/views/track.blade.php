@extends('layout.app')

@section('content')
    <!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{Voyager::image(setting('site.bread_crum'))}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Track Your Order </h2>
                        <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                            <span>Track Order</span>
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
                <h6>Enter your order number and email of billing address...</h6>
            <form action="{{route('track_order')}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Order Number<span>*</span></p>
                                        <input type="text" name="order_number" placeholder="Order Number" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" placeholder="Billing Email(optional)" class="checkout__input__add" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <button type="submit" class="site-btn">Track</button>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </form>
                @if ($status ?? '')
                <h6>Your Oder is in <span style="color: red">{{ $status[0]->status}}</span> state</h6>
                @endif

            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    @endsection('content')
