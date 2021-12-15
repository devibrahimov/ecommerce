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
            width:100%;height:230px;object-fit: cover;
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


    <!-- project-page-section -->
    <section class="project-page-section three-column">

        <div class="container-fluid">
            <div class="sortable-masonry">
            <div class="filters centred">
                <ul class="filter-tabs filter-btns clearfix">


                    @foreach($categories as $cat)
                        <li class="filter {{isset($catid)&&$catid==$cat->id? 'active':''}}" data-role="button" data-filter="
                        .alaram">

                            <a href="{{route('site.productcategory',['id'=>$cat->id ,'slug'=>\Illuminate\Support\Str::slug
                            (getproductcategorycontent($cat->id,LaravelLocalization::getCurrentLocale())->name)])}}">
                                {{isset(getproductcategorycontent($cat->id,LaravelLocalization::getCurrentLocale())->name)? getproductcategorycontent($cat->id,LaravelLocalization::getCurrentLocale())->name: ''}}
                            </a>
                        </li>
                    @endforeach

                </ul>
                </div>
            </div>
        </div>
        <div class="auto-container" style="    margin-bottom: 60px;">
            <div class="sortable-masonry">
                <div class="items-container row clearfix">
                    @if(isset($products))
                        @foreach($products as $product)
                        <div class="col-lg-4 mt-3  col-md-6 col-sm-12 masonry-item small-column all outdoor installation">
                            <a href="{{route('site.productDetail',['id'=>$product->id,
                            'slug'=>\Illuminate\Support\Str::slug($product->name)])}}">
                                <div class="project-block-one">
                                    <figure class="image-box" style="border: 0.5px solid #c0c0c0;border-radius: 5px">
                                        <img src="{{$product->imagepath}}" alt="{{setting()->title.'-'.
                                        $product->name}}">
                                    </figure>
                                    <h2 class="mt-2">{{$product->name}}</h2>
                                    <p>{{ html_entity_decode(substr( strip_tags($product->content) ,0,150)) }} ...</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- project-page-section end -->



@endsection


@section('js')
@endsection
