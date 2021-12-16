@extends('Template.index')

@section('css')
    <style>
        .contact-page-section .sidebar-content:before {
            background: #09112582;
            opacity: 0.9;
        }
    </style>
@endsection


@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(/assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{__('content.contact')}}</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                    <li>{{__('content.contact')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- contact-page-section -->
    <section class="contact-page-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <div class="top-title">
                    <div class="shape">
                        <div class="line line-1"></div>
                        <div class="line line-2"></div>
                        <div class="line line-3"></div>
                        <div class="line line-4"></div>
                        <div class="bg-shape" style="background-image: url(/assets/images/icons/bg-shape.png);"></div>
                    </div>
                    <p>{{__('content.Contact Information')}}</p>
                </div>
                <h2>{{__('content.contactInformContent')}}</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <form method="post" action="{{route('sendmessage')}}" id="contact-form" class="default-form">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="name"  maxlength="20" required placeholder="{{__('content.First Name')}} *">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text"  name="surname" maxlength="20"  required  placeholder="{{__('content.Last Name')}} *">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email"  name="email" maxlength="50"  required placeholder="{{__('content.Email')}} *">
                                </div>
                                @csrf
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text"   name="number" required maxlength="13"  placeholder="{{__('content.Phone Number')}} *">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" maxlength="500" required cols="30" rows="5"placeholder="{{__('content.Message')}} *"></textarea>

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                    <button class="theme-btn style-one" type="submit" name="submit-form">{{__('content.Send')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-column">
                    <div class="sidebar-content" style="background-image: url(/assets/images/resource/widget-2.jpg);height: 450px;">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-page-section end -->


    <!-- contact-info-section -->
    <section class="contact-info-section centred">
        <div class="auto-container">
            <div class="inner-content clearfix">
                <div class="single-item">
                    <div class="icon-box"><i class="icon-location"></i></div>
                    <h4>{{__('content.address')}}</h4>
                    <p>{{contact()->address}}</p>
                </div>
                <div class="single-item">
                    <div class="icon-box"><i class="icon-call"></i></div>
                    <h4>{{__('content.Get in Touch With Us')}}</h4>
                    <p>{{__('content.number')}} : <a href="tel:{{contact()->number}}">{{contact()->number}}</a><br /> {{__('content.phone')}}: <a href="tel:{{contact()->phone}}">{{contact()->phone}}</a></p>
                </div>
                <div class="single-item">
                    <div class="icon-box"><i class="icon-email-1"></i></div>
                    <h4>{{__('content.email')}}</h4>
                    <p> <a href="mailto:{{contact()->email}}">{{contact()->email}}</a></p>
                </div>
                <div class="single-item">
                    <div class="icon-box"><i class="icon-clock"></i></div>
                    <h4>{{__('content.worktime')}}</h4>
                    <p>({{contact()->workinghourstart}} - {{contact()->workinghourend}})</p>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-section end -->


    <!-- google-map-section -->
    <section class="google-map-section">
        {!! contact()->googlemap !!}
    </section>
    <!-- google-map-section end -->
    @endsection


@section('js')


@endsection
