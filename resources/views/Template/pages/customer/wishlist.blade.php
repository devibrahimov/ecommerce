@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/wishlist.css">
@endsection


@section('content')


    <div class="wishlistPage">
        <h4> Список Желаний</h4>
        <div >
            <p>
                <a href="index.html"> Ana səhifə </a>
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
                    <th scope="col"></th>
                    <th scope="col">{{__('content.photo')}}</th>
                    <th scope="col">{{__('content.productname')}}</th>
                    <th scope="col">{{__('content.price')}}</th>
                    <th scope="col">{{__('content.instock')}}</th>

                </tr>
                </thead>
                <tbody>

                @foreach($wishlist as $wish)
                <tr>
{{--                    wishlistden cixardannnan sonra row u silmek --}}
                    <td scope="row">
                        <span  data-id="{{$wish->product->id}}" class="querytowishlist " ><i class="fas fa-times"></i></span>
                    </td>
                    <td>
                        <img src="{{$wish->product->imagepath}}"/>
                    </td>
                    <td><a href="{{route('site.productDetail',['id'=>$wish->product->id,'slug'=>\Illuminate\Support\Str::slug($wish->product->name)])}}"> {{$wish->product->name}}</a> </td>
                    <td>{{$wish->product->sale_price}} AZN</td>
                    <td>{{$wish->product->stock}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection


@section('js')
    <script>
        $(".querytowishlist").on('click', function(evt) {
            var link_data = $(this).data('id');
            var wishproduct = $(this) ;
            $.ajax({
                type: "GET",
                url: "{{route('customer.addtowishlist')}}",
                data: ({product_id: link_data}),
                success: function(data) {
                    wishproduct.parent().parent().remove();
                  //  $(this).remove();

                }
            });
        });
    </script>

@endsection

