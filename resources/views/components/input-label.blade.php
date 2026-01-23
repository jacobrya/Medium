@props(['value'])

<label {{ $attributes->merge(['class' => 'border-gray-300 block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
