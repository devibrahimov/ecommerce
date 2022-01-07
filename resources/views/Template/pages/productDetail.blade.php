@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/productdetail.css">
    <link rel="stylesheet"  href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        .mywish {
            color:#ed0b21 ;
        }


        .comment-Content{
            width:100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        .comment-Content .userImg{
            flex-basis:5%;
        }
        .userImg img{
            width:50px;
            height: 50px;
            object-fit: cover;
            object-position: center;
            margin-bottom: 20px;
        }
        .comment-Content .userText{
            flex-basis:92%;
            padding:15px;
            border:1px solid #ccc;
        }
        .userReview{
            margin-top: 20px !important;
        }
        .jquery-ratings-star{
            cursor: pointer;
            width:20px;
            height:20px;
        }

        .jquery-ratings-full{
            color:orange;
            width:20px;
            height:20px;
        }
    </style>
@endsection


@section('content')


    <div class="productdetailPage">
        <h4> {{__('content.products')}}</h4>
        <div>
            <p> <a href="{{route('site.index')}}"> {{__('content.home')}} </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <a href="{{route('site.index')}}"> {{__('content.home')}} </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <span> Список желаний </span>
            </p>
        </div>
    </div>
    <div class="containers">
        <div class="left-container">
           @include('Template.layouts.leftcontainer')
        </div>
        <div class="right-container">
            <div class="items">
                <div class="left-slider">
                    <div style="--swiper-navigation-color: #fff;  --swiper-pagination-color: #fff"
                         class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                        @foreach( $product->images  as $image)
                            <div class="swiper-slide">
                                <img src="{{$image->imagepath}}" />
                            </div>
                        @endforeach

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach( $product->images  as $image)
                                <div class="swiper-slide">
                                    <img src="{{$image->imagepath}}" />
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="product-about">
                    <h4>{{$product->name}}  </h4>
                    <div id="starRating">
                        {!! rateStars($product->id) !!}
                    </div>
                   <div>{!! $product->content !!}</div>
                    @auth('customer')
                    <p>
                        <i class="fas fa-heart  addtowishlist @auth('customer') {{hasmywishlist($product->id,auth('customer')->user()->id)==true?'mywish' :''}}  @endauth"data-id="{{$product->id}}"  ></i>

                        @if(hasmywishlist($product->id,auth('customer')->user()->id)==false)
                           <span class="wishcontent">  {{__('content.addtowishlist')}}</span>
                        @else
                           <span class="wishcontent"> {{__('content.removefromwishlist')}}</span>
                        @endif
                    </p>
                    @endauth
                   @auth('customer')
                   @if($product->stock > 0)
                    <p style="color:green"><i class="far fa-check-circle"></i> {{__('content.instock',['qty'=>$product->stock])}}   </p>

                    <div class="Qty">Qty:
                        <button type="button" class="quantity">1</button>
                        <p>
                            <span class="qtyUp"><i class="fas fa-angle-up"></i></span>
                            <span class="qtyDown"><i class="fas fa-angle-down"></i></span>
                        </p>
                        <a class="addtocart" data-quantity="1" data-id="{{$product->id}}">{{__('content.addtocart')}}</a>
                    </div>
                    @endif
                    @endauth
                    <p><b>SKU:</b> {{$product->sku}} </p>
                    <p><b>{{__('content.category')}}:</b> {{$product->category }}</p>
                </div>
            </div>
            <div class="comment">
                <div class="comment-up">
                    <ul class="ulList">
                        <li>
                            <a data-list="description" class="activeLi">{{__('content.description')}}</a>
                        </li>
                        <li>
                            <a data-list="reviews">Reviews (0)</a>
                        </li>
                    </ul>
                </div>
                <div class="description">
                    {!! $product->description !!}
                </div>
                <div class="reviews">
                    <h3>Reviews</h3>

                    @foreach($reviews as $comment)
                    <div class="comment-Content">
                        <div class="userImg">
                            <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" />
                        </div>
                        <div class="userText">
                            <div id="starRating">
                                @for($i = 1; $i<=5;$i++)
                                <span class="jquery-ratings-star {{ $i<= $comment->rate ? 'jquery-ratings-full':''}} "  style="font-size:100%;">&starf;</span>
                                @endfor
                            </div>


                            <h3 class="userReview">{{$comment->customer->name.' '. $comment->customer->surname}}</h3>
                            <div class="description-user">

                                <p>{{$comment->comment}}</p>

                                @if($comment->feedback != null)
                                <div class="comment-Content">
                                    <div class="userImg">
                                        <img  src="https://media.istockphoto.com/vectors/faces-avatars-icons-user-avatar-customer-service-icon-business-avatar-vector-id1126551708"/>
                                    </div>
                                    <div class="userText">
                                        <h3 class="userReview">Protool Admin</h3>
                                        <div class="description-user">
                                            <p>{{$comment->feedback}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <p>There are no reviews yet.</p>
                    <p>Be The First To Review “AGV17-125XE ANGLE GRINDER IN2”</p>
                    <h4>Your email address will not be published. Required fields are marked *</h4>
                    @auth('customer')
                    <form action="{{route('customer.productComment')}}" method="post" >
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}" >
                        <div class="form_group">
                            <div class="form-tema">
                                <label   class="form-label">{{auth('customer')->user()->name . ' ' .auth('customer')->user()->surname}} *</label>

                                <div id="starRating" style="padding:10px 15px 10px 15px;margin-bottom: 10px;border:1px solid  #adadad ; width: 170px">
                                    <label class="jquery-ratings-star  star-rated  " style="font-size:100%;">&starf;
                                        <input type="radio"name="rate" value="1" required style="display:none" >
                                    </label>
                                    <label class="jquery-ratings-star star-rated " style="font-size:100%;">&starf;
                                        <input type="radio" name="rate" value="2" required style="display:none" >
                                    </label>
                                    <label class="jquery-ratings-star star-rated " style="font-size:100%;">&starf;
                                        <input type="radio"name="rate" value="3" required style="display:none" >
                                    </label>
                                    <label class="jquery-ratings-star star-rated " style="font-size:100%;">&starf;
                                        <input type="radio" name="rate" value="4" required style="display:none" >
                                    </label>
                                    <label class="jquery-ratings-star star-rated " style="font-size:100%;">&starf;
                                        <input type="radio" name="rate" value="5"  required   style="display:none" >
                                    </label>
                                </div>
                                <textarea class="form-control" name="comment" rows="7"></textarea>
                            </div>
                        </div>
                        <button type="submit">{{__('content.send')}}</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <div class="Related-products">
        <ul class="title">
            <li class="activeLi2">
                <a href="#">Related products</a>
            </li>
        </ul>
    </div>

    <div class="product-slide">
        <div class="left-empty"> </div>
        <div class="slider-down">
            <div class="swiper  mySwiper3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <img class="card-img-top" src="/assets/img/smallimg.jpg" alt="Card image">
                            <img class="card-img-top2" src="/assets/img/2.jpg" alt="Card image">
                            <ul class="butons">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li class="eye"><a><i class="far fa-eye"></i></a></li>
                                <li class="compareOpen"><a><i class="fas fa-bars"></i></a></li>
                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                            </ul>
                            <div class="soldout">
                                <span>SATILIB</span>
                            </div>
                            <div class="card-body">
                                <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                                <div id="starRating">
                                    <span  class="jquery-ratings-star  jquery-ratings-full"  style="font-size:100%;" >&starf;</span>
                                    <span  class="jquery-ratings-star  jquery-ratings-full"  style="font-size:100%" >&starf;</span>
                                    <span  class="jquery-ratings-star  jquery-ratings-full"  style="font-size:100%;" >&starf;</span>
                                    <span  class="jquery-ratings-star  " style="font-size:100%;" >&starf;</span>
                                    <span  class="jquery-ratings-star  " style="font-size:100%;">&starf;</span>
                                </div>
                                <p class="card-text"><span>28</span>AZN</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img class="card-img-top" src="/assets/img/2.jpg" alt="Card image">
                            <img class="card-img-top2" src="/assets/img/smallimg.jpg" alt="Card image">
                            <ul class="butons">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li class="eye"><a><i class="far fa-eye"></i></a></li>
                                <li><a href="#"><i class="fas fa-bars"></i></a></li>
                                <li><a class="addtocart" data-quantity="1"><i class="fas fa-shopping-cart"></i></a></li>
                            </ul>
                            <div class="card-body">
                                <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                                <p class="card-text"><span>28</span>AZN</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img class="card-img-top" src="/assets/img/2.jpg" alt="Card image">
                            <img class="card-img-top2" src="/assets/img/smallimg.jpg" alt="Card image">
                            <ul class="butons">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li class="eye"><a><i class="far fa-eye"></i></a></li>
                                <li><a href="#"><i class="fas fa-bars"></i></a></li>
                                <li><a class="addtocart" data-quantity="3"><i class="fas fa-shopping-cart"></i></a></li>
                            </ul>
                            <div class="card-body">
                                <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                                <p class="card-text"><span>28</span>AZN</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img class="card-img-top" src="/assets/img/2.jpg" alt="Card image">
                            <img class="card-img-top2" src="/assets/img/smallimg.jpg" alt="Card image">
                            <ul class="butons">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li class="eye"><a><i class="far fa-eye"></i></a></li>
                                <li><a href="#"><i class="fas fa-bars"></i></a></li>
                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                            </ul>
                            <div class="card-body">
                                <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                                <p class="card-text"><span>28</span>AZN</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img class="card-img-top" src="/assets/img/2.jpg" alt="Card image">
                            <img class="card-img-top2" src="/assets/img/smallimg.jpg" alt="Card image">
                            <ul class="butons">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li class="eye"><a><i class="far fa-eye"></i></a></li>
                                <li><a href="#"><i class="fas fa-bars"></i></a></li>
                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                            </ul>
                            <div class="card-body">
                                <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                                <p class="card-text"><span>28</span>AZN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> -->
            </div>
        </div>
    </div>


@endsection




@section('js')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/js/swiper.js"></script>

    <script>

        let quantity = $('.quantity');



        $('.qtyDown').on('click',function (e) {

            if(parseInt(quantity.text())>1){
                qty = parseInt(quantity.text())-1
                quantity.text(qty)
                let etarget=$(e.currentTarget).parent().parent().children(".addtocart");
                dataquantity = parseInt(etarget.attr('data-quantity'))-1;
                etarget.attr('data-quantity',dataquantity)
                daity =  etarget.attr('data-quantity');
                console.log(daity)

            }else{
                alert(quantity.text())
            }

        })


        $('.qtyUp').on('click',function (e){

            qty = parseInt(quantity.text())+1
            quantity.text(qty)
            let etarget=$(e.currentTarget).parent().parent().children(".addtocart");
            dataquantity = parseInt(etarget.attr('data-quantity'))+1;
            etarget.attr('data-quantity',dataquantity)
            daity =  etarget.attr('data-quantity');
            console.log(daity)

        });

   $(".rate label").on("click",function (e){
       e.preventDefault()
       console.log(e.target.getAttribute('data-typeId'));

   })
        $('.star-rated').click(function(){
            $('.jquery-ratings-star').removeClass('jquery-ratings-full');
            $(this).prevAll().addBack().addClass('jquery-ratings-full');
        });

    </script>
@endsection
