@extends('Template.index')

@section('css')
@endsection


@section('content')

    <section class="page-title page-title-layout5 bg-overlay text-center">
        <div class="bg-img"><img src="/template/images/page-titles/6.jpg" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle__heading">{{__('content.press')}}</h1>
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->


    <section class="team-layout1 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-40">
                        <h3 class="heading__title">{{__('content.press')}}</h3>
                        <p class="heading__desc">
                        </p>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel"
                         data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        <!-- Member #1 -->
                        @if(isset($press))
                            @foreach($press as $p)

                        <div class="member">
                            <div class="member__img">
                                <img src="{{$p->image}}" alt="member img">

                            </div><!-- /.member-img -->
                            <div class="member__info">
                                <h5 class="member__name"><a href="{{$p->url}}">  {{$p->title}}</a></h5>
                                <p class="member__desc">{{$p->content}}</p>
                                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="{{$p->url}}" target="_blank" class="btn btn__secondary btn__link btn__rounded">
                                        <span>{{__('content.goto')}}</span>
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </div>
                            </div><!-- /.member-info -->
                        </div><!-- /.member -->
                        @endforeach
                    @endif

                    </div><!-- /.carousel -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Team -->


@endsection


@section('js')
@endsection
