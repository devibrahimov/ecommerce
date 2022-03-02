@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/profile.css">
@endsection


@section('content')


    <div class="profilePage">
        <h4> Profil</h4>
        <div>
            <p>
                <a href="index.html"> Ana səhifə </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <span> Profil </span>
            </p>
        </div>
    </div>

    <div class="containers-Profil">
     @include('Template.pages.customer.leftbar')
        <div class="right_itm">
            @if(!$orders->isEmpty())
            <div>
                <h3>Sifarişləriniz</h3>
                <div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Sifariş nömrəsi</th>
                            <th scope="col">Tarix</th>
                            <th scope="col">Sifarişin Statusu</th>
                            <th scope="col">Ödənilən Tutar</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->payment_order_id}}</td>
                            <td>{{$order->created_at->format(' d.M.Y')}}</td>
                            <td>Processing {{$order->status}}</td>
                            <td>$<span>{{$order->amount}}</span> </td>
                            <td><a href="{{route('customer.invoice',$order->payment_order_id)}}"> <i class="fas fa-eye"> </i> </a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @else
            <center>Sizin  Sifariş keçmişiniz yoxdur. Buradan <a href="{{route('site.products')}}">{{__('content.products')}}</a> səhifəsinə keçid edin</center>
            @endif
        </div>
    </div>

@endsection


@section('js')

@endsection
