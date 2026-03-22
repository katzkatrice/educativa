@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full border-l-4 border-blue-600 bg-blue-50 ps-3 pe-4 py-3 text-start text-base font-semibold text-blue-700 transition duration-150 ease-in-out focus:outline-none'
            : 'block w-full border-l-4 border-transparent ps-3 pe-4 py-3 text-start text-base font-medium text-gray-600 transition duration-150 ease-in-out hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:bg-blue-50 focus:text-blue-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
