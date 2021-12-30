
<footer>
    <div class="foot-up">
        <div class="foot-subscribe">
            <div class="foot-box">
                <img src="/assets/img/ft.png" />
                <h3>Send request</h3>
            </div>
            <div class="foot-box form-subscribe">
                <form>
                    <input type="text" />
                    <button type="button">Subscribe</button>
                </form>
            </div>
            <div class="foot-box ">
                <div class="icons">
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
                </div>
            </div>
        </div>
    </div>
    <div class="foot">
        <div class="foot-items">
            <div class="itemFoot">
                <a href="{{route('site.index')}}"> <img src="{{setting()->footer_logo}}"width="200px"   alt="logo-{{setting()->title}}" title="logo-{{setting()->title}}"></a>
                <p>
                    {{setting()->meta_content}}
                </p>
            </div>
            <div class="itemFoot">
                <div class="text-foot">
                    <h3>Pages</h3>
                    @foreach(allPages() as $page)
                        <p>
                            <a href="{{route('page',$page->slug)}}">{{$page->name}}</a>
                        </p>
                    @endforeach

                    <p>
                        <a href="{{route('site.contact')}}">{{__('content.contact')}}</a>
                    </p>
                    <p>
                        <a href="{{route('site.allcategories')}}">{{__('content.allcats')}}</a>
                    </p>
                </div>
            </div>
            <div class="itemFoot">
                <div class="text-foot foot-contact">
                    <h3>Store Info</h3>
                    <p><a target="_blank" href="{{route('site.contact')}}"><span><i
                                    class="fas fa-map-marker-alt"></i></span>{{contact()->address}}</a> </p>
                    <p><a href="tel:{{contact()->number}}"><i class="fas fa-phone-alt"></i> Mob:{{contact()->number}}</a></p>
                    <p><a href="mailto:{{contact()->email}}"><i class="far fa-envelope"></i> E-mail:{{contact()->email}}</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="backtotop">
        <a href="#"><i class="fas fa-angle-double-up"></i></a>
    </div>
    <div class="copyright">
        <div class="text-copyright">
            <p> Copyright © <span>(c) 2021</span> Protool </p>
        </div>
    </div>
</footer>
