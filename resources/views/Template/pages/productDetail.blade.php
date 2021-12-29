@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/productdetail.css">
    <link rel="stylesheet"  href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
            <h3>Последний Добавленный</h3>
            <ul class="left-item">
                <li>
                    <div class="left-img">
                        <img src=/assets"img/smallimg.jpg" />
                    </div>
                    <div class="right-text">
                        <p>4PCS HOOK + PICK SET -1PC</p>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <span><b>28</b>AZN</span>
                    </div>
                </li>
                <li>
                    <div class="left-img">
                        <img src=/assets"img/smallimg.jpg" />
                    </div>
                    <div class="right-text">
                        <p>4PCS HOOK + PICK SET -1PC</p>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <span><b>28</b>AZN</span>
                    </div>
                </li>
                <li>
                    <div class="left-img">
                        <img src=/assets"img/smallimg.jpg" />
                    </div>
                    <div class="right-text">
                        <p>4PCS HOOK + PICK SET -1PC</p>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <span><b>28</b>AZN</span>
                    </div>
                </li>
                <li>
                    <div class="left-img">
                        <img src=/assets"img/smallimg.jpg" />
                    </div>
                    <div class="right-text">
                        <p>4PCS HOOK + PICK SET -1PC</p>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <span><b>28</b>AZN</span>
                    </div>
                </li>
                <li>
                    <div class="left-img">
                        <img src=/assets"img/smallimg.jpg" />
                    </div>
                    <div class="right-text">
                        <p>4PCS HOOK + PICK SET -1PC</p>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <span><b>28</b>AZN</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="right-container">
            <div class="items">
                <div class="left-slider">
                    <div style="--swiper-navigation-color: #fff;  --swiper-pagination-color: #fff"
                         class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/assets/img/pp.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/assets/img/smallimg.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/assets/img/2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/assets/img/smallimg.jpg" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/assets/img/pp.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/assets/img/smallimg.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/assets/img/2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/assets/img/smallimg.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-about">
                    <h4>{{$product->name}} </h4>
                   <div>{!! $product->content !!}</div>
                    <p style="color:green"><i class="far fa-check-circle"></i> <span>1</span> in stock</p>
                    <p><i class="far fa-heart"></i>  add to wishlist</p>
                    <div class="Qty">Qty:
                        <button type="button">1</button>
                        <p>
                            <span><i class="fas fa-angle-up"></i></span>
                            <span><i class="fas fa-angle-down"></i></span>
                        </p>
                        <a>Add to Cart</a>
                    </div>
                    <p><b>Артикул:</b> 4932373387</p>
                    <p><b>Артикул:</b> 4932373387</p>
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
                    <p>There are no reviews yet.</p>
                    <p>Be The First To Review “AGV17-125XE ANGLE GRINDER IN2”</p>
                    <h4>Your email address will not be published. Required fields are marked *</h4>
                    <form>
                        <div class="form-row d-flex justify-content-between ">
                            <div class="col-md-5 ">
                                <label for="validationCustom01"> Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-5 ">
                                <label for="inputEmail4">Email</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Save my name, email, and website in this browser for the next time I comment.
                            </label>
                        </div>
                        <div class="rating">
                            <div class="rate ">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                        <div class="form_group">
                            <div class="form-tema">
                                <label for="exampleFormControlTextarea1" class="form-label">Your review *</label>
                                <textarea class="form-control" rows="7"></textarea>
                            </div>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
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
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
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
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/swiper.js"></script>
    <script src="/assets/js/jquery.js"></script>
@endsection
