
<header>
    <div class="header-up">
        <div class="top-cart">
            <a href="wishlist.html" class="color_gray"><span>İstək Siyahısı</span> (<b>0</b>)</a>
            <a href="#" class="shopping_bag">
                <i class="fas fa-shopping-bag"></i>
                <span class="price">199</span> <span>AZN</span> (<span class="count">1</span>)
            </a>
            <a href="#" class="Login_Registr">Daxil ol </a>
            <div class="login">
                <h4>Şəxsi Kabinet</h4>
                <p><a href="profile.html">Users: <span>Beyler</span></a></p>
                <p><a href="{{route('customer.login')}}"> {{__('content.login')}} </a></p>
                <p><a href="{{route('customer.register')}}"> {{__('content.register')}} </a></p>
                <p><a href="#">Log out</a></p>
            </div>
            <div class="opencart">
                <div class="cartItem">
                    <div class="openLeftImg">
                        <img src="/assets/img/2.jpg" />
                    </div>
                    <div class="openRightText">
                        <p>4PCS HOOK + PICK SET -1PC </p>
                        <p><span>1</span> x <span>19</span> AZN</p>
                    </div>
                    <div class="cartremove">
                        <span><i class="fas fa-times"></i></span>
                    </div>
                </div>
                <div class="cartItem">
                    <div class="openLeftImg">
                        <img src="/assets/img/2.jpg" />
                    </div>
                    <div class="openRightText">
                        <p>4PCS HOOK + PICK SET -1PC </p>
                        <p><span>1</span> x <span>19</span> AZN</p>
                    </div>
                    <div class="cartremove">
                        <span><i class="fas fa-times"></i></span>
                    </div>
                </div>
                <div class="subTotal">
                    <p>Subtotal : <span>38</span> <span>AZN</span></p>
                    <div>
                        <a href="viewcart.html">ViewCart</a>
                        <a href="Checkout.html">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="header-logo">
        <li class="left-logo">
            <a href="{{route('site.index')}}"> <img src="{{setting()->logo}}"width="200px"   alt="logo-{{setting()->title}}" title="logo-{{setting()->title}}"></a>
        </li>
        <li class="border_right">
            <div class="img-left">
                <i class="fas fa-headset"></i>
            </div>
            <div class="time-right">
                <p>{{__('content.workstime')}} </p>
                <p>{{contact()->number}} </p>
            </div>
        </li>
        <li>
            <div class="img-left">
                <i class="fas fa-truck-moving"></i>
            </div>
            <div class="time-right">
                <p> {{__('content.orderingamount')}} </p>
                <p>{{__('content.freeshipping')}} </p>
            </div>
        </li>
        <div class="lang-search">
            <div class="lang-up">

                 @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                     @if(controlhaslang($localeCode) == true)

                <a  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                    class="{{ LaravelLocalization::getCurrentLocale()==$localeCode?'border border-primary border-2 p-1':'' }}">
                    <img src="/assets/img/{{ $localeCode }}.png" /> {{  ucfirst($properties['native']) }} </a>

                     @endif
                 @endforeach

            </div>
            <form>
                <input type="text" placeholder="{{__('content.search')}}..." />
                <button type="button"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </ul>
    <div class="header-down">
      @include('Template.layouts.navbar')
    </div>
</header>


{{--<!-- main header -->--}}
{{--<header class="main-header style-three">--}}
{{--    <!-- header-top -->--}}
{{--    <div class="header-top bg-color-3">--}}
{{--        <div class="auto-container">--}}
{{--            <div class="top-inner clearfix">--}}
{{--                <ul class="info clearfix pull-left">--}}
{{--                    <li><i class="icon-placeholder"></i>{{contact()->address}}</li>--}}
{{--                    <li><i class="icon-hour"></i> {{__('content.workstime')}} (--}}
{{--                        {{contact()->workinghourstart}} - {{contact()->workinghourend}} )</li>--}}
{{--                </ul>--}}
{{--                <ul class="info clearfix pull-right">--}}
{{--                    <li><i class="icon-email-2"></i><a href="mailto:{{contact()->email}}">{{contact()--}}
{{--                        ->email}}</a></li>--}}
{{--                    <li><i class="icon-phone-call1"></i><a href="tel:{{contact()->number}}">{{contact()->number}}</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- header-lower -->--}}
{{--    <div class="header-lower">--}}
{{--        <div class="auto-container">--}}
{{--            <div class="outer-box clearfix">--}}
{{--                <div class="logo-box">--}}
{{--                    <figure class="logo"><a href="{{route('site.index')}}"><img src="{{setting()->logo}}"--}}
{{--                                                                                alt="logo-{{setting()->title}}" width="200px" ></a></figure>--}}
{{--                </div>--}}
{{--                <div class="menu-area clearfix">--}}
{{--                    <div   class="langlistmobile">--}}

{{--                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                            @if(controlhaslang($localeCode) == true)--}}

{{--                                <a class="{{ LaravelLocalization::getCurrentLocale()==$localeCode?'flacgactive':'' }}"--}}
{{--                                   hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                                    <span class="flag-icon flag-icon-{{ $localeCode }}"></span>--}}
{{--                                </a>--}}

