@extends('Template.index')

@section('css')
    <link rel="stylesheet" href="/assets/css/register.css">
@endsection


@section('content')

    <div class="registerPage">
        <h4> Register</h4>
        <div>
            <p>
                <a href="index.html"> Ana səhifə </a>
                <span> <i class="fas fa-angle-double-right"></i> </span>
                <span> Register </span>
            </p>
        </div>
    </div>
    <div class="container_register">
        <form>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">Имя пользователя</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">Имя</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">Фамилия</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">Адрес эл-почты</label>
                    <input type="email" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">Пароль</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form_group">
                <div class="form-tema">
                    <label for="exampleFormControlInput1" class="form-label">Confirm Пароль</label>
                    <input type="text" class="form-control">
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

