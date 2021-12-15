@extends('Template.index')

@section('css')

    <style>
        .sortable-masonry .filters .filter-tabs li {

            color: #111;
            padding: 19px 0px 17px 0px;
            margin: 0px -1.5px;
        }
        .sortable-masonry .filters .filter-tabs li a {

            color: #111;
            padding: 19px 0px 17px 0px;
            margin: 0px -1.5px;
        }
        .project-page-section .project-block-one .inner-box {
            margin-bottom: 6px;
        }
        .project-block-one h2  {
            position: relative;
            font-size: larger;
            font-weight: 450;
            color: #111111;
            margin: 0px;
            transition: all 500ms ease;
            font-family: serif!imporant;
        }
        .project-block-one p  {
            font-size: 15px;!imporant;
        }
        .image-box img{
            width:100%;height:230px;object-fit: contain;
        }

        .project-block-one .inner-box .image-box {

            background: none!important;
        }
    </style>
@endsection


@section('content')


    <!-- Page Title -->
    <section class="page-title" style="background-image: url(/assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{__('content.products')}}</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                    <li>{{__('content.products')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- project-details -->
    <section class="project-details sec-pad">

        <div class="auto-container">
            <div class="project-details-content">

                <div class="related-project">
                    <h3>{{$product->name}}</h3>

                    <div class="text">
                        {!! $product->meta_content !!}
                    </div>


                    <div class="row clearfix">
                        @foreach($product->images as $image)
                        <div class="col-lg-4 col-md-6 col-sm-12 project-block">
                            <div class="project-block-one">
                                       <figure class="image-box"><img src="{{$image->imagepath}}" alt=""></figure>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text mt-5">
                        {!! $product->content !!}
                </div>
                <ul class="info-list clearfix">
                    <li>
                        <i class="icon-manager"></i>
                        <h5>Client</h5>
                        <p>Stanford University</p>
                    </li>
                    <li>
                        <i class="icon-event"></i>
                        <h5>Date</h5>
                        <p>Sep 28, 2020</p>
                    </li>
                    <li>
                        <i class="icon-settings-1"></i>
                        <h5>Category</h5>
                        <p>Outdoor Wiring</p>
                    </li>
                    <li>
                        <i class="icon-map"></i>
                        <h5>Location</h5>
                        <p>California, USA</p>
                    </li>
                </ul>
                </div>

            </div>

        </div>
    </section>
    <!-- project-details end -->



@endsection


@section('js')
@endsection
