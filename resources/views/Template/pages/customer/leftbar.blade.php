<div class="left_itm">

    <div class="profil-box">
        <a  data-list="Dashboard" ><i class="fas fa-home"></i> Profil </a>
    </div>

    <div class="profil-box">
        <a  href="{{route('customer.myorders')}}" class="activeList"><i class="fas fa-shopping-bag"> </i> {{__('content.orders')}}</a>
    </div>

    <div class="profil-box">
        <a  data-list="sifre"><i class="fas fa-edit"></i> Şifre yenilə </a>
    </div>

    <div class="profil-box">
        <a  data-list="Account"><i class="fas fa-user"></i>{{__('content.userAccount')}}</a>
    </div>

    <div class="profil-box">
        <a href="{{route('customer.mycartpage')}}" ><i class="fas fa-shopping-cart"></i> {{__('content.cart')}} </a>
    </div>

    <div class="profil-box">
        <a href="{{route('customer.wishlist')}}" ><i class="fas fa-heart"></i> {{__('content.wishlist')}} </a>
    </div>

    <div class="profil-box">
        <a  data-list="Logout"><i class="fas fa-sign-out-alt"></i> Logout </a>
    </div>

</div>
