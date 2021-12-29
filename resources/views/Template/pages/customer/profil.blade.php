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
        <div class="left_itm">
            <div class="profil-box">
                <a  data-list="Dashboard" class="activeList"><i class="fas fa-home"></i> Dashboard </a>
            </div>
            <div class="profil-box">
                <a  data-list="Orders"><i class="fas fa-shopping-bag"></i> Orders</a>
            </div>

            <div class="profil-box">
                <a  data-list="sifre"><i class="fas fa-edit"></i>  sifre yenile    </a>
            </div>
            <div class="profil-box">
                <a  data-list="Account"><i class="fas fa-user"></i> Account details </a>
            </div>
            <div class="profil-box">
                <a href="#" ><i class="fas fa-shopping-cart"></i> cart </a>
            </div>
            <div class="profil-box">
                <a href="{{route('customer.wishlist')}}" ><i class="fas fa-heart"></i> {{__('content.wishlist')}} </a>
            </div>
            <div class="profil-box">
                <a  data-list="Logout"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </div>
        </div>
        <div class="right_itm">
            <div class="dashboard">
                <h3>Hello Beyler!</h3>
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
                <form>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">password</label>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">password</label>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">password</label>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form_group">
                        <button type="button">Save change</button>
                    </div>
                </form>
            </div>
            <div class="account">
                <h3>Account Details</h3>
                <form>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">password</label>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlInput1" class="form-label">password</label>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="form-tema">
                            <label for="exampleFormControlTextarea1" class="form-label">Mesajınız (istəyə
                                görə)</label>
                            <textarea class="form-control" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="form_group">
                        <button type="button">Save change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


@section('js')
@endsection

