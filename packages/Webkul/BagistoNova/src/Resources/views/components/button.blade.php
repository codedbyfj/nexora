@props([
    'variant' => 'primary', // primary, secondary, outline
    'size'    => 'md',      // sm, md, lg
    'href'    => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg';
    
    $variants = [
        'primary'   => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        'secondary' => 'bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-500',
        'outline'   => 'border-2 border-blue-600 text-blue-600 hover:bg-blue-50 focus:ring-blue-500',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-5 py-2.5 text-base',
        'lg' => 'px-8 py-3.5 text-lg',
    ];

    $classes = "{$baseClasses} {$variants[$variant]} {$sizes[$size]}";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
