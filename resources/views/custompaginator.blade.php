@if ($paginator->hasPages())
<ul class="pager">
    <div class="flex mt-4 justify-center">
        <div class="flex flex-row gap-x-4">
            @if (!$paginator->onFirstPage())
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <button class="w-10 flex items-center">
                        <img src="pictures/leftbutton.png" alt="">
                    </button>
                </a>
            </li>
            @endif
            <div class="flex flex-row items-center px-5 bg-greenTableheader text-white gap-x-10 rounded-3xl">
                @foreach ($elements as $element)

                @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="text-green-200">{{ $page }}</li>
                @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
                @endforeach
                @endif
                @endforeach
            </div>
            @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><button class="w-10 flex items-center">
                        <img src="pictures/rightbutton.png" alt="">
                    </button></a></li>
            @endif
        </div>
    </div>
</ul>
@endif