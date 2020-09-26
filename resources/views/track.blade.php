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
                                        <input type="text" placeholder="Billing Email" class="checkout__input__add" name="email">
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
                <div class="row">
                <div class="md-stepper-horizontal orange">
                <div class="md-step {{$status[0]->status == "pending" ? 'active' : ''}}">
                      <div class="md-step-circle"><span>1</span></div>
                      <div class="md-step-title">Pending</div>
                      <div class="md-step-bar-left"></div>
                      <div class="md-step-bar-right"></div>
                    </div>
                    <div class="md-step {{$status[0]->status == "processing" ? 'active' : ''}} ">
                      <div class="md-step-circle"><span>2</span></div>
                      <div class="md-step-title">Processing</div>
                      <div class="md-step-bar-left"></div>
                      <div class="md-step-bar-right"></div>
                    </div>
                    <div class="md-step {{$status[0]->status == "on-hold" ? 'active' : ''}}">
                      <div class="md-step-circle"><span>3</span></div>
                      <div class="md-step-title">on-hold</div>
                      <div class="md-step-bar-left"></div>
                      <div class="md-step-bar-right"></div>
                    </div>
                    <div class="md-step {{$status[0]->status == "completed" ? 'active' : ''}}">
                        <div class="md-step-circle"><span>3</span></div>
                        <div class="md-step-title">Completed</div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                      </div>
                      <div class="md-step {{$status[0]->status == "canceled" ? 'active' : ''}}">
                        <div class="md-step-circle"><span>3</span></div>
                        <div class="md-step-title">Canceled</div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                      </div>
                      <div class="md-step {{$status[0]->status == "refunded" ? 'active' : ''}}">
                        <div class="md-step-circle"><span>3</span></div>
                        <div class="md-step-title">Refunded</div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                      </div>

                    </div>
                </div>
                @endif






            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    @endsection('content')
