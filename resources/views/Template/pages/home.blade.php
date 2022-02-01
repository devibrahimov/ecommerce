@extends('Template.index')


@section('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection


@section('content')

    <div class="container-one">
        <div class="swiper mySwiper item_Slider">
            <div class="swiper-wrapper">
                @foreach($carousel as $item)
                <div class="swiper-slide">
                    <div class="item_background" style="background-image: url('{{$item->image}}')">
                        <div class="text">
                            <p>{{$item->title}}</p>
                            <h3>{{$item->header}} </h3>
                            <p>{{$item->content}}</p>
                            <a href="{{$item->url}}">{{__('content.goto')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
        <div class="container2">
            <div class="item1"></div>
            <div class="item2">
                <div class="box">
                    <div class="left-box">
                        <span><i class="far fa-smile"></i></span>
                    </div>
                    <div class="right-box">
                        <p>100% Satisfaction</p>
                        <span>from our service</span>
                    </div>
                </div>
                <div class="box">
                    <div class="left-box">
                        <span><i class="fas fa-thumbs-up"></i></span>
                    </div>
                    <div class="right-box">
                        <p>Save 20% When You</p>
                        <span>Use credit card</span>
                    </div>
                </div>
                <div class="box">
                    <div class="left-box">
                        <span><i class="fas fa-plane"></i></span>
                    </div>
                    <div class="right-box">
                        <p>Fast Free</p>
                        <span> Shipment</span>
                    </div>
                </div>
                <div class="box">
                    <div class="left-box">
                        <span><i class="fas fa-hand-holding-usd"></i></span>
                    </div>
                    <div class="right-box">
                        <p>Refund within</p>
                        <span>14 days</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="containers">
            <div class="left-container">
                @include('Template.layouts.leftcontainer')
            </div>
            <div class="right-container">
                <ul class="title">
                    <li class="activeLi">
                        <a href="#">Best sellers</a>
                    </li>
                    <li>
                        <a href="#">New Arrival</a>
                    </li>
                    <li>
                        <a href="#">Featured</a>
                    </li>
                </ul>
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
                                    <li data-id="{{$product->id}}" class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
                                    <li><a  class="addtocart" data-quantity="1" data-id="{{$product->id}}"><i class="fas fa-shopping-cart"></i></a></li>
                                </ul>
                                <a class="soldout" href="{{route('site.productDetail',['id'=>$product->id,'slug'=>\Illuminate\Support\Str::slug($product->name)])}}">
                                        <span>Stokda bitib</span>
                                </a>
                                <div class="card-body " >
                                    <p class="card-text">{{$product->name}}</p>
                                    <div id="starRating">
                                        {!! rateStars($product->id) !!}
                                    </div>
                                    <p class="card-text"><span>{{$product->sale_price}}</span>AZN</p>

                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="more">
                    <a href="{{route('site.products')}}">{{__('content.View More Products')}}</a>
                </div>
            </div>
        </div>
        <div class="containers3">
            <div class="left-content"></div>
            <div class="right-content">
                <div class="item itm">
                    <div class="item-text">
                        <p>Home AGV17-150XC</p>
                        <h3>Grinders</h3>
                        <a href="#">Shop Now</a>
                    </div>
                </div>
                <div class="item2 itm">
                    <div class="item-text">
                        <p>Home AGV17-150XC</p>
                        <h3>Grinders</h3>
                        <a href="#">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container4">
            <div class="left-itm"></div>
            <div class="right-itm">
                <ul class="title">
                    <li class="activeLi2">
                        <a href="#">Special products</a>
                    </li>
                </ul>
                <div class="special_products">
                    <div class="img-box">
                        <a href="#"><img src="/assets/img/p.png" /></a>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('js')

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {});
    </script>
@endsection


