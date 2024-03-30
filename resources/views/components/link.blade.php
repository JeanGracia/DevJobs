@php
    $classes = "rounded-md 
    text-xs text-gray-500 hover:text-blue-600
    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
</a>