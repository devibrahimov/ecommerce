

<body>

<div class="preloader">
    <img class="preloader__image" width="60" src="/assets/images/loader.png" alt="" />
</div>

<!-- /.preloader -->
<div class="page-wrapper">
    <header class="main-header main-header--one  clearfix">
        <div class="main-header--one__top clearfix">
            <div class="container">
                <div class="main-header--one__top-inner clearfix">
                    <div class="main-header--one__top-left">
                        <div class="main-header--one__top-logo >
                            <a href="{{route('site.index')}}"><img src="{{setting()->logo}}" alt="logo - {{setting()->title}}" width="200px" /></a>
                    </div>
                </div>

                <div class="main-header--one__top-right clearfix">
                    <ul class="main-header--one__top-social-link list-unstyled clearfix">

                        @if(contact()->facebook != null)
                            <li><a href="{{contact()->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if(contact()->linkedin != null)
                            <li><a href="{{contact()->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        @endif
                        @if(contact()->instagram != null)
                            <li><a href="{{contact()->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if(contact()->youtube != null)
                            <li><a href="{{contact()->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        @endif

                    </ul>

                    <div class="main-header--one__top-contact-info clearfix">
                        <ul class="main-header--one__top-contact-info-list list-unstyled">
                            <li class="main-header--one__top-contact-info-list-item">
                                <div class="icon">
                                    <span class="icon-phone-call-1"></span>
                                </div>
                                <div class="text">
                                    <h6>{{__('content.number')}}</h6>
                                    <p><a href="tel:{{contact()->number}}">{{contact()->number}}</a></p>
                                </div>
                            </li>
                            <li class="main-header--one__top-contact-info-list-item">
                                <div class="icon">
                                    <span class="icon-message"></span>
                                </div>
                                <div class="text">
                                    <h6>{{__('content.email')}}</h6>
                                    <p><a href="mailto:{{contact()->email}}">{{contact()->email}}</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
</div>

<div class="main-header-one__bottom clearfix">
    <div class="container">
        <div class="main-header-one__bottom-inner clearfix">
            <nav class="main-menu main-menu--1">
                <div class="main-menu__inner">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>

                    <div class="left">
                        <ul class="main-menu__list">
                            <li class="{{ isset($page)? $page == 'index'? 'current' : '':''  }}">
                                <a href="{{route('site.index')}}">{{__('content.home')}}</a>

                            </li>
                            <li class="{{ isset($page) && $page == 'about'? 'current' : ''  }}"><a href="{{route('site.about')}}">{{__('content.about')}}</a></li>
                            <li class="{{ isset($page) && $page == 'service'? 'current' : ''   }}" class="dropdown">
                                <a href="{{route('site.services')}}">{{__('content.services')}}</a>
                                <ul>
                                    @foreach(allServices() as $service)
                                        <li><a href="{{route('site.serviceDetail',['id'=> $service->service_id,'slug'=>\Illuminate\Support\Str::slug($service->name)])}}">{{$service->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ isset($page) && $page == 'faq'? 'current' : ''   }}"><a href="{{route('site.faq')}}">{{__('content.faq')}}</a></li>
                            <li class="{{ isset($page) && $page == 'gallery'? 'current' : ''   }}"><a href="{{route('site.gallery')}}">{{__('content.gallery')}}</a></li>
                            <li class="{{ isset($page) && $page == 'blog'? 'current' : ''   }}"><a href="{{route('site.blogs')}}">{{__('content.blog')}}</a></li>
                            <li class="{{ isset($page) && $page == 'contact'? 'current' : ''   }}"><a href="{{route('site.contact')}}">{{__('content.contact')}}</a></li>
                        </ul>
                    </div>

                    <div class="right">
                        <div class="main-menu__right">
                            <div class="main-menu__right-cart-form">
                                <div class="main-menu__right-form-box">
                                    <a href="#" class="thm-btn form-toggler" style="background-color: #1bd741!important;">
                                        <img style="width: 100px;" src="https://static.xx.fbcdn.net/rsrc.php/ym/r/36B424nhiL4.svg" alt="Whatsapp ile İletişime Geç" />
                                    </a>
                                </div>
                            </div>

                            <div class="main-menu__right-lang">
                                <div class="main-menu__right-lang-box">
                                    <span class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() }}"></span>
                                </div>
                                <div class="lang-box">
                                    <ul>
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            @if(controlhaslang($localeCode) == true)
                                                <li >
                                                    <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        <span class="flag-icon flag-icon-{{ $localeCode }}"></span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

</header>

@yield('content')

