@extends('Template.index')

@section('css')
@endsection


@section('content')
    <!--Page Header Start-->
    <section class="page-header clearfix" style="background-image: url(/assets/images/backgrounds/page-header-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>{{__('content.gallery')}}</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                                <li class="active">{{__('content.gallery')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->
    <div id="instafeed"></div>


@endsection


@section('js')
    <script type="text/javascript" src="/assets/js/instafeed.min.js"></script>
    <script type="text/javascript">
        var feed = new Instafeed({

            accessToken: 'your-token'
        });
        feed.run();
    </script>
@endsection
