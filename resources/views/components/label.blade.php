<label
    {{ $attributes->merge([
        'class' => 'block tracking-wide text-gray-700 text-xs font-bold mb-2',
    ]) }}>
    {{ $slot }}
    @if($required ?? false)
        <span class="text-red-500">*</span>
    @endif
</label>
