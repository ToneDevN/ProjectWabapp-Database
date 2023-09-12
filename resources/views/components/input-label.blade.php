@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xl']) }}>
    {{ $value ?? $slot }}
</label>
