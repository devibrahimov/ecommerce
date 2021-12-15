@extends('Template.index')

@section('css')
    <style>
        .blog-sidebar .support-widget .inner-box .text {
            padding: 128px 50px 60px 30px!important;
        }
        .blog-sidebar .support-widget .inner-box:before {
            background: #000622b5!important;
            opacity: 0.88;
        }
    </style>
@endsection


@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(/assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{__('content.blogs')}}</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                    <li>{{__('content.blogs')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-sidebar-content">
                        @if(isset($blogs))
                            @foreach($blogs as $b)
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{$b->image}}" alt="">
                                    <a href="{{route('site.blogdetail',['id'=>$b->blog_id ,'slug'=>\Illuminate\Support\Str::slug($b->name)])}}" class="link"><i class="icon-zoom-in"></i></a>
                                </figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        @if(isset(getblogcategorycontent($b->category,LaravelLocalization::getCurrentLocale())->name))
                                        <div class="category"><a href="{{route('site.blogcat',['id'=>$b->category ,'slug'=>\Illuminate\Support\Str::slug(getblogcategorycontent($b->category,LaravelLocalization::getCurrentLocale())->name)])}}"><i class="far
                                        fa-folder"></i>
                                             {{getblogcategorycontent($b->category,LaravelLocalization::getCurrentLocale())->name}}
                                            </a></div>
                                        @endif
                                        <div class="upper clearfix">
                                            <div class="admin-box pull-left">
                                                <h6>{{setting()->title}}</h6>
                                                <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $b->created_at)->format('d-m-Y') }}</span>
                                            </div>

                                        </div>



                                        <h3><a href="{{route('site.blogdetail',['id'=>$b->blog_id ,'slug'=>\Illuminate\Support\Str::slug($b->name)])}}">{{$b->name}}</a></h3>
                                        <div class="text">
                                            <p> {!! mb_substr( strip_tags(html_entity_decode($b->content)),0,170 ) !!} ...</p>
                                        </div>
                                        <div class="link"><a href="{{route('site.blogdetail',['id'=>$b->blog_id ,'slug'=>\Illuminate\Support\Str::slug($b->name)])}}">{{__('content.readmore')}}<i
                                                    class="fas
                                        fa-angle-right"></i></a></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endif

                        <div class="pagination-wrapper centred">
                            <ul class="pagination clearfix">
                                {!! $blogs->links()!!}
{{--                                <li><a href="blog-2.html"><i class="fas fa-angle-left"></i></a></li>--}}
{{--                                <li><a href="blog-2.html" class="current">01</a></li>--}}
{{--                                <li><a href="blog-2.html">02</a></li>--}}
{{--                                <li><a href="blog-2.html"><i class="fas fa-angle-right"></i></a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    @include('Template.layouts.blog_rightbar')
                </div>
            </div>
            </div>
    </section>
    <!-- sidebar-page-container end -->


@endsection



@section('js')
@endsection
