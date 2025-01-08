@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-blue-400 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
