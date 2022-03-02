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
            <div class="dashboard">
                <h3>{{__('content.hello',['username' => \auth('customer')->user()->name])}} </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente error illum obcaecati at
                    exercitationem tenetur suscipit mollitia neque cupiditate cumque. Exercitationem aliquam maiores
                    aspernatur nesciunt.</p>
            </div>
            <div class="orders">
                <h3>Your Orders</h3>
                <div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>March 15, 2020</td>
                            <td>Processing</td>
                            <td>$<span>125 </span> for <span>2</span> item</td>
                            <td><a href="#">View</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>March 15, 2020</td>
                            <td>Processing</td>
                            <td>$<span>125 </span> for <span>2</span> item</td>
                            <td><a href="#">View</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="password">
                <h3>sifre yenile</h3>
                <form action="{{route('passwordupdate')}}" method="post" name="passwdupdate" >
                        @csrf
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">{{__('content.password')}}</label>
                            <input type="password" class="form-control" name="oldpassword">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">{{__('content.newpassword')}}</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">{{__('content.confirmPassword')}}</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form_group">
                        <button type="submit" name="passwdupdate">{{__('content.changepassword')}}</button>
                    </div>
                 </form>
            </div>
            <div class="account">
                <h3>Account Details</h3>
                <form action="{{route('accountupdate')}}" method="post" name="account" >
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">{{__('content.name')}}</label>
                            <input type="text" class="form-control" name="name" required value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">{{__('content.surname')}}</label>
                            <input type="text" class="form-control" name="surname" required value="{{$user->surname}}">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">{{__('content.phone_number')}}</label>
                            <input type="text" class="form-control" name="phone_number" required value="{{$user->phone_number}}">
                        </div>
                    </div>

                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlTextarea1" class="form-label">{{__('content.address')}}</label>
                            <textarea class="form-control" rows="6" name="adress" required >{{$user->adress}}</textarea>
                        </div>
                    </div>

                    @csrf

                    <div class="form_group">
                        <button  type="submit" name="account">Save change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


@section('js')
@endsection

