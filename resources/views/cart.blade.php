@extends('layout.app')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{Voyager::image(setting('site.bread_crum'))}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                    $finaltotal = 0;
                                    $discounttotal = 0;
                                @endphp
                                    @if (session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    @php
                                        $total += $details['sale_price'] * $details['quantity']
                                    @endphp
                                    <tr>
                                        <td class="shoping__cart__item">
                                        <img src="{{Voyager::image($details['images'])}}" alt="">
                                            <h5>{{$details['name']}}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            Rs. {{$details['sale_price']}}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" class="item_quantity" value="{{$details['quantity']}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            Rs. {{$details['sale_price'] * $details['quantity']}}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_refresh update-cart" data-id="{{ $id }}"></span>
                                            <span class="icon_close remove-from-cart" data-id="{{ $id }}"></span>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @else
                                        <tr>
                                            <td><h6>There is no any product on cart !</h6></td>
                                        </tr>
                                    @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                    <a href="{{url('shop')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

                    </div>
                </div>



                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>Rs. {{ $total }}</span></li>
                            <li>Total <span>Rs. {{ $total }}</span></li>
                        </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shoping Cart Section End -->
    @endsection
