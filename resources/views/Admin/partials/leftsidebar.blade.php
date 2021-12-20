<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="list-divider"></li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link active" href="{{route('admin.index')}}"
                                             aria-expanded="false"><i  class="icon-chart"></i><span
                            class="hide-menu">Dashboard</span></a></li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="#"
                       aria-expanded="false"><i  class="fas fa-th-large"></i><span
                            class="hide-menu">Sifarişlər</span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">FİRMA MƏUMATLARI</span></li>

                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('admincarousels')}}"
                                             aria-expanded="false"><i  class=" icon-screen-desktop"></i><span
                            class="hide-menu">Manşet</span></a></li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('adminaboutus')}}"
                       aria-expanded="false"><i  class="icon-briefcase"></i><span
                            class="hide-menu">Haqqımızda</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('adminservices')}}"
                       aria-expanded="false"><i  class=" fas fa-file"></i><span
                            class="hide-menu">Səhifələr</span>
                    </a>
                </li>

{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link sidebar-link" href="{{route('gallery')}}"--}}
{{--                       aria-expanded="false"><i  class=" fas fa-images"></i><span--}}
{{--                            class="hide-menu">Qaleriya</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('admincontact')}}"
                       aria-expanded="false"><i  class=" far fa-id-card"></i><span
                            class="hide-menu">Bizimlə Əlaqə</span>
                    </a>
                </li>
{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link sidebar-link" href="{{route('adminpress')}}"--}}
{{--                       aria-expanded="false"><i  class=" far fa-newspaper"></i><span--}}
{{--                            class="hide-menu">Mətbuatda Biz</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link sidebar-link" href="{{route('adminfaq')}}"--}}
{{--                       aria-expanded="false"><i  class="icon-notebook"></i><span--}}
{{--                            class="hide-menu">Sual Cavab</span>--}}
{{--                    </a>--}}
{{--                </li>--}}


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Məhsullar</span></li>


                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('product_categories')}}"
                       aria-expanded="false"><i  class="fas fa-th-large"></i><span
                            class="hide-menu">Məhsul Kategoriyası</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('newproduct')}}"
                       aria-expanded="false"><i  class=" far fa-edit"></i><span
                            class="hide-menu">Yeni Məhsul</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('adminproducts')}}"
                       aria-expanded="false"><i  class="fas fa-shopping-cart"></i><span
                            class="hide-menu">Məhsullar</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="#"
                       aria-expanded="false"><i  class="fas fa-th-large"></i><span
                            class="hide-menu">İstifadəçilər Siyahısı</span>
                    </a>
                </li>



{{--                <li class="list-divider"></li>--}}
{{--                <li class="nav-small-cap"><span class="hide-menu">Blog</span></li>--}}

{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link sidebar-link" href="{{route('blog_categories')}}"--}}
{{--                       aria-expanded="false"><i  class="fas fa-th-large"></i><span--}}
{{--                            class="hide-menu">Blog Kategoriyası</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link sidebar-link" href="{{route('blogcreate')}}"--}}
{{--                       aria-expanded="false"><i  class=" far fa-edit"></i><span--}}
{{--                            class="hide-menu">Yeni Blog</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link sidebar-link" href="{{route('adminblogs')}}"--}}
{{--                       aria-expanded="false"><i  class="far fa-newspaper"></i><span--}}
{{--                            class="hide-menu">Bloglar</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link sidebar-link" href="#/hakkimizda.php"--}}
{{--                       aria-expanded="false"><i  class=" far fa-chart-bar"></i><span--}}
{{--                            class="hide-menu">Blog İstatistikləri</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Tənzimləmələr</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('sitesetting')}}"
                       aria-expanded="false"><i  class=" icon-wrench"></i><span
                            class="hide-menu">Site Tənzimləmələri</span>
                    </a>
                </li>

{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link sidebar-link" href="#/hakkimizda.php"--}}
{{--                       aria-expanded="false"><i  class="icon-rocket"></i><span--}}
{{--                            class="hide-menu">Seo Tənzimləmələri</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('languageSetting')}}"
                       aria-expanded="false"><i  class=" icon-globe-alt "></i><span
                            class="hide-menu">Dil Tənzimləmələri</span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Əlavələr</span></li>


{{--                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../../docs/docs.html"--}}
{{--                                             aria-expanded="false"><i  class="icon-notebook"></i><span--}}
{{--                            class="hide-menu">Kitabcıq</span></a>--}}
{{--                </li>--}}

{{--                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../../docs/docs.html"--}}
{{--                                             aria-expanded="false"><i  class=" icon-earphones-alt"></i><span--}}
{{--                            class="hide-menu">Texniki Dəstək</span></a>--}}
{{--                </li>--}}

                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html"
                                             aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                            class="hide-menu">Çıxış</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
