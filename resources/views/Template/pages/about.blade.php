@extends('Template.index')

@section('css')
@endsection


@section('content')


    <!-- Page Title -->
    <section class="page-title" style="background-image: url(/assets/images/backgrounds/page-header-bg.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{__('content.about')}}</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                    <li>{{__('content.about')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- about-style-seven -->
    <section class="about-style-seven sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_15">
                        <div class="content-box" style="background: linear-gradient(0deg, rgb(0 0 0 / 60%), rgb(147 79 79 / 46%)), url({{ $about->image}}); background-size: cover;">
                            <div ></div>
                            <div class="sec-title">
                                <div class="top-title">
                                    <div class="shape">
                                        <div class="line line-1"></div>
                                        <div class="line line-2"></div>
                                        <div class="line line-3"></div>
                                        <div class="line line-4"></div>
                                        <div class="bg-shape" style="background-image: url(assets/images/icons/bg-shape-5.png);"></div>
                                    </div>
                                    <p>{{setting()->title}}</p>
                                </div>
                                <h2> {!!  $about->header !!}</h2>
                            </div>
                            <div class="inner-box">
                                <figure class="image-box"><img src="/assets/images/resource/award-1.png" alt=""></figure>
                                <figure class="year-box"><img src="/assets/images/icons/year-2.png" alt=""></figure>
                                <h3>İlin təcrübəsi</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_16">
                        <div class="content-box">
                            {!!  $about->content  !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-style-seven end -->









@endsection


@section('js')
@endsection
