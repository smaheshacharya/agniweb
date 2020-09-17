@extends('layout.app')

@section('content')

    <!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{Voyager::image(setting('site.bread_crum'))}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop->search</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>All Category</h4>
                            <ul>
                                @if (count($category)>0)
                                    @foreach ($category as $cat)
                                        <li><a href="#">{{$cat->name}}</a></li>
                                    @endforeach
                                    @else
                                    <li><a href="#">Category Not Found</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">

                                    <div class="latest-prdouct__slider__item">
                                        @if (count($let_product)>0)
                                    @foreach ($let_product as $let)
                                    <a href="{{url('shop-detail/'.$let->slug)}}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                        <img src="{{Voyager::image($let->images)}}" alt="{{$let->name}}">
                                        </div>
                                        <div class="latest-product__item__text">
                                        <h6>{{$let->name}}</h6>
                                        <span>{{$let->sale_price}}</span>
                                        </div>
                                    </a>
                                    @endforeach

                                @else

                                    <h3>No any Product</h3>
                                @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <img src="{{asset('img/breadcrumb.jpg')}}" alt="">
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="product__discount">
                                <div class="section-title product__discount__title">
                                    <h2>Search Product</h2>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if (count($product)>0)
                            @foreach ($product as $pro)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ Voyager::image($pro->images)}}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ url('add-to-cart/'.$pro->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
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
                        <li><h5>Product not Found Goto Home Page !</h5><a href="{{url('/')}}">Home</a></li>
                        @endif
                    </div>
                    {{ $product->links() }}

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->


  @endsection('content')
