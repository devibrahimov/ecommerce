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
            @include('Template.layouts.leftcontainer')
        </div>
        <div class="right-container">
            @if(!$cartproducts->isEmpty())
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
                <tbody class="carttablelist">
                @php $totalPrice = 0; @endphp

                @foreach($cartproducts as $item)
                <tr>
                    <td scope="row">
                        <span class="removeFromCart" data-id="{{$item->cart_id}}" ><i class="fas fa-times"></i></span>
                    </td>
                    <td>  <img src="{{$item->imagepath}}"/> </td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->sale_price}} AZN</td>
                    <td class="qty" data-cartid="{{$item->cart_id}}">
                        <button type="button" class="quantity">{{$item->quantity}}</button>
                        <p>
                            <span class="qtyUp"   ><i class="fas fa-angle-up"></i></span>
                            <span class="qtyDown" ><i class="fas fa-angle-down"></i></span>
                        </p>
                    </td>

                    @php $subtotal = $item->quantity * floatval($item->sale_price);
                        $totalPrice +=$subtotal @endphp
                    <td class="subtotalTD" > <span class="subtotal">{{$subtotal}} </span> AZN</td>
                </tr>
                @endforeach

                </tbody>
            </table>
            <div class="cartTotal">
{{--                <h3>Cart totals</h3>--}}
{{--                <div class="total">--}}
{{--                    <div class="totalItem">--}}
{{--                        <div class="left-total">Subtotal</div>--}}
{{--                        <div class="right-total"><span class="subtotalPrices">{{$totalPrice}}</span> AZN</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="total">--}}
{{--                    <div class="totalItem">--}}
{{--                        <div class="left-total">ƏDV  (18%)</div>--}}
{{--                        <div class="right-total"><span class="totalPricesEDV"> {{$totalPrice*0.18}}</span> AZN</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="total">--}}
{{--                    <div class="totalItem">--}}
{{--                        <div class="left-total">Total</div>--}}
{{--                        <div class="right-total"><span class="totalPrices"> {{ $totalPrice+($totalPrice*0.18) }}</span> AZN</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="total">
                    <a href="{{route('customer.checkout')}}">{{__('content.go to payment')}}</a>
                </div>
            </div>
            @else
            <center>Səbətə hansısa məhsul yükləməmisiniz.buradan <a href="{{route('site.products')}}">{{__('content.products')}}</a> səhifəsinə keçid edin</center>
            @endif
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
