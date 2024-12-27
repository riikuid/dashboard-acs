@props(['name'])
<input
    {{ $attributes->merge([
        'type' => 'text',
        'class' =>
            'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5',
    ]) }}
    wire:model="{{ $name }}" />

@error($name)
    <span class="text-red-800">{{ $message }}</span>
@enderror