<!--Start Footer One-->
<footer class="footer-one">
    <div class="footer-one__bg" style="background-image: url(assets/images/backgrounds/footer-v1-bg.jpg);">
    </div><!-- /.footer-one__bg -->
    <div class="footer-one__top">
        <div class="container">
            <div class="row">
                <!--Start Footer Widget Column-->
                <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp pr-20"" data-wow-delay="0.1s">
                <div class="footer-widget__column footer-widget__about">
                    <div class="footer-widget__about-logo">
                        <a href="{{route('site.index')}}"><img src="{{setting()->footer_logo}}" alt="{{setting()->title}} - logo" width="180"></a>
                    </div>
                </div>
            </div>
            <!--End Footer Widget Column-->

            <!--Start Footer Widget Column-->
            <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.3s">
                <div class="footer-widget__column footer-widget__courses">
                    <h3 class="footer-widget__title"> {{__('content.services')}}</h3>
                    <ul class="footer-widget__courses-list list-unstyled">
                        @foreach(allServices() as $service)
                            <li><a href="{{route('site.serviceDetail',['id'=> $service->service_id,'slug'=>\Illuminate\Support\Str::slug($service->name)])}}">{{$service->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--End Footer Widget Column-->

            <!--Start Footer Widget Column-->
            <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.5s">
                <div class="footer-widget__column footer-widget__links">
                    <h3 class="footer-widget__title">{{__('content.menu')}}</h3>
                    <ul class="footer-widget__links-list list-unstyled">
                        <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                        <li><a href="{{route('site.about')}}">{{__('content.about')}}</a></li>
                        <li><a href="{{route('site.services')}}">{{__('content.services')}}</a></li>
                        <li><a href="{{route('site.faq')}}">{{__('content.faq')}}</a></li>
                        <li><a href="{{route('site.gallery')}}">{{__('content.gallery')}}</a></li>
                        <li><a href="{{route('site.blogs')}}">{{__('content.blog')}}</a></li>
                        <li><a href="{{route('site.contact')}}">{{__('content.contact')}}</a></li>
                    </ul>
                </div>
            </div>
            <!--End Footer Widget Column-->

            <!--Start Footer Widget Column-->
            <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.7s">
                <div class="footer-widget__column footer-widget__contact">
                    <h3 class="footer-widget__title">{{__('content.contact')}}</h3>
                    <p class="text">{{contact()->address}}</p>
                    <p><a href="mailto:{{contact()->email}}">{{contact()->email}}</a></p>
                    @if(contact()->number !=null)
                        <p class="phone"><a href="tel:{{contact()->number}}">{{contact()->number}}</a></p>
                    @endif
                    @if(contact()->phone !=null)
                        <p class="phone"><a href="tel:{{contact()->phone}}">{{contact()->phone}}</a></p>
                    @endif
                </div>
            </div>
            <!--End Footer Widget Column-->

            <!--Start Footer Widget Column-->
            <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.9s">
                <div class="footer-widget__column footer-widget__social-links">
                    <ul class="footer-widget__social-links-list list-unstyled clearfix">
                        @if(contact()->facebook != null)
                            <li><a href="{{contact()->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if(contact()->linkedin != null)
                            <li><a href="{{contact()->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        @endif
                        @if(contact()->instagram != null)
                            <li><a href="{{contact()->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if(contact()->youtube != null)
                            <li><a href="{{contact()->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!--End Footer Widget Column-->

        </div>
    </div>


    </div>


</footer>
<!--End Footer One-->

</div><!-- /.page-wrapper -->

<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="{{route('site.index')}}" aria-label="logo image"><img src="{{setting()->footer_logo}}"
                                                                           width="120" alt="{{setting()->title}} - logo" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="icon-phone-call"></i>
                <a href="mailto:{{contact()->email}}">{{contact()->email}}</a>
            </li>
            <li>
                <i class="icon-letter"></i>
                <a href="tel:{{contact()->number}}">{{contact()->number}}</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                @if(contact()->facebook != null)
                    <a href="{{contact()->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if(contact()->linkedin != null)
                    <a href="{{contact()->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i></a>
                @endif
                @if(contact()->instagram != null)
                    <a href="{{contact()->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                @endif
                @if(contact()->youtube != null)
                    <a href="{{contact()->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
                @endif
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->
    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->


<div class="form-popup">
    <div class="form-popup__overlay form-toggler"></div>

    <div class="form-popup__content">
        <div class="col-xl-5 col-lg-5">
            <div class="registration-one__right">
                <div class="registration-one__right-form">
                    <div class="title-box">
                        <h4>{{__('content.Registerform')}}</h4>
                        <span>{{__('content.RegisterformContent')}}</span>
                    </div>
                    <div class="form-box" id="whatsappconcatform">
                        {{--                        <form  action="{{route('registerform')}}">--}}

                        <div class="form-group">
                            <input type="text" id="username"   placeholder="{{__('content.First Name')}}" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" id="email"   placeholder="{{__('content.Email')}}" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" id="phone"  placeholder="{{__('content.Phone Number')}}" required="">
                        </div>
                        <div class="form-group">
                            <select class="form-group" id="service" >
                                @foreach(allServices() as $service)
                                    <option value="{{$service->name}}"> {{$service->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea  id="message" placeholder="{{__('content.Message')}}" ></textarea>
                        </div>
                        <button class="registration-one__right-form-btn" type="submit"
                                name="submit-form">
                            <span id="sendformmessage" class="thm-btn">{{__('content.Send')}}</span>
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<!-- template js -->
<script src="/assets/js/main.js"></script>

</body>

</html>


