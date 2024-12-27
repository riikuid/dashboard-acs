
 @props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center py-2 px-4 text-gray-900 bg-gray-100  group '
            : 'flex items-center py-2 px-4 text-gray-900 hover:bg-gray-100  group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

