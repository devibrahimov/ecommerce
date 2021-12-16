
    <!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">Bağla</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                            <span data-text-preloader="y" class="letters-loading">
                               y
                            </span>
                        <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                        <span data-text-preloader="n" class="letters-loading">
                                n
                            </span>
                        <span data-text-preloader="ğ" class="letters-loading">
                                ğ
                            </span>
                        <span data-text-preloader="ı" class="letters-loading">
                                ı
                            </span>
                        <span data-text-preloader="n" class="letters-loading">
                               n
                            </span>
                        <span data-text-preloader="." class="letters-loading">
                                .
                            </span>
                        <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                        <span data-text-preloader="z" class="letters-loading">
                                z
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- main header -->
    <header class="main-header style-three">
        <!-- header-top -->
        <div class="header-top bg-color-3">
            <div class="auto-container">
                <div class="top-inner clearfix">
                    <ul class="info clearfix pull-left">
                        <li><i class="icon-placeholder"></i>{{contact()->address}}</li>
                        <li><i class="icon-hour"></i> {{__('content.workstime')}} (
                            {{contact()->workinghourstart}} - {{contact()->workinghourend}} )</li>
                    </ul>
                    <ul class="info clearfix pull-right">
                        <li><i class="icon-email-2"></i><a href="mailto:{{contact()->email}}">{{contact()
                        ->email}}</a></li>
                        <li><i class="icon-phone-call1"></i><a href="tel:{{contact()->number}}">{{contact()->number}}</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- header-lower -->
        <div class="header-lower">
            <div class="auto-container">
                <div class="outer-box clearfix">
                    <div class="logo-box">
                        <figure class="logo"><a href="{{route('site.index')}}"><img src="{{setting()->logo}}"
                                alt="logo-{{setting()->title}}" width="200px" ></a></figure>
                    </div>
                    <div class="menu-area clearfix">
                        <div   class="langlistmobile">

                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if(controlhaslang($localeCode) == true)

                                    <a class="{{ LaravelLocalization::getCurrentLocale()==$localeCode?'flacgactive':'' }}"
                                       hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <span class="flag-icon flag-icon-{{ $localeCode }}"></span>
                                    </a>

                                @endif
                            @endforeach

                        </div>
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="{{ isset($page)? $page == 'index'? 'current' : '':''  }}">
                                        <a href="{{route('site.index')}}">{{__('content.home')}}</a>
                                    </li>
                                    <li class="{{ isset($page) && $page == 'about'? 'current' : ''  }}"><a href="{{route('site.about')}}">{{__('content.about')}}</a></li>
                                    <li class="{{ isset($page) && $page == 'products'? 'current' : ''  }}"><a
                                            href="{{route('site.products')}}">{{__('content.products')}}</a></li>
                                    <li class="{{ isset($page) && $page == 'service'? 'current' : ''   }} dropdown">
                                        <a href="#">{{__('content.services')}}</a>
                                        <ul>
                                            @foreach(allServices() as $service)
                                                <li><a href="{{route('site.serviceDetail',['id'=> $service->service_id,'slug'=>\Illuminate\Support\Str::slug($service->name)])}}">{{$service->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="{{ isset($page) && $page == 'blog'? 'current' : ''   }}"><a
                                            href="{{route('site.blogs')}}">{{__('content.blogs')}}</a></li>
                                    <li class="{{ isset($page) && $page == 'contact'? 'current' : ''   }}"><a href="{{route('site.contact')}}">{{__('content.contact')}}</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <ul class="other-option clearfix">
                        <li   class="langlist">

                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if(controlhaslang($localeCode) == true)

                                    <a class="{{ LaravelLocalization::getCurrentLocale()==$localeCode?'flacgactive':'' }}"
                                       hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <span class="flag-icon flag-icon-{{ $localeCode }}"></span>
                                    </a>

                                @endif
                            @endforeach

                        </li>

                        <li class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-search"></i></button>
                                <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                                    <div class="form-container">
                                        <form method="post" action="#">
                                            <div class="form-group">
                                                <input type="search" name="search-field" value="" placeholder="{{__
                                                ('content.search')}}.
                                                ..."
                                                       required="">
                                                <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="outer-box clearfix">
                    <div class="logo-box">
                        <figure class="logo"><a href="{{route('site.index')}}"><img src="{{setting()->logo}}"
                                 alt="logo-{{setting()->title}}" width="200px"></a></figure>
                    </div>
                    <div class="menu-area clearfix">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                    <ul class="other-option clearfix">
                        <li  class="langlist">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if(controlhaslang($localeCode) == true)

                                    <a class="{{ LaravelLocalization::getCurrentLocale()==$localeCode?'flacgactive':'' }}"
                                       hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <span class="flag-icon flag-icon-{{ $localeCode }}"></span>
                                    </a>

                                @endif
                            @endforeach
                        </li>
                        <li class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-search"></i></button>
                                <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu4">
                                    <div class="form-container">
                                        <form method="post" action="#">
                                            <div class="form-group">
                                                <input type="search" name="search-field" value="" placeholder="{{__
                                                ('content.search')}}...." required="">
                                                <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="/assets/images/logo-4.png" alt="" title=""></a></div>

            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->


