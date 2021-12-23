<nav>
    <ul class="navbar-nav">
        <li class="nav-item dropdown" id="myDropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Покупайте По Категориям
                <i style="margin-left: 10px;" class="fas fa-bars"></i></a>
            <ul class="dropdown-menu" id="indexDropdown">

                @foreach(productcategoriesParents() as $category)
                <li> <a class="dropdown-item" href=" @if(!count($category->children))
                    {{route('site.productcategory',['id'=>$category->id , 'slug'=>\Illuminate\Support\Str::slug($category->name)])}}
                    @else # @endif"> {{$category->name}}
                        @if(count($category->children)) <i  class="fas fa-long-arrow-alt-right"></i> @endif </a>
                            @if(count($category->children))
                                @include('Template.layouts.category-partial',['children' => $category->children])
                            @endif
                </li>
                @endforeach
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
            <a href="{{route('site.contact')}}">{{__('content.contact')}}</a>
        </li>
        <li>
            <a href="{{route('site.allcategories')}}">{{__('content.allcats')}}</a>
        </li>
    </ul>
    <div class="barclick" >
        <li>
            <a href="#"> <i style=" font-size: 20px; color:aliceblue" class="fas fa-bars"></i></a>
        </li>
    </div>
</nav>
