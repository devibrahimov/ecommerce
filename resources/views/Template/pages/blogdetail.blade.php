@extends('Template.index')

@section('css')
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
    <section class="sidebar-page-container blog-details sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">

                        <div class="upper-block">
                            <div class="text">
                                <h3>{{$blog->name}}</h3>
                                <p>{{$blog->meta_content}}</p>
                            </div>
                            <figure class="image-box"><img src="{{$blog->image}}" alt=""></figure>
                            <div class="text">
                                {!! $blog->content !!}
                                <blockquote>
                                    <div class="icon-box"><i class="icon-left-quote"></i></div>
                                    <h5> {{$blog->meta_keywords}}</h5>
                                </blockquote>
                                  </div>

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
