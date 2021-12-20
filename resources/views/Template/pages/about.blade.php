@extends('Template.index')

@section('css')
@endsection


@section('content')


    <!-- Page Title -->
    <section class="page-title" style="background-image: url(/assets/images/backgrounds/page-header-bg.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{__('content.about')}}</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('site.index')}}">{{__('content.home')}}</a></li>
                    <li>{{__('content.about')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->








@endsection


@section('js')
@endsection
