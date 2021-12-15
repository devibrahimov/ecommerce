@extends('Template.index')

@section('css')
@endsection


@section('content')



    <!-- Page Title -->
    <section class="page-title" style="background-image: url(/assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{__('content.services')}}</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                    <li>{{__('content.services')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- service-details -->
    <section class="service-details sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="service-sidebar default-sidebar">
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h3>{{__('content.otherServices')}}</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @if(isset($otherservices))
                                        @foreach($otherservices as $s)
                                    <li><a href="{{route('site.serviceDetail',['id'=> $s->service_id,'slug'=>\Illuminate\Support\Str::slug($s->name)])}}">{{$s->name}}<i class="icon-checked"></i></a></li>

                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="support-widget centred">
                            <div class="inner-box" >
                                <div class="content-box">
                                    <div class="icon-box">
                                        <i class="icon-worker"></i>
                                        <div class="icon-bg" style="background-image: url
                                        (/assets/images/icons/icon-bg.png);"></div>
                                    </div>
                                    <h3>{{__('content.servicesTitle')}}</h3>
                                    <p>{{__('content.servicesContent')}}</p>
                                    <a href="tel:{{__('content.tecniqueServiceNumber')}}"><i class="icon-phone-call"></i>{{__('content.tecniqueServiceNumber')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="service-details-content">
                        <div class="content-one">
                            <figure class="image-box"><img src="{{$service->image}}" alt="{{$service->name}} -
                            {{setting()->title}}" style="height: 450px;object-fit: cover; "></figure>
                            <div class="text">
                                <h2>{{$service->name}}</h2>
                                {!! $service->content !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-details end -->



@endsection


@section('js')
@endsection

