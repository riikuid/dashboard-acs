
<div class="flex items-center cursor-pointer" wire:click="sortBy('{{$columnName}}')">
    {{$label ?? $columnName}}
    @if ($sortField !== $columnName)
        <x-heroicon-o-chevron-up-down class="w-3 h-3 ms-1.5" />
    @elseif ($sortDirection ==='asc' )
        <x-heroicon-o-chevron-up class="w-3 h-3 ms-1.5" />
    @elseif ($sortDirection === 'desc')
        <x-heroicon-o-chevron-down class="w-3 h-3 ms-1.5" />
    @endif
</div>
