@extends('Template.index')

@section('css')

    <link rel="stylesheet" href="/assets/css/Checkout.css">
    <link rel="stylesheet"  href="https://unpkg.com/swiper/swiper-bundle.min.css" />

@endsection


@section('content')


    <div class="CheckoutPage">
        <h4> Checkout</h4>
        <div>
            <p>
                <a href="index.html"> Ana səhifə </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <span> Checkout </span>
            </p>
        </div>
    </div>
    <div class="containers">
        <div class="left-container">
            @include('Template.layouts.leftcontainer')
        </div>
        <div class="right-container">
            <form action="{{route('customer.shipping')}}" >
            <div class="forms-checkout">
                <div class="left_form ">
                    <h4>Billing details</h4>

                        <div class="form_group">
                            <div class="left-input">
                                <label for="exampleFormControlInput1" class="form-label">Ad</label>
                                <input type="text" name="name" class="form-control" value="{{auth('customer')->user()->name}}" >
                            </div>
                            <div class="right-input">
                                <label for="exampleFormControlInput1" class="form-label">Soyad</label>
                                <input type="text" class="form-control" name="surname"  value="{{auth('customer')->user()->surname}}" >
                            </div>
                        </div>
                        <div class="form_group">
                            <div class="form-tema">
                                <label for="exampleFormControlInput1" class="form-label">Adres</label>
                                <input type="text" class="form-control"  name="adress"  value="{{auth('customer')->user()->adress}}" >
                            </div>
                        </div>

                        <div class="form_group">
                            <div class="form-tema">
                                <label for="exampleFormControlInput1" class="form-label">phone</label>
                                <input type="text" class="form-control" name="phone"   value="{{auth('customer')->user()->phone_number}}">
                            </div>
                        </div>
                        <div class="form_group">
                            <div class="form-tema">
                                <label for="exampleFormControlInput1" class="form-label">email</label>
                                <input type="email" class="form-control" name="email"  value="{{auth('customer')->user()->email}}">
                            </div>
                        </div>

                </div>
{{--                <div class="right_form">--}}
{{--                    <h4>add info</h4>--}}
{{--                    <div class="form_group">--}}
{{--                        <div class="form-tema">--}}
{{--                            <label for="exampleFormControlTextarea1" class="form-label">Mesajınız (istəyə--}}
{{--                                görə)</label>--}}
{{--                            <textarea class="form-control"  name="message"  rows="6" ></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="container_order">
                <h4>your order</h4>
                <table class="table table-wish">
                    <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody class="carttablelist">
                    @php $totalPrice = 0; @endphp
                    @foreach($cartproducts as $item)
                        <tr>

                            <td>{{$item->name}}</td>
                            <td>{{$item->sale_price}} AZN</td>

                            @php $subtotal = $item->quantity * floatval($item->sale_price);
                        $totalPrice +=$subtotal @endphp
                            <td class="subtotalTD" > <span class="subtotal">{{$subtotal}} </span> AZN</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="cartTotal">
                    <h3>Cart totals</h3>
                    <div class="total">
                        <div class="totalItem">
                            <div class="left-total">Toplam məbləğ</div>
                            <div class="right-total"><span class="subtotalPrices">{{$totalPrice}}</span> AZN</div>
                        </div>
                    </div>
                    <div class="total">
                        <div class="totalItem">
                            <div class="left-total">ƏDV  (18%)</div>
                            <div class="right-total"><span class="totalPricesEDV"> {{$totalPrice*0.18}}</span> AZN</div>
                        </div>
                    </div>
                    <div class="total">
                        <div class="totalItem">
                            <div class="left-total">Ödəniləcək toplam məbləğ</div>
                            <div class="right-total"><span class="totalPrices"> {{ $totalPrice+($totalPrice*0.18) }}</span> AZN</div>
                        </div>
                    </div>
                    @php
                    \Illuminate\Support\Facades\Session::put('total_Price',$totalPrice+($totalPrice*0.18))
                    @endphp


                </div>
            </div>
            <div class="bank">
                <ul>
                    <p>Kapital Bank</p>
                    <li>
                        <a>Pay with Kapital Bank</a>
                    </li>
                </ul>
                <p>Your personal data will be used to process your order, support experience throughout this website and for other purpose described in our privacy policy</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Save my name, email, and website in this browser for the next time I comment.
                    </label>
                </div>
            </div>
            <div class="check-btn">
                <div class="total">
                    <button type="submit">Ödəməyə Keçid edin </button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection


@section('js')

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/js/swiper.js"></script>
    <script>

        $('.qtyDown').on('click',function (e) {

            let quantitydata = $(this).parent().parent().children('.quantity');

            quantityText =quantitydata.text()
            quantity= parseInt(quantityText)
            quantity-=1;
            quantitydata.text(quantity)
            let cart_id = $(this).parent().parent().attr('data-cartid');
            // console.log(quantity) ;
            // console.log(cart_id) ;

            $.ajax({
                type: "GET",
                url: "{{route('customer.updatequantity')}}",
                data: ({cart_id: cart_id , quantity:quantity }),
                success: function(data){
                    let ata = e.currentTarget.parentElement.parentElement.nextElementSibling.children[0]
                    ata.innerText = parseFloat(data.subtotal).toFixed(2)

                    $('.subtotalPrices').html(data.subtotalPrices)
                    $('.totalPricesEDV').html(data.totalPricesEDV)
                    $('.totalPrices').html(data.totalPrices)
                }
            });

        })



        function  getmycartlist() {
            $('.opencartitems').html('')
            $('.carttablelist').html('')

            $('.subtotalPrices').html(0)
            $('.totalPricesEDV').html(0)
            $('.totalPrices').html(0)

            $.getJSON( "{{route('customer.getmycart')}}", function(data) {

                let   totalprice = 0 ;
                let   subtotalPrices = 0 ;
                let   totalPricesEDV = 0 ;
                let   totalPrices = 0 ;

                $.each(data, function(i,item){
                    totalprice+=data[i].quantity* parseFloat(data[i].sale_price) ;

                    let cartproducts = '<div class="cartItem"> '+
                        ' <div class="openLeftImg"> '+
                        '     <img src="'+item.imagepath+'" /> '+
                        ' </div> '+
                        '<div class="openRightText"> '+
                        '     <p>'+data[i].name+' </p> '+
                        '     <p><span>'+data[i].quantity+'</span> x <span>'+  parseFloat(data[i].sale_price).toFixed(2)  +'</span> AZN</p>' +
                        ' </div>' +
                        ' <div   > '+
                        '     <span class="cartremove" data-id="'+data[i].cart_id+'" ><i class="fas fa-times"></i></span> '+
                        ' </div>' +
                        '</div>';

                    $('.opencartitems').append(cartproducts)
                    $('.opencartTotalPrice').html(totalprice.toFixed(2))


                    let carttablelist = '  <tr>'+
                        '  <td scope="row">'+
                        '      <span class="removeFromCart" data-id="'+data[i].cart_id+'" ><i class="fas fa-times"></i></span>'+
                        '  </td>'+
                        '  <td>'+
                        '      <img src="'+item.imagepath+'" />'+
                        '  </td>'+
                        ' <td>'+data[i].name+'</td>'+
                        ' <td> '+data[i].sale_price+' AZN</td>'+
                        '  <td class="qty">'+
                        '      <button type="button">'+data[i].quantity+'</button>'+
                        '      <p>'+
                        '          <span><i class="fas fa-angle-up"></i></span>'+
                        '          <span><i class="fas fa-angle-down"></i></span>'+
                        '      </p>'+
                        '  </td>'+
                        '  <td> '+  (parseFloat(data[i].sale_price)*data[i].quantity).toFixed(2)  +'  AZN</td>'+
                        '  </tr>';

                    $('.carttablelist').append(carttablelist)

                    subtotalPrices+= (parseFloat(data[i].sale_price)*data[i].quantity) ;
                    totalPricesEDV+=( parseFloat(data[i].sale_price)*data[i].quantity)*0.18;
                    totalPrices += ((parseFloat(data[i].sale_price)*data[i].quantity)*0.18)+( parseFloat(data[i].sale_price)*data[i].quantity );


                });

                $('.subtotalPrices').html(subtotalPrices.toFixed(2))
                $('.totalPricesEDV').html(totalPricesEDV.toFixed(2))
                $('.totalPrices').html(totalPrices.toFixed(2))
            });
        }

        $(document).on('click','.removeFromCart',function (){
            let prid =  $(this).attr('data-id');

            $.ajax({
                type: "GET",
                url: "{{route('customer.removefromcart')}}",
                data: ({id: prid }),
                success: function(data) {
                    data = JSON.parse(data);

                    swal({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        button: data.button,
                    });

                    getmycartlist()

                }
            });
        });


        $('.qtyUp').on('click',function (e) {

            let quantitydata = $(this).parent().parent().children('.quantity');

            quantityText =quantitydata.text()
            quantity= parseInt(quantityText)
            quantity+=1;
            quantitydata.text(quantity)
            let cart_id = $(this).parent().parent().attr('data-cartid');

            $.ajax({
                type: "GET",
                url: "{{route('customer.updatequantity')}}",
                data: ({cart_id: cart_id , quantity:quantity }),
                success: function(data){
                    let ata = e.currentTarget.parentElement.parentElement.nextElementSibling.children[0]
                    ata.innerText = parseFloat(data.subtotal).toFixed(2)

                    $('.subtotalPrices').html(data.subtotalPrices)
                    $('.totalPricesEDV').html(data.totalPricesEDV)
                    $('.totalPrices').html(data.totalPrices)
                }
            });

        });
    </script>
@endsection
