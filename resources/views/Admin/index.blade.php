<!DOCTYPE html>
<html dir="ltr" lang="aze">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{setting()->favicon}}">
    <title>{{setting()->title}} - admin  </title>
    <!-- Custom CSS -->
    <link href="/admin/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/admin/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- LANGUAGE -->
    <link rel="stylesheet" href="/general/flag/css/flag-icon.min.css">
    <!-- Custom CSS -->
    <link href="/admin/assets/css/style.min.css" rel="stylesheet">

    @yield('css')

</head>


<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-brand">
                    <!-- Logo icon -->
                    <a href="{{route('admin.index')}}">
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="{{setting()->logo}}" alt="homepage" width="200px" class="dark-logo" />
                            <!-- Light Logo text -->
                                <img src="{{setting()->logo}}" alt="homepage" width="200px"  class="light-logo" alt="homepage" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                    <!-- Notification -->
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"--}}
{{--                           id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                           aria-expanded="false">--}}
{{--                            <span><i data-feather="bell" class="svg-icon"></i></span>--}}
{{--                            <span class="badge badge-primary notify-no rounded-circle">5</span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">--}}
{{--                            <ul class="list-style-none">--}}
{{--                                <li>--}}
{{--                                    <div class="message-center notifications position-relative">--}}
{{--                                        <!-- Message -->--}}
{{--                                        <a href="javascript:void(0)"--}}
{{--                                           class="message-item d-flex align-items-center border-bottom px-3 py-2">--}}
{{--                                            <div class="btn btn-danger rounded-circle btn-circle"><i--}}
{{--                                                    data-feather="airplay" class="text-white"></i></div>--}}
{{--                                            <div class="w-75 d-inline-block v-middle pl-2">--}}
{{--                                                <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>--}}
{{--                                                <span class="font-12 text-nowrap d-block text-muted">Just see--}}
{{--                                                        the my new--}}
{{--                                                        admin!</span>--}}
{{--                                                <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <!-- Message -->--}}
{{--                                        <a href="javascript:void(0)"--}}
{{--                                           class="message-item d-flex align-items-center border-bottom px-3 py-2">--}}
{{--                                                <span class="btn btn-success text-white rounded-circle btn-circle"><i--}}
{{--                                                        data-feather="calendar" class="text-white"></i></span>--}}
{{--                                            <div class="w-75 d-inline-block v-middle pl-2">--}}
{{--                                                <h6 class="message-title mb-0 mt-1">Event today</h6>--}}
{{--                                                <span--}}
{{--                                                    class="font-12 text-nowrap d-block text-muted text-truncate">Just--}}
{{--                                                        a reminder that you have event</span>--}}
{{--                                                <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <!-- Message -->--}}
{{--                                        <a href="javascript:void(0)"--}}
{{--                                           class="message-item d-flex align-items-center border-bottom px-3 py-2">--}}
{{--                                                <span class="btn btn-info rounded-circle btn-circle"><i--}}
{{--                                                        data-feather="settings" class="text-white"></i></span>--}}
{{--                                            <div class="w-75 d-inline-block v-middle pl-2">--}}
{{--                                                <h6 class="message-title mb-0 mt-1">Settings</h6>--}}
{{--                                                <span--}}
{{--                                                    class="font-12 text-nowrap d-block text-muted text-truncate">You--}}
{{--                                                        can customize this template--}}
{{--                                                        as you want</span>--}}
{{--                                                <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <!-- Message -->--}}
{{--                                        <a href="javascript:void(0)"--}}
{{--                                           class="message-item d-flex align-items-center border-bottom px-3 py-2">--}}
{{--                                                <span class="btn btn-primary rounded-circle btn-circle"><i--}}
{{--                                                        data-feather="box" class="text-white"></i></span>--}}
{{--                                            <div class="w-75 d-inline-block v-middle pl-2">--}}
{{--                                                <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span--}}
{{--                                                    class="font-12 text-nowrap d-block text-muted">Just--}}
{{--                                                        see the my admin!</span>--}}
{{--                                                <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">--}}
{{--                                        <strong>Check all notifications</strong>--}}
{{--                                        <i class="fa fa-angle-right"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                    <!-- End Notification -->
                    <!-- ============================================================== -->
                    <!-- create new -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                           id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <span><i data-feather="mail" class="svg-icon mr-2 ml-1"></i></span>
                            <span class="badge badge-warning notify-no rounded-circle">{{\Illuminate\Support\Facades\DB::table('message')->where('show',0)->count()}}</span>
                        </a>
                        @if( \Illuminate\Support\Facades\DB::table('message')->where('show',0)->count() != 0)

                        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                            <ul class="list-style-none">
                                <li>
                                    <div class="message-center notifications position-relative">
                                        <!-- Message -->
                                        @php
                                        $messages = \Illuminate\Support\Facades\DB::table('message')->where('show',0)->get();
                                        @endphp
                                        @foreach($messages as $m)
                                        <a href="{{route('messageread',$m->id)}}"
                                           class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                            <div class="btn btn-danger rounded-circle btn-circle"><i
                                                    class="fas fa-envelope" class="text-white"></i></div>
                                            <div class="w-75 d-inline-block v-middle pl-2">
                                                <h6 class="message-title mb-0 mt-1">{{$m->name}} {{$m->surname}}</h6>
                                                <span class="font-12 text-nowrap d-block text-muted">{{$m->email}}</span>
                                                <span class="font-12 text-nowrap d-block text-muted">{{$m->created_at}}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                        <!-- Message -->

                                    </div>
                                </li>
                               <li>
                                    <a class="nav-link pt-3 text-center text-dark" href="{{route('messages')}}">
                                        <strong>Bütün Mesajları Gör</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>

                            </ul>

                        </div>
                        @endif
                    </li>
{{--                    <li class="nav-item d-none d-md-block">--}}
{{--                        <a class="nav-link" href="javascript:void(0)">--}}
{{--                            <div class="customize-input">--}}
{{--                                <select--}}
{{--                                    class="custom-select form-control bg-white custom-radius custom-shadow border-0">--}}
{{--                                    <option selected value="aze">AZE</option>--}}
{{--                                    <option value="ru">RU</option>--}}
{{--                                    <option  value="en">EN</option>--}}
{{--                                    <option value="tr">TR</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
{{--                    <li class="nav-item d-none d-md-block">--}}
{{--                        <a class="nav-link" href="javascript:void(0)">--}}
{{--                            <form>--}}
{{--                                <div class="customize-input">--}}
{{--                                    <input class="form-control custom-shadow custom-radius border-0 bg-white"--}}
{{--                                           type="search" placeholder="Axtarış" aria-label="Search">--}}
{{--                                    <i class="form-control-icon" data-feather="search"></i>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="{{setting()->favicon}}" alt="user" class="rounded-circle"
                                 width="40">
                            <span class="ml-2 d-none d-lg-inline-block"><span>Salam,</span> <span
                                    class="text-dark">{{auth()->user()->name}}</span> <i data-feather="chevron-down"
                                                                          class="svg-icon"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
{{--                            <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"--}}
{{--                                                                                  class="svg-icon mr-2 ml-1"></i>--}}
{{--                                 Profil</a>--}}
{{--                            <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"--}}
{{--                                                                                  class="svg-icon mr-2 ml-1"></i>--}}
{{--                               Qeydlərim</a>--}}
                            <a class="dropdown-item" href="{{route('messages')}}"><i data-feather="mail"
                                                                                  class="svg-icon mr-2 ml-1"></i>
                                Mesajlar</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('sitesetting')}}">
                                <i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                                Sayt Tenzimləmələri
                            </a>
                            <a class="dropdown-item" href="{{route('adminusers')}}">
                                <i class="icon-user"> </i> Admin Tənzimləmələri
                            </a>
{{--                            <a class="dropdown-item" href="javascript:void(0)">--}}
{{--                                <i class="icon-rocket"></i>--}}
{{--                                Seo Tənzimləmələri--}}
{{--                            </a>--}}

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                               onclick="event.preventDefault(); document.getElementById('logoutform').submit()"
                               href="#" >
                                <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                Çıxış Et</a>
                            <form action="{{route('adminlogoutform')}}" method="post" id="logoutform" style="display: none">
                                @csrf
                            </form>
                            <div class="dropdown-divider"></div>
                            <div class="pl-4 p-3"><a href="#" class="btn btn-sm btn-info">
                                <i class="fas fa-home mr-2 ml-1"></i> Sayta Bax</a></div>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
  @include('Admin.partials.leftsidebar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
            Bütün hüquqlar  <a href="https://dreamart.az">Dreamart</a> tərəfindən qorunur.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/admin/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="/admin/assets/js/app-style-switcher.js"></script>
<script src="/admin/assets/js/feather.min.js"></script>
<script src="/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="/admin/assets/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="/admin/assets/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="/admin/assets/extra-libs/c3/d3.min.js"></script>
<script src="/admin/assets/extra-libs/c3/c3.min.js"></script>
<script src="/admin/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="/admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="/admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="/admin/assets/js/pages/dashboards/dashboard1.min.js"></script>

<script src="/general/sweetalert.min.js"></script>
@yield('js')
@if(session()->has('feedback'))
    @php $feedback =  session()->get('feedback') ;
       @endphp
<script>

    swal({
        title: "{{ $feedback['title']}}",
        text: "{{ $feedback['text']}}",
        icon: "{{ $feedback['icon']}}",
        button: "{{ $feedback['button']}}",

    });
</script>
@endif

</body>

</html>
