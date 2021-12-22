@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/register.css">
@endsection


@section('content')

    <div class="registerPage">
        <h4> Register</h4>
        <div>
            <p>
                <a href="{{route('site.index')}}"> {{__('content.home') }} </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <span> {{__('content.register')}} </span>
            </p>
        </div>
    </div>

    <div class="container_register">
        <form action="{{route('customer.register')}}" method="post">
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">{{__('content.name')}}</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            @csrf
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">{{__('content.surname')}}</label>
                    <input type="text" name="surname" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">{{__('content.phone_number')}}</label>
                    <input type="text" name="phone_number" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">{{__('content.email')}}</label>
                    <input type="email" name="email"  class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">{{__('content.password')}}</label>
                    <input type="text"  name="password" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">{{__('content.confirmPassword')}}</label>
                    <input type="text" name="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">{{__('content.adress')}}</label>
                    <input type="text" name="adress" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="btns">
                    <button type="button">Register</button>
                    <button type="button">Login</button>
                </div>
            </div>
        </form>
    </div>


@endsection


@section('js')
@endsection

