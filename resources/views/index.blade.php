@extends('layout.app')

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
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
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
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
                <div class="hero__item set-bg" data-setbg="{{Voyager::image($banner[0]->image)}}">
                        <div class="hero__text">
                            <h2>{{$banner[0]->highlights_txt}}</h2>
                            <p>{{$banner[0]->description}}</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @if (count($category)>0)
                        @foreach ($category as $cat)
                        <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{Voyager::image($cat->image)}}">
                        <h5><a href="#">{{$cat->name}}</a></h5>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="col-lg-3">
                        <div class="categories__item set-bg">
                            <h5><a href="#">Category not Found</a></h5>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            @if (count($fet_product)>0)
            <div class="row featured__filter">
            @foreach ($fet_product as $fet)

                <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{Voyager::image($fet->images)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                        <h6><a href="{{url('/shop-detail'.$fet->id)}}">{{$fet->name}}</a></h6>
                        <h5>{{$fet->sale_price}}</h5>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        @else
        <div class="col-lg-3">
            <div class="categories__item set-bg">
                <h5><a href="#">Product Found</a></h5>
            </div>
        </div>
        @endif

        </div>
    </section>
    <!-- Featured Section End -->

    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @if (count($let_product)>0)
                                    @foreach ($let_product as $let)
                                        <a href="{{url('/shop-detail'.$let->id)}}" class="latest-product__item">
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
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @if (count($top_rated)>0)
                                @foreach ($top_rated as $top)
                                <a href="{{url('/shop-detail'.$top->id)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                    <img src="{{Voyager::image($top->images)}}" alt="{{$top->name}}">
                                    </div>
                                    <div class="latest-product__item__text">
                                    <h6>{{$top->name}}</h6>
                                    <span>{{$top->sale_price}}</span>
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
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">

                            <div class="latest-prdouct__slider__item">
                                @if (count($reviewed)>0)
                                @foreach ($reviewed as $rev)
                                <a href="{{url('/shop-detail'.$rev->id)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                    <img src="{{Voyager::image($rev->images)}}" alt="{{$rev->name}}">
                                    </div>
                                    <div class="latest-product__item__text">
                                    <h6>{{$rev->name}}</h6>
                                    <span>{{$rev->sale_price}}</span>
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
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (count($posts)>0)
                    @foreach ($posts as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                            <img src={{Voyager::image($item->image)}} alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$item->created_at}}</li>
                                    <li><i class="fa fa-comment-o"></i> </li>
                                </ul>
                            <h5><a href={{url("/posts")}}>{{$item->title}}</a></h5>
                            <p>{!!substr($item->body, 0, 100)!!}</p>
                            <p>{!!$item->body!!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                @else
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                      <h3>Blog not found !</h3>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection('content');

