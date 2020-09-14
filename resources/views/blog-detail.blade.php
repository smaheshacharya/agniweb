
@extends('layout.app')

@section('content')

    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{$posts->image}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                    <h2>{{$posts->title}}</h2>
                        <ul>
                        <li>{{$posts->cretated_at}}</li>
                            <li>0 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                @if (count($post_category)>0)
                                @foreach ($post_category as $cat)
                                    <li><a href="#">{{$cat->name}}</a></li>
                                @endforeach

                                @else
                                <li><a href="#">No any category found !</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @if (count($recent)>0)
                                @foreach ($recent as $recent)
                            <a href="{{url('blog-detail/'.$recent->id)}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                    <img src="{{Voyager::image($recent->image)}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$recent->title}}</h6>
                                        <span>{{$recent->creatted_at}}</span>
                                    </div>
                                </a>
                                @endforeach

                                @else
                                <li><a href="#">No any post found !</a></li>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                    <img src="{{$posts->image}}" alt="">

                    <h3>{{$posts->title}}</h3>
                    <p>{!!$posts->body!!}</p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="blog__details__widget">

                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Blog Section End -->

    @endsection('content')
