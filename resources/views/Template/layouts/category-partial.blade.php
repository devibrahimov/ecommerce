


<ul class="submenu dropdown-menu">
    @foreach($children as $child)
    <li> <a class="dropdown-item" href="@if(!count($child->children))
        {{route('site.productcategory',['id'=>$child->id , 'slug'=>\Illuminate\Support\Str::slug($child->name)])}}
        @else # @endif"> {{$child->name}}  @if(count($child->children)) <i
                class="fas fa-long-arrow-alt-right"></i>  @endif </a>
        @if(count($child->children))
            @include('Template.layouts.category-partial',['children' => $child->children])
        @endif
   </li>
    @endforeach
</ul>
