@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/category.css">
@endsection


@section('content')

    <div class="categoryPage">
        <h3> {{__('content.allcats')}} </h3>
        <p>
            <a href="{{route('site.index')}}"> {{__('content.home') }} </a>
            <span> <i class="fas fa-angle-double-right"></i> </span>
            <span>  <a href="{{route('site.allcategories')}}"> {{__('content.allcats')}} </a> </span>
        </p>
    </div>

    <div class="containers">
        <div class="left-container">
            @include('Template.layouts.leftcontainer')
        </div>
        <div class="right-container">
            @foreach($categories as $cat)
            <div class="category-item">
                <div class="top-img">
                    <img src="{{$cat->image !=NULL? $cat->image : 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png'}}"/>
                </div>
                <p>
                    @if( !(new \App\Models\ProductCategory)->categoryHasChildren($cat->id)->isEmpty()   )
                    <a href="{{route('site.allcategories',['id'=>$cat->id , 'slug'=>\Illuminate\Support\Str::slug($cat->name)])}}">{{$cat->name}}</a>
                    @else
                        <a href="{{route('site.productcategory',['id'=>$cat->id , 'slug'=>\Illuminate\Support\Str::slug($cat->name)])}}">{{$cat->name}}</a>
                    @endif
                </p>
            </div>
            @endforeach

        </div>
    </div>




@endsection


@section('js')
@endsection
