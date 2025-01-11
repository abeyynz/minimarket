@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => 'border-gray-500 bg-gray-200 text-gray-900 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm px-2 py-2 w-4/5'
    ]) }}
>

