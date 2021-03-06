@extends('Template.index')


@section('css')
@endsection

@section('content')

    <!-- banner-section -->
    <section class="banner-section style-three">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none">

            @if(isset($carousel))
                @foreach($carousel as $c)
                    <div class="slide-item">
                        <div class="image-layer" style="background-image:url({{$c->image}})"></div>
                        <div class="auto-container">
                            <div class="content-box">
                                @if(isset(getcarouselcontent($c->id,LaravelLocalization::getCurrentLocale())->title))
                                <h3>{!! getcarouselcontent($c->id,LaravelLocalization::getCurrentLocale())->title
                                !!}</h3>
                                @endif
                                    @if(isset(getcarouselcontent($c->id,LaravelLocalization::getCurrentLocale())->header))
                                <h2>{!! getcarouselcontent($c->id,LaravelLocalization::getCurrentLocale())->header!!}</h2>
                                    @endif
                                @if(isset(getcarouselcontent($c->id,LaravelLocalization::getCurrentLocale())->content))
                                 <p>{!! getcarouselcontent($c->id,LaravelLocalization::getCurrentLocale())->content !!}</p>
                                @endif

                                    @if(isset(getcarouselcontent($c->id,LaravelLocalization::getCurrentLocale())->url))
                                        @if(getcarouselcontent($c->id,LaravelLocalization::getCurrentLocale())->url != null)
                                            <div class="btn-box"><a href="{{getcarouselcontent($c->id,
                                            LaravelLocalization::getCurrentLocale())->url}}" class="theme-btn">
                                                    {{__('content.goto')}}</a></div>

                                        @endif
                                    @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
        <div class="banner-bottom">
            <div class="auto-container">
                <div class="inner-content">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                            <a href="https://otelkilit.az">
                            <div class="single-item">
                                <div class="inner-box" style="background-image: url(assets/images/resource/column-bg-2.jpg);">
                                        <div class="icon-box"><i class="icon-calculator"></i></div>
                                        <h3>OTELKILIT.AZ</h3>
                                        <h5><a href="https://otelkilit.az">Get your free quote</a></h5>
                                        <div class="link"><a href="{{route('site.services')}}"><i
                                                    class="icon-right-arrow-1"></i></a></div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                            <a href="https://otelkilit.az">
                            <div class="single-item">
                                <div class="inner-box" style="background-image: url(assets/images/resource/column-bg-3.jpg);">
                                    <div class="icon-box"><i class="icon-calendar"></i></div>
                                    <h3>TURNIKE.AZ</h3>
                                    <h5><a href="https://turnike.az">Make an appointment</a></h5>
                                    <div class="link"><a href="{{route('site.products')}}"><i
                                                class="icon-right-arrow-1"></i></a></div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- about-style-three -->
    <section class="about-style-three sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_6">
                        <div class="content-box">
                            <div class="sec-title">
                                <div class="icon-box">
                                    <i class="icon-police"></i>
                                    <div class="shape-box">
                                        <div class="shape shape-1"></div>
                                        <div class="shape shape-2"></div>
                                    </div>
                                </div>
                                <h2>{{$about->header}}</h2>
                            </div>

                            {!!  $about->home_content !!}

                            <div class="link mt-2"><a href="{{route('site.about')}}">{{__('content.readmore')}}<i
                                        class="fas fa-angle-right"></i></a></div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image_block_3">
                        <div class="image-box">
                            <figure class="logo-icon"><img src="/assets/images/icons/logo-icon.png" alt=""></figure>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <figure  class="image wow fadeInUp animated" style="height:555px;background-image:
                                        url('{{$about->image}}');background-position: left center;background-size: cover;
                                        background-repeat: no-repeat;"
                                             data-wow-delay="00ms"
                                            data-wow-duration="1500ms">
{{--                                        <img src="{{$about->image}}" alt="">--}}
                                    </figure>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <figure class="image wow fadeInUp animated" data-wow-delay="300ms"style="height:555px;background-image:
                                        url('{{$about->image}}');background-position: right center;background-size: cover;
                                        background-repeat: no-repeat;" data-wow-duration="1500ms">
{{--                                        <img src="{{$about->image}}" alt="">--}}
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-style-three end -->

    <!-- service-style-three -->
    <section class="service-style-three sec-pad">
        <div class="bg-layer" style="background-image: url(assets/images/background/service-bg-2.jpg);"></div>
        <div class="auto-container">
            <div class="sec-title centred light">
                <div class="icon-box">
                    <i class="icon-police"></i>
                    <div class="shape-box">
                        <div class="shape shape-1"></div>
                        <div class="shape shape-2"></div>
                        <div class="shape shape-3"></div>
                        <div class="shape shape-4"></div>
                    </div>
                </div>
                <h2>{{__('content.services')}}</h2>
                <p class="text-light">{{__('content.servicesContent')}}</p>
            </div>
            <div class="row clearfix">

                @if(isset($services))
                    @foreach($services as $service)
                <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                    <div class="service-block-three wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">

                            <div class="image-box"  height="220px">
                                <figure class="image"><img src="{{$service->image}}" style="height: 330px;object-fit: cover;"
                                                           alt="{{$service->name}} -{{setting()->title}}"></figure>

                                <div class="icon-box"> <img src="{{$service->icon}}" style="height: 50px;object-fit:
                                contain;"
                                                            alt="icon -{{$service->name}} -{{setting()->title}}"> </div>
                                <div class="link"><a href="{{route('site.serviceDetail',['id'=> $service->service_id,'slug'=>\Illuminate\Support\Str::slug($service->name)])}}"><i class="icon-right-arrow"></i></a></div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="{{route('site.serviceDetail',['id'=> $service->service_id,'slug'=>\Illuminate\Support\Str::slug($service->name)])}}">{{$service->name}}</a></h4>
                                <p>{{ html_entity_decode(substr( strip_tags($service->content) ,0,80)) }} ...</p>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- service-style-three -->


    <!-- funfact-section -->
    <section class="funfact-section">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-7.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                    <div class="sec-title">
                        <div class="icon-box">
                            <i class="icon-police"></i>
                            <div class="shape-box">
                                <div class="shape shape-1"></div>
                                <div class="shape shape-2"></div>
                            </div>
                        </div>
                        <h2>{{__('content.Interesting & amazing facts about company')}}</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 counter-column">
                    <div class="counter-content centred">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                                <div class="counter-block-one wow slideInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="icon-diamond"></i></div>
                                        <div class="count-outer count-box">
                                            <span>0</span><span class="count-text" data-speed="1500"
                                                                data-stop="14">0</span><span class="symble">+</span>
                                        </div>
                                        <h5>{{__('content.Years of experience')}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                                <div class="counter-block-one wow slideInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="icon-diamond"></i></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="1500" data-stop="27">0</span>
                                        </div>
                                        <h5>{{__('content.Team members')}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                                <div class="counter-block-one wow slideInUp animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="icon-diamond"></i></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="1500" data-stop="42">0</span><span class="symble">+</span>
                                        </div>
                                        <h5>{{__('content.Finished Project')}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                                <div class="counter-block-one wow slideInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="icon-diamond"></i></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="1500" data-stop="159">0</span><span class="symble">+</span>
                                        </div>
                                        <h5>{{__('content.satisfied customer')}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- funfact-section end -->



    <!-- clients-section -->
    <section class="clients-section bg-color-2">
        <div class="auto-container">
            <div class="clients-carousel owl-carousel owl-theme owl-nav-none owl-dots-none">
                <figure class="clients-logo-box"><a href="index.html"><img src="/assets/images/clients/clients-logo-1.png" alt=""></a></figure>
                <figure class="clients-logo-box"><a href="index.html"><img src="/assets/images/clients/clients-logo-1.png" alt=""></a></figure>
                <figure class="clients-logo-box"><a href="index.html"><img src="/assets/images/clients/clients-logo-1.png" alt=""></a></figure>
                <figure class="clients-logo-box"><a href="index.html"><img src="/assets/images/clients/clients-logo-4.png" alt=""></a></figure>
                <figure class="clients-logo-box"><a href="index.html"><img src="/assets/images/clients/clients-logo-1.png" alt=""></a></figure>
            </div>
        </div>
    </section>
    <!-- clients-section end -->

@endsection

@section('js')
@endsection


