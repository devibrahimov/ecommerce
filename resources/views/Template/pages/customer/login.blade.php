@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/login.css">
@endsection


@section('content')

    <div class="loginPage">
        <h4> Login</h4>
        <div>
            <p>
                <a href="index.html"> Ana səhifə </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <span> Login </span>
            </p>
        </div>
    </div>
    <div class="container_login">
        <form method="post" action="{{route('customer.login')}}">
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">{{__('content.email')}}
                    </label>
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">{{__('content.password')}}</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            @csrf
{{--            <div class="form-check">--}}
{{--                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">--}}
{{--                <label class="form-check-label" for="invalidCheck">--}}
{{--                    Keep me signed in--}}
{{--                </label>--}}
{{--            </div>--}}
            <div class="form_group">
                <div class="btns">
                    <button type="button">Register</button>
                    <button type="submit">{{__('content.login')}}</button>
                </div>
            </div>
            <div class="form_group">
                <a href="#">Forgot your password?	</a>
            </div>
        </form>
    </div>


@endsection


@section('js')
@endsection

