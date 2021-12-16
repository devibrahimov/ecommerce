

<!-- main-footer -->
<footer class="main-footer bg-color-3">
    <div class="auto-container">
        <div class="footer-top-three">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Contact</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info clearfix">
                                <li>
                                    <h6>{{__('content.address')}}</h6>
                                    <p>{{contact()->address}}</p>
                                </li>
                                <li>
                                    <h6>{{__('content.number')}}</h6>
                                    <p><a href="tel:{{contact()->number}}">{{contact()->number}}</a></p>
                                </li>
                                <li>
                                    <h6>{{__('content.workstime')}}</h6>
                                    <p>({{contact()->workinghourstart}} - {{contact()->workinghourend}})</p>
                                </li>
                            </ul>
                            <ul class="social-style-two clearfix">
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
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>{{__('content.menu')}}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                                <li><a href="{{route('site.about')}}">{{__('content.about')}}</a></li>
                                <li><a href="{{route('site.products')}}">{{__('content.products')}}</a></li>
                                <li><a  href="{{route('site.blogs')}}">{{__('content.blogs')}}</a></li>
                                <li><a href="{{route('site.contact')}}">{{__('content.contact')}}</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>{{__('content.categories')}}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                @foreach(allProductCategories() as $cat)
                                    <li><a href="{{route('site.productcategory',['id'=>$cat->id ,'slug'=>\Illuminate\Support\Str::slug
                            ($cat->name)])}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title">
                            <h3>{{__('content.products')}}</h3>
                        </div>
                        <div class="post-inner">

                                @foreach(footerproducts() as $product)

                                    <div class="post mt-3">
                                        <figure class="post-thumb  float-left pr-2">
                                            <img src="{{$product->imagepath}}" style="height: 70px;width: 70px;object-fit: cover"
                                                 alt="{{$product->name}}">
                                        </figure>
                                        <h5><a href="{{route('site.productDetail',['id'=>$product->id,
                            'slug'=>\Illuminate\Support\Str::slug($product->name)])}}">{{$product->name}}</a></h5>
                                        <span class="post-date">{{ html_entity_decode(substr( strip_tags
                                        ($product->content) ,0,70)) }} ...</span>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-three clearfix">
            <div class="copyright pull-left">
                <p>&copy; 2021 Created by  <a href="http://lumusoft.com"> <img src="http://lumusoft.com/lumusoft-avatar.jpg"  width="20px" alt="lumusoft-logo-icon"> Lumusoft.com</a> </p>
            </div>
            <ul class="footer-nav pull-right clearfix">
                <li><a href="http://azintech.az">azintech.az</a></li>
                <li><a href="http://davitek.az">davitek.az</a></li>
                <li><a href="http://turnike.az">turnike.az</a></li>
                <li><a href="http://otelkilit.az">otelkilit.az</a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- main-footer end -->



<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fal fa-long-arrow-up"></span>
</button>


