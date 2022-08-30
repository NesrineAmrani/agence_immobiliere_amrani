@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-md text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
