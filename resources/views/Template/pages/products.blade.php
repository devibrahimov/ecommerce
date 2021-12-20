@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/products.css">
@endsection


@section('content')


    <div class="productPage">
        <h4> {{$category->name}}</h4>
        <div >
            <p>
                <a href="{{route('site.index')}}"> {{__('content.home') }} </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <span>{{__('content.products')}} </span>
            </p>

            <select class="form-select" aria-label="Default select example">
                <option selected>Сортировка по умолчанию</option>
                <option value="1">Сортировать по популярности</option>
                <option value="2">Сортировать по последнему</option>
                <option value="3">Сортировать по последнему</option>
            </select>

        </div>
    </div>

    <div class="containers">
        <div class="left-container">
            <h3>Последний Добавленный</h3>
            <ul class="left-item">
                <li>
                    <div class="left-img">
                        <img src="img/smallimg.jpg" />
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
                        <img src="img/smallimg.jpg" />
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
                        <img src="img/smallimg.jpg" />
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
                        <img src="img/smallimg.jpg" />
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
                        <img src="img/smallimg.jpg" />
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
            <div class="container-products">
                <div class="card">
                    <img class="card-img-top" src="./img/smallimg.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/2.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <a class="soldout" href="productdetail.html">
                        <span>SATILIB</span>
                    </a>
                    <div class="card-body " >
                        <p class="card-text"> 4PCS HOOK + PICK SET -1PC </p>
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
                    <img class="card-img-top" src="./img/smallimg.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/2.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <div class="card-body">
                        <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                        <p class="card-text"><span>28</span>AZN</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="./img/2.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/smallimg.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a><i class="fas fa-compress-alt"></i></a></li>
                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <div class="card-body">
                        <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                        <p class="card-text"><span>28</span>AZN</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="./img/smallimg.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/2.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <div class="card-body">
                        <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                        <p class="card-text"><span>28</span>AZN</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="./img/smallimg.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/smallimg.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <div class="card-body">
                        <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                        <p class="card-text"><span>28</span>AZN</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="./img/smallimg.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/smallimg.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <div class="card-body">
                        <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                        <p class="card-text"><span>28</span>AZN</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="./img/2.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/smallimg.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <div class="card-body">
                        <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                        <p class="card-text"><span>28</span>AZN</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="./img/2.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/smallimg.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
                        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                    <div class="card-body">
                        <p class="card-text">4PCS HOOK + PICK SET -1PC</p>
                        <p class="card-text"><span>28</span>AZN</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="./img/smallimg.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/2.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
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
                    <img class="card-img-top" src="./img/smallimg.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/2.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
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
                    <img class="card-img-top" src="./img/smallimg.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/2.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
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
                    <img class="card-img-top" src="./img/smallimg.jpg" alt="Card image">
                    <img class="card-img-top2" src="./img/2.jpg" alt="Card image">
                    <ul class="butons">
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li class="eye"><a><i class="far fa-eye"></i></a></li>
                        <li class="compareOpen"><a ><i class="fas fa-compress-alt"></i></a></li>
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
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

@endsection


@section('js')
@endsection