{{--                            @endif--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                    <!--Mobile Navigation Toggler-->--}}
{{--                    <div class="mobile-nav-toggler">--}}
{{--                        <i class="icon-bar"></i>--}}
{{--                        <i class="icon-bar"></i>--}}
{{--                        <i class="icon-bar"></i>--}}
{{--                    </div>--}}
{{--                    <nav class="main-menu navbar-expand-md navbar-light">--}}
{{--                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">--}}
{{--                            <ul class="navigation clearfix">--}}
{{--                                <li class="{{ isset($page)? $page == 'index'? 'current' : '':''  }}">--}}
{{--                                    <a href="{{route('site.index')}}">{{__('content.home')}}</a>--}}
{{--                                </li>--}}
{{--                                <li class="{{ isset($page) && $page == 'about'? 'current' : ''  }}"><a href="{{route('site.about')}}">{{__('content.about')}}</a></li>--}}
{{--                                <li class="{{ isset($page) && $page == 'products'? 'current' : ''  }}"><a--}}
{{--                                        href="{{route('site.products')}}">{{__('content.products')}}</a></li>--}}
{{--                                <li class="{{ isset($page) && $page == 'service'? 'current' : ''   }} dropdown">--}}
{{--                                    <a href="#">{{__('content.services')}}</a>--}}
{{--                                    <ul>--}}
{{--                                        @foreach(allServices() as $service)--}}
{{--                                            <li><a href="{{route('site.serviceDetail',['id'=> $service->service_id,'slug'=>\Illuminate\Support\Str::slug($service->name)])}}">{{$service->name}}</a></li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="{{ isset($page) && $page == 'blog'? 'current' : ''   }}"><a--}}
{{--                                        href="{{route('site.blogs')}}">{{__('content.blogs')}}</a></li>--}}
{{--                                <li class="{{ isset($page) && $page == 'contact'? 'current' : ''   }}"><a href="{{route('site.contact')}}">{{__('content.contact')}}</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--                <ul class="other-option clearfix">--}}
{{--                    <li   class="langlist">--}}

{{--                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                            @if(controlhaslang($localeCode) == true)--}}

{{--                                <a class="{{ LaravelLocalization::getCurrentLocale()==$localeCode?'flacgactive':'' }}"--}}
{{--                                   hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                                    <span class="flag-icon flag-icon-{{ $localeCode }}"></span>--}}
{{--                                </a>--}}

{{--                            @endif--}}
{{--                        @endforeach--}}

{{--                    </li>--}}

{{--                    <li class="search-box-outer">--}}
{{--                        <div class="dropdown">--}}
{{--                            <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-search"></i></button>--}}
{{--                            <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">--}}
{{--                                <div class="form-container">--}}
{{--                                    <form method="post" action="#">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="search" name="search-field" value="" placeholder="{{__--}}
{{--                                                ('content.search')}}.--}}
{{--                                                ..."--}}
{{--                                                   required="">--}}
{{--                                            <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!--sticky Header-->--}}
{{--    <div class="sticky-header">--}}
{{--        <div class="auto-container">--}}
{{--            <div class="outer-box clearfix">--}}
{{--                <div class="logo-box">--}}
{{--                    <figure class="logo"><a href="{{route('site.index')}}"><img src="{{setting()->logo}}"--}}
{{--                                                                                alt="logo-{{setting()->title}}" width="200px"></a></figure>--}}
{{--                </div>--}}
{{--                <div class="menu-area clearfix">--}}
{{--                    <nav class="main-menu clearfix">--}}
{{--                        <!--Keep This Empty / Menu will come through Javascript-->--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--                <ul class="other-option clearfix">--}}
{{--                    <li  class="langlist">--}}
{{--                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                            @if(controlhaslang($localeCode) == true)--}}

{{--                                <a class="{{ LaravelLocalization::getCurrentLocale()==$localeCode?'flacgactive':'' }}"--}}
{{--                                   hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                                    <span class="flag-icon flag-icon-{{ $localeCode }}"></span>--}}
{{--                                </a>--}}

{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </li>--}}
{{--                    <li class="search-box-outer">--}}
{{--                        <div class="dropdown">--}}
{{--                            <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-search"></i></button>--}}
{{--                            <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu4">--}}
{{--                                <div class="form-container">--}}
{{--                                    <form method="post" action="#">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="search" name="search-field" value="" placeholder="{{__--}}
{{--                                                ('content.search')}}...." required="">--}}
{{--                                            <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}
{{--<!-- main-header end -->--}}

{{--<!-- Mobile Menu  -->--}}
{{--<div class="mobile-menu">--}}
{{--    <div class="menu-backdrop"></div>--}}
{{--    <div class="close-btn"><i class="fas fa-times"></i></div>--}}

{{--    <nav class="menu-box">--}}
{{--        <div class="nav-logo"><a href="index.html"><img src="/assets/images/logo-4.png" alt="" title=""></a></div>--}}

{{--        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>--}}
{{--        <div class="contact-info">--}}
{{--            <h4>Contact Info</h4>--}}
{{--            <ul>--}}
{{--                <li>Chicago 12, Melborne City, USA</li>--}}
{{--                <li><a href="tel:+8801682648101">+88 01682648101</a></li>--}}
{{--                <li><a href="mailto:info@example.com">info@example.com</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="social-links">--}}
{{--            <ul class="clearfix">--}}
{{--                <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>--}}
{{--                <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>--}}
{{--                <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>--}}
{{--                <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>--}}
{{--                <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</div><!-- End Mobile Menu -->--}}


