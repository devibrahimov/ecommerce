@if ($paginator->hasPages())

{{--    <nav>--}}
{{--        <ul class="pagination justify-content-center">--}}
{{--            <li><a class="current" href="#">1</a></li>--}}
{{--            <li><a href="#">2</a></li>--}}
{{--            <li><a href="#"><i class="icon-arrow-right"></i></a></li>--}}
{{--        </ul>--}}
{{--    </nav>--}}

    <nav  aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="page-link"  aria-hidden="true">&lsaquo;</a>
                </li>
            @else
                <li class="page-item" >
                    <a class="page-link active" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item" aria-disabled="true"><span class="page-link" >{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item " aria-current="page"><a class="page-link active" >{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link"  href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item" >
                    <a class="page-link active"  href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item"  aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a  class="page-link"  aria-hidden="true">&rsaquo;</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
