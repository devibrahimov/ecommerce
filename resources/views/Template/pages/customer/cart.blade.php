@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/viewcart.css">
    <link rel="stylesheet"  href="https://unpkg.com/swiper/swiper-bundle.min.css" />

@endsection


@section('content')


    <div class="viewCartPage">
        <h4> {{__('content.products')}}</h4>
        <div>
            <p> <a href="{{route('site.index')}}"> {{__('content.home')}} </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <span>{{__('content.cart')}}</span>
            </p>
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
            <table class="table table-wish">
                <thead>
                <tr>
                    <th scope="col">remove</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td scope="row">
                        <span><i class="fas fa-times"></i></span>
                    </td>
                    <td>
                        <img src="./img/c3.jpg" />
                    </td>
                    <td>1/4” 50pc Drive Ratchet & Socket Set Metric Imperial</td>
                    <td>190AZN</td>
                    <td class="qty">
                        <button type="button">1</button>
                        <p>
                            <span><i class="fas fa-angle-up"></i></span>
                            <span><i class="fas fa-angle-down"></i></span>
                        </p>
                    </td>
                    <td>190AZN</td>
                </tr>
                </tbody>
            </table>
            <div class="cartTotal">
                <h3>Cart totals</h3>
                <div class="total">
                    <div class="totalItem">
                        <div class="left-total">Subtotal</div>
                        <div class="right-total"><span>190</span>AZN</div>
                    </div>
                </div>
                <div class="total">
                    <div class="totalItem">
                        <div class="left-total">Total</div>
                        <div class="right-total"><span>190</span>AZN</div>
                    </div>
                </div>
                <div class="total">
                    <a href="#">Proceed to checkout</a>
                </div>
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


        $('.qtyUp').on('click',function (e) {
            qty = parseInt(quantity.text())+1
            quantity.text(qty)
            let etarget=$(e.currentTarget).parent().parent().children(".addtocart");
            dataquantity = parseInt(etarget.attr('data-quantity'))+1;
            etarget.attr('data-quantity',dataquantity)
            daity =  etarget.attr('data-quantity');
            console.log(daity)

        });






    </script>
@endsection
