@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/products.css">
@endsection


@section('content')


    <div class="productPage">
        <h4> {{isset($category)?$category->name : ''}}</h4>
        <div >
            <p>
                <a href="{{route('site.index')}}"> {{__('content.home') }} </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <span>{{__('content.products')}} </span>
            </p>

{{--            <select class="form-select" aria-label="Default select example">--}}
{{--                <option selected>Сортировка по умолчанию</option>--}}
{{--                <option value="1">Сортировать по популярности</option>--}}
{{--                <option value="2">Сортировать по последнему</option>--}}
{{--                <option value="3">Сортировать по последнему</option>--}}
{{--            </select>--}}

        </div>
    </div>

    <div class="containers">
        <div class="left-container">
            @include('Template.layouts.leftcontainer')
        </div>
        <div class="right-container">
            <div class="container-products">
                @if(isset($products))
                        @foreach($products as $product)

                        <div class="card">
                            @if(count($product->images) == 0)
                              <img class="card-img-top" src="/wp-content/uploads/woocommerce-placeholder-300x300.png" alt="{{setting()->title.'-'.$product->name}}" title="{{setting()->title.'-'.$product->name}}">
                                <img class="card-img-top2" src="/wp-content/uploads/woocommerce-placeholder-300x300.png" alt="Card image">

                          @endif
                             @if(count($product->images)==1)
                                <img class="card-img-top" src="{{$product->images[0]->imagepath}}" alt="{{setting()->title.'-'.$product->name}}" title="{{setting()->title.'-'.$product->name}}">
                                <img class="card-img-top2" src="{{$product->images[0]->imagepath}}" alt="Card image">
                                @endif
                            @if(count($product->images) >1)
                                    <img class="card-img-top" src="{{$product->images[0]->imagepath}}" alt="{{setting()->title.'-'.$product->name}}" title="{{setting()->title.'-'.$product->name}}">
                                    <img class="card-img-top2" src="{{$product->images[1]->imagepath}}" alt="Card image">
                           @endif
                            <ul class="butons">
                                <li data-id="{{$product->id}}" class="addtowishlist "><a href="#"  ><i class="far fa-heart"></i></a></li>
                                <li data-id="{{$product->id}}" class="eye productreview"><a href="#"><i class="far fa-eye"></i></a></li>
                                <li data-id="{{$product->id}}" class="compareOpen" ><a ><i class="fas fa-compress-alt"></i></a></li>
                                <li><a  class="addtocart" data-quantity="1" data-id="{{$product->id}}"><i class="fas fa-shopping-cart"></i></a></li>
                            </ul>
                                    @if($product->stock_status != 'instock')
                            <a class="soldout" href="{{route('site.productDetail',['id'=>$product->id,'slug'=>\Illuminate\Support\Str::slug($product->name)])}}">
                                <span>Stokta bitib</span>
                            </a>
                                 @endif
                            <div class="card-body " >
                                <p class="card-text"> <a href="{{route('site.productDetail',['id'=>$product->id,'slug'=>\Illuminate\Support\Str::slug($product->name)])}}">
                             {{$product->name}}  </a></p>
                                <div id="starRating">
                                    {!! rateStars($product->id) !!}
                                </div>
                                <p class="card-text"><span>{{$product->sale_price}}</span>AZN</p>

                            </div>
                        </div>
                   @endforeach
                    @endif

            </div>
            {{$products->links()}}



        </div>
    </div>

@endsection


@section('js')
@endsection
