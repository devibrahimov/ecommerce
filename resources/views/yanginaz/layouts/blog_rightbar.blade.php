<div class="blog-sidebar default-sidebar ml-30">
    <div class="sidebar-widget category-widget">
        <div class="widget-title">
            <h3>{{__('content.categories')}}</h3>
        </div>
        <div class="widget-content">
            <ul class="category-list clearfix">
                @if(isset($categories))
                    @foreach($categories as $cat)
                        <li><a href="{{route('site.blogcat',['id'=>$cat->base_id ,'slug'=>\Illuminate\Support\Str::slug($cat->name)])}}"><i class="far fa-arrow-alt-circle-right"></i>{{$cat->name}}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="sidebar-widget post-widget">
        <div class="widget-title">
            <h3>{{__('content.blogs')}}</h3>
        </div>
        <div class="post-inner">
            <div class="single-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                @if(isset($randblogs))
                    @foreach($randblogs as $rb)
                        <div class="post">
                            <figure class="image-box">
                                <img src="{{$rb->image}}" alt="">
                                <a href="{{route('site.blogcat',['id'=>$rb->category ,'slug'=>\Illuminate\Support\Str::slug(getblogcategorycontent($rb->category,LaravelLocalization::getCurrentLocale())->name)])}}">
                                    <i class="far fa-folder"></i>{{getblogcategorycontent($rb->category,LaravelLocalization::getCurrentLocale())->name}}</a>
                            </figure>
                            <div class="post-content">
                                <span class="post-date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rb->created_at)->format('d-m-Y') }}</span>
                                <h5><a href="{{route('site.blogdetail',['id'=>$rb->blog_id ,'slug'=>\Illuminate\Support\Str::slug($rb->name)])}}">{{$rb->name}}</a></h5>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    <div class="support-widget">
        <div class="inner-box" style="background-image: url(/assets/images/resource/widget-2.jpg);">
            <div class="text">
                <h3>{{__('content.contactInformContent')}}</h3>
                <a href="{{route('site.contact')}}">{{__('content.goto')}}</a>
            </div>
            <div class="phone-box">
                <i class="icon-smartphone"></i>
                <h6>{{__('content.Contact Information')}}</h6>
                <h5><a href="tel:{{contact()->number}}">{{contact()->number}}</a></h5>
            </div>
            <figure class="logo"><img src="{{setting()->favicon}}" alt=""></figure>
        </div>
    </div>
</div>
