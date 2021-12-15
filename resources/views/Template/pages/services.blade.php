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
                            <h2>{{__('content.services')}}</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                                <li class="active">{{__('content.services')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->


    <!--Categories One Start-->
    <section class="  courses-one courses-one--courses">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">{{__('content.servicesContent')}}</span>
                <h2 class="section-title__title">{{__('content.services')}}</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="categories-one__wrapper">
                        <div class="row">


                            <!--Start Single Categories One-->
                            @if(isset($services))
                                @foreach($services as $service)
                                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms"
                                         data-wow-duration="1500ms">
                                        <a href="{{route('site.serviceDetail',['id'=> $service->service_id,'slug'=>\Illuminate\Support\Str::slug($service->name)])}}" class="categories-one__single">
                                            <div class="categories-one__single-img">
                                                <img src="{{$service->image}}" alt="" />
                                                <div class="categories-one__single-overlay">
                                                    {{--                                                        <div class="categories-one__single-overlay-text1">--}}
                                                    {{--                                                            <p>30 full courses</p>--}}
                                                    {{--                                                        </div>--}}
                                                    <div class="categories-one__single-overlay-text2">
                                                        <h4>{{$service->name}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            @endforeach
                        @endif
                        <!--End Single Categories One-->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--Categories One End-->
@endsection


@section('js')
@endsection
