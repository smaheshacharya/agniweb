
@extends('layout.app')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{Voyager::image(setting('site.bread_crum'))}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>How to Order ?</h2>
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
            <div class="row">
                <div class="col-lg-9 col-md-7">
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
                            <h5>{{$pro->sale_price}}</h5>
                            </div>
                        </div>
                    </div>


                <div class="product__pagination">
                    {{ $product->links() }}
                </div>
                @endforeach
                @else
                    <h3>Product not Found !</h3>
                @endif
            </div>
        </div>
        </div>
    </section>
    @endsection
