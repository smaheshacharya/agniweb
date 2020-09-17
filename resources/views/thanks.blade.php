
@extends('layout.app')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{Voyager::image(setting('site.bread_crum'))}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thank You for your Order download this invoice  !</h2>
                        <div class="breadcrumb__option">
                        <a href="{{url('/shop')}}">Goto Shop</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section class="checkout spad" id="invoice">
        <div class="container">

            <div class="checkout__form">
                <h4>Billing Details</h4>
            <form action="#">
                @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">

                           <h6 ><strong style="color: orange">Note:-</strong> Click button at least two times to generate pdf !</h6>

                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                @php
                                $total = 0;
                                $finaltotal = 0;
                                $discounttotal = 0;
                            @endphp
                            <div class="checkout__order__total">Order ID <span># {{ $data->order_number }}</span></div>
                            <div class="checkout__order__total">Transaction ID <span># {{ $data->transaction_id }}</span></div>

                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @if (session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    @php
                                        $total += $details['sale_price'] * $details['quantity']
                                    @endphp
                                        <li>{{$details['name']}} <span>{{$details['sale_price']}}</span></li>
                                        @endforeach

                                    @endif

                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>Rs. {{ $total }}</span></div>
                                <div class="checkout__order__total">Total <span>Rs. {{ $total }}</span></div>


                                <button type="submit" class="site-btn" onclick="generatePDF()" >Download as pdf</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @endsection('content')
