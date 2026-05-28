@if ($paginator->hasPages())
    <div class="flex items-center justify-center gap-1.5 mt-8">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span
                class="inline-flex items-center justify-center w-9 h-9 rounded-berry text-sm text-berry-muted bg-white border border-berry-border cursor-not-allowed">
                <i data-lucide="chevron-left" class="w-4 h-4"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="inline-flex items-center justify-center w-9 h-9 rounded-berry text-sm text-gray-600 bg-white border border-berry-border hover:bg-primary-50 hover:text-primary-600 hover:border-primary-500 transition-all">
                <i data-lucide="chevron-left" class="w-4 h-4"></i>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span
                    class="inline-flex items-center justify-center w-9 h-9 rounded-berry text-sm text-berry-muted">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="inline-flex items-center justify-center w-9 h-9 rounded-berry text-sm font-bold text-white bg-primary-600 shadow-berry">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="inline-flex items-center justify-center w-9 h-9 rounded-berry text-sm text-gray-600 bg-white border border-berry-border hover:bg-primary-50 hover:text-primary-600 hover:border-primary-500 transition-all">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="inline-flex items-center justify-center w-9 h-9 rounded-berry text-sm text-gray-600 bg-white border border-berry-border hover:bg-primary-50 hover:text-primary-600 hover:border-primary-500 transition-all">
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        @else
            <span
                class="inline-flex items-center justify-center w-9 h-9 rounded-berry text-sm text-berry-muted bg-white border border-berry-border cursor-not-allowed">
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </span>
        @endif
    </div>
@endif
