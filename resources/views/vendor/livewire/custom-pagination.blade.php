<nav aria-label="Simple page pagination" class="flex items-center justify-between">
    <div class="text-sm text-gray-700 dark:text-gray-400">
        Showing
        <span class="font-medium">{{ $paginator->firstItem() }}</span>
        to
        <span class="font-medium">{{ $paginator->lastItem() }}</span>
        of
        <span class="font-medium">{{ $paginator->total() }}</span>
        results
      </div>
    <ul class="inline-flex -space-x-px text-sm">
      @if ($paginator->onFirstPage())
        <li>
          <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed">
            Previous
          </span>
        </li>
      @else
        <li>
          <button wire:click="previousPage('{{ $paginator->getPageName() }}')" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
            Previous
          </button>
        </li>
      @endif

      @foreach ($elements as $element)
        @if (is_string($element))
          <li>
            <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300">
              {{ $element }}
            </span>
          </li>
        @endif

        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li>
                <span class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50">
                  {{ $page }}
                </span>
              </li>
            @else
              <li>
                <button wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                  {{ $page }}
                </button>
              </li>
            @endif
          @endforeach
        @endif
      @endforeach

      @if ($paginator->hasMorePages())
        <li>
          <button wire:click="nextPage('{{ $paginator->getPageName() }}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
            Next
          </button>
        </li>
      @else
        <li>
          <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed">
            Next
          </span>
        </li>
      @endif
    </ul>
  </nav>
