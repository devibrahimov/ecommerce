@extends('Template.index')

@section('css')
@endsection

@section('content')


    <!--Page Header Start-->
    <section class="page-header clearfix" style="background-image: url(/assets/images/backgrounds/page-header-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>{{__('content.sss')}}</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                                <li class="active">{{__('content.faq')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->



    <section class="testimonials-one clearfix">
                    <div class="auto-container">
                        <div class="section-title text-center">
                            <span class="section-title__tagline">{{__('content.sss')}}</span>
                            <h2 class="section-title__title">{{__('content.faq')}}</h2>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="testimonials-one__wrapper">
                                    <div class="testimonials-one__pattern"><img
                                            src="/assets/images/pattern/testimonials-one-left-pattern.png" alt="" /></div>
                                    <div class="shape1"><img src="/assets/images/shapes/thm-shape3.png" alt="" /></div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="testimonials-one__carousel owl-carousel owl-theme owl-dot-type1">
                                            @if(isset($faqs))
                                                @foreach($faqs as $faq)
                                                    <!--Start Single Testimonials One -->
                                                        <div class="testimonials-one__single wow fadeInUp" data-wow-delay="0ms"
                                                             data-wow-duration="1500ms">
                                                            <div class="testimonials-one__single-inner">
                                                                <h4 class="testimonials-one__single-title">{{$faq->question}}</h4>
                                                                <p class="testimonials-one__single-text">{{$faq->answer}}</p>

                                                            </div>
                                                        </div>
                                                        <!--End Single Testimonials One -->
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


@endsection

@section('js')
@endsection
