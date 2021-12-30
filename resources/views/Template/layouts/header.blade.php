
<header>
    <div class="header-up">
        <div class="top-cart">
          @auth('customer')
            <a href="{{route('customer.wishlist')}}" class="color_gray"><span>{{__('content.wishlist')}}</span>  </a>
             @endauth
            <a href="#" class="shopping_bag">
                <i class="fas fa-shopping-bag"></i>
                <span class="price">199</span> <span>AZN</span> (<span class="count">1</span>)
            </a>
            <a href="#" class="Login_Registr">Daxil ol </a>
            <div class="login">
                @auth('customer')
                <h4>Şəxsi Kabinet</h4>
                <p><a href="{{route('customer.profil')}}">Users: <span>{{ auth('customer')->user()->name}}</span></a></p>
                <p  onclick="event.preventDefault(); document.getElementById('logoutform').submit()"> <a href="#">Log out</a></p>

                    <form action="{{route('customer.logout')}}" method="post" id="logoutform" style="display: none">
                        @csrf
                    </form>
                @endauth

                @guest('customer')
                <p><a href="{{route('customer.login')}}"> {{__('content.login')}} </a></p>
                <p><a href="{{route('customer.register')}}"> {{__('content.register')}} </a></p>
                @endguest
            </div>
            <div class="opencart">
                <div class="opencartitems">

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

                <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                    class="{{ LaravelLocalization::getCurrentLocale()==$localeCode?'border border-primary border-2 p-1':'' }}">
                    <img src="/assets/img/{{ $localeCode }}.png" /> {{  ucfirst($properties['native']) }} </a>

                     @endif
                 @endforeach

            </div>
            <form action="{{route('site.productsearch')}}" method="get">
                <input type="text" name="axtaris" placeholder="{{__('content.search')}}..." />
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </ul>
    <div class="header-down">
      @include('Template.layouts.navbar')
    </div>
</header>

