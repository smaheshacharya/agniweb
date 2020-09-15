
@extends('layout.app')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{Voyager::image(setting('site.bread_crum'))}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Blog</h2>
                        <div class="breadcrumb__option">
                            <a href="{{Voyager::image(setting('site.bread_crum'))}}">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
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
                            <a href="{{url('blog-detail/'.$recent->slug)}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                    <img src="{{Voyager::image($recent->image)}}" style="height: 70px; width:70px" alt="">
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
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @if (count($posts)>0)
                        @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                <img src="{{Voyager::image($post->image)}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> {{$post->created_at}}</li>
                                        <li><i class="fa fa-comment-o"></i> 0</li>
                                    </ul>
                                    <h5><a href="{{url('blog-detail/'.$post->id)}}">{{$post->title}}</a></h5>

                                <a href="{{url('blog-detail/'.$post->slug)}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @else
                        <li><a href="#">No any posts found !</a></li>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection('content')
