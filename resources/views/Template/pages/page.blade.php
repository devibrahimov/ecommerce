@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/about.css">
@endsection


@section('content')

 <div class="aboutPage">
     <p>
         <a href="{{route('site.index')}}"> {{__('content.home') }} </a>
         <span> <i class="fas fa-angle-double-right"></i> </span>
         <span> {{$service->name}} </span>
     </p>
 </div>
 <div class="container-one">
     <div class="item_background" style="background-image:url('{{$service->image}}') " >
     </div>
 </div>
 <div class="containers3">
     <div class="right-content">
         {!! $service->content !!}
     </div>
 </div>



@endsection


@section('js')
@endsection

