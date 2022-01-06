
@php
$products = randomproductslist();
@endphp

<h3>{{__('content.otherProducts')}}</h3>
<ul class="left-item">
    @foreach($products as $product)
    <li>
        <div class="left-img">
            <img src="{{$product->imagepath}}"  />
        </div>
        <div class="right-text">
            <p><a href="">{{$product->name}}</a></p>
            <div id="starRating">
                {!! rateStars($product->id) !!}

            </div>

            <span><b>{{$product->sale_price}}</b>AZN</span>
        </div>
    </li>
    @endforeach
</ul>
