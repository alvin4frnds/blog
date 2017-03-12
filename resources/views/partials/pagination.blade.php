<div class="row">

{{--
    <nav class="pagination">
        <span class="page-numbers prev inactive">Prev</span>
        <span class="page-numbers current">1</span>
        <a href="#" class="page-numbers">2</a>
        <a href="#" class="page-numbers">3</a>
        <a href="#" class="page-numbers">4</a>
        <a href="#" class="page-numbers">5</a>
        <a href="#" class="page-numbers">6</a>
        <a href="#" class="page-numbers">7</a>
        <a href="#" class="page-numbers">8</a>
        <a href="#" class="page-numbers">9</a>
        <a href="#" class="page-numbers next">Next</a>
    </nav>
--}}

    @if ($paginator->hasPages())
        <nav class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="page-numbers prev inactive">Prev</a>
            @else
                <a class="page-numbers prev" href="{{ $paginator->previousPageUrl() }}" rel="prev">Prev</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a href="#" class="page-numbers inactive"><span>{{ $element }}</span></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="#" class="page-numbers current">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="page-numbers next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            @else
                <a class="page-numbers next inactive">Prev</a>
            @endif
        </nav>
    @endif

</div>