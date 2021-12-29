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
                <h3>Last added</h3>
                <ul class="left-item">
                    <li>
                        <div class="left-img">
                            <img src="/assets/img/smallimg.jpg" />
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
                            <img src="/assets/img/smallimg.jpg" />
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
                            <img src="/assets/img/smallimg.jpg" />
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
                            <img src="/assets/img/smallimg.jpg" />
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
                            <img src="/assets/img/smallimg.jpg" />
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
                            <img src="/assets/img/smallimg.jpg" />
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
                            <img src="/assets/img/smallimg.jpg" />
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
                    <div class="card">
                        <img class="card-img-top" src="/assets/img/smallimg.jpg" alt="Card image">
                        <img class="card-img-top2" src="/assets/img/2.jpg" alt="Card image">
                        <ul class="butons">
                            <li><a href="#"><i class="fas fa-undo-alt"></i></a></li>
                            <li class="eye"><a><i class="far fa-eye"></i></a></li>
                            <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
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
                    <div class="card">
                        <img class="card-img-top" src="/assets/img/smallimg.jpg" alt="Card image">
                        <img class="card-img-top2" src="/assets/img/2.jpg" alt="Card image">
                        <ul class="butons">
                            <li><a href="#"><i class="fas fa-undo-alt"></i></a></li>
                            <li class="eye"><a><i class="far fa-eye"></i></a></li>
                            <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
                            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
                        <div class="soldout">
                            <span>SATILIB</span>
                        </div>
                        <div class="card-body">
                            <p class="card-text">4PCSgfgb fddfb HOOK + PICK SET -1PC</p>
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
                    <div class="card">
                        <img class="card-img-top" src="/assets/img/2.jpg" alt="Card image">
                        <img class="card-img-top2" src="/assets/img/smallimg.jpg" alt="Card image">
                        <ul class="butons">
                            <li><a href="#"><i class="fas fa-undo-alt"></i></a></li>
                            <li class="eye"><a><i class="far fa-eye"></i></a></li>
                            <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
                            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
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
                    <div class="card">
                        <img class="card-img-top" src="/assets/img/smallimg.jpg" alt="Card image">
                        <img class="card-img-top2" src="/assets/img/2.jpg" alt="Card image">
                        <ul class="butons">
                            <li><a href="#"><i class="fas fa-undo-alt"></i></a></li>
                            <li class="eye"><a><i class="far fa-eye"></i></a></li>
                            <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
                            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
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
                    <div class="card">
                        <img class="card-img-top" src="/assets/img/smallimg.jpg" alt="Card image">
                        <img class="card-img-top2" src="/assets/img/smallimg.jpg" alt="Card image">
                        <ul class="butons">
                            <li><a href="#"><i class="fas fa-undo-alt"></i></a></li>
                            <li class="eye"><a><i class="far fa-eye"></i></a></li>
                            <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
                            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
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
                    <div class="card">
                        <img class="card-img-top" src="/assets/img/smallimg.jpg" alt="Card image">
                        <img class="card-img-top2" src="/assets/img/smallimg.jpg" alt="Card image">
                        <ul class="butons">
                            <li><a href="#"><i class="fas fa-undo-alt"></i></a></li>
                            <li class="eye"><a><i class="far fa-eye"></i></a></li>
                            <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
                            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
                        <div class="card-body">
                            <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                            <div class="rate">
                                <input type="radio" id="star5" n ame="rate" value="5" />
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
                    <div class="card">
                        <img class="card-img-top" src="/assets/img/2.jpg" alt="Card image">
                        <img class="card-img-top2" src="/assets/img/smallimg.jpg" alt="Card image">
                        <ul class="butons">
                            <li><a href="#"><i class="fas fa-undo-alt"></i></a></li>
                            <li class="eye"><a><i class="far fa-eye"></i></a></li>
                            <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
                            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
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
                    <div class="card">
                        <img class="card-img-top" src="/assets/img/2.jpg" alt="Card image">
                        <img class="card-img-top2" src="/assets/img/smallimg.jpg" alt="Card image">
                        <ul class="butons">
                            <li><a href="#"><i class="fas fa-undo-alt"></i></a></li>
                            <li class="eye"><a><i class="far fa-eye"></i></a></li>
                            <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
                            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
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
                <div class="more">
                    <button type="button">View More Products</button>
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


