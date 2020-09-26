@extends('layout.app')
@section('title', $product_detail->name)
@section('meta_description', $product_detail->descriptions)
@section('image', Voyager::image($product_detail->image))


@section('content')
    <!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{Voyager::image(setting('site.bread_crum'))}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$product_detail->name}}</h2>
                        <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                            <a href="{{url('/')}}">{{$product_detail->name}}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{Voyager::image($product_detail->images)}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product_detail->name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">Rs. {{$product_detail->sale_price}}</div>
                        <p>{!!$product_detail->description!!}</p>
                        <div class="product__details__quantity">

                        </div>
                    <a href="{{url('add-to-cart/'.$product_detail->id)}}" class="primary-btn">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>{{$product_detail->stock_status}}</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="checkout__input">
                            <div class="col-md-4">
                            <input type="text" name="ship_fullname" id="ship_fullname" placeholder="Your Review">

                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (count($product)>0)


                @foreach ($product as $pro)


                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{Voyager::image($pro->images)}}">
                            <ul class="product__item__pic__hover">
                            <li><a href="{{url('/add-to-cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                        <h6><a href="{{url('shop-detail/'.$pro->slug)}}">{{$pro->name}}</a></h6>
                        <h5>Rs. {{$pro->sale_price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <h3>No any product</h3>
                @endif

            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    @endsection('content')
