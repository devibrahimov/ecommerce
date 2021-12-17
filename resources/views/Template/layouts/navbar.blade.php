<nav>
    <ul class="navbar-nav">
        <li class="nav-item dropdown" id="myDropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Покупайте По Категориям
                <i style="margin-left: 10px;" class="fas fa-bars"></i></a>
            <ul class="dropdown-menu" id="indexDropdown">
                <li> <a class="dropdown-item" href="category.html"> One-Key </a></li>
                <li>
                    <a class="dropdown-item" href="category.html"> Аккумуляторы <i
                            class="fas fa-long-arrow-alt-right"></i></a>
                    <ul class="submenu dropdown-menu">
                        <li><a class="dropdown-item" href="#">Молотки отбойные</a></li>
                        <li><a class="dropdown-item" href="#">Дрели</a></li>
                        <li> <a class="dropdown-item" href="#"> Аккумуляторы <i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="dropdown-item" href="#">Multi level 1</a></li>
                                <li><a class="dropdown-item" href="#">Multi level 2</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
                        <li><a class="dropdown-item" href="#">Submenu item 5</a></li>
                    </ul>
                </li>
                <li><a class="dropdown-item" href="products.html"> Лобзики </a></li>
                <li><a class="dropdown-item" href="products.html"> Перфораторы </a></li>
                <li><a class="dropdown-item" href="products.html"> Лобзики </a></li>
                <li>
                    <a class="dropdown-item" href="#"> Аккумуляторы <i
                            class="fas fa-long-arrow-alt-right"></i></a>

                    <ul class="submenu dropdown-menu">
                        <li><a class="dropdown-item" href="#">Перфораторы</a></li>
                        <li><a class="dropdown-item" href="#">Дрели</a></li>
                        <li> <a class="dropdown-item" href="#"> Аккумуляторы <i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="dropdown-item" href="#">Multi level 1</a></li>
                                <li><a class="dropdown-item" href="#">Multi level 2</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
                        <li><a class="dropdown-item" href="#">Submenu item 5</a></li>
                    </ul>
                </li>
                <li><a class="dropdown-item" href="products.html"> Перфораторы </a></li>
                <li><a class="dropdown-item" href="products.html"> Лобзики </a></li>
                <li>
                    <a class="dropdown-item" href="products.htm"> Аккумуляторы <i
                            class="fas fa-long-arrow-alt-right"></i></a>

                    <ul class="submenu dropdown-menu">
                        <li><a class="dropdown-item" href="#">Перфораторы</a></li>
                        <li><a class="dropdown-item" href="#">Дрели</a></li>
                        <li> <a class="dropdown-item" href="#"> Аккумуляторы <i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="dropdown-item" href="#">Multi level 1</a></li>
                                <li><a class="dropdown-item" href="#">Multi level 2</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
                        <li><a class="dropdown-item" href="#">Submenu item 5</a></li>
                    </ul>
                </li>
                <li><a class="dropdown-item" href="products.html"> Перфораторы </a></li>
                <li><a class="dropdown-item" href="products.html"> Лобзики </a></li>
            </ul>
        </li>
    </ul>
    <ul class="ulMenu">
        <div class="mobilClose">
            <a ><i class="fas fa-times"></i></a>
        </div>
        @foreach(allPages() as $page)
        <li>
            <a href="{{route('page',$page->slug)}}">{{$page->name}}</a>
        </li>
        @endforeach

        <li>
            <a href="#">{{__('content.contact')}}</a>
        </li>
        <li>
            <a href="#">{{__('content.allcats')}}</a>
        </li>
    </ul>
    <div class="barclick" >
        <li>
            <a href="#"> <i style=" font-size: 20px; color:aliceblue" class="fas fa-bars"></i></a>
        </li>
    </div>
</nav>
