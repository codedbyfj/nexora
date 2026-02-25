@props([
    'level' => 2,
    'align' => 'left', // left, center, right
])

@php
    $alignClasses = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
    ];

    $levels = [
        1 => 'text-4xl md:text-5xl font-extrabold',
        2 => 'text-3xl md:text-4xl font-bold',
        3 => 'text-2xl md:text-3xl font-semibold',
        4 => 'text-xl md:text-2xl font-semibold',
    ];

    $classes = "{$levels[$level]} {$alignClasses[$align]} text-gray-900 tracking-tight";
@endphp

<h{{ $level }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    </h{{ $level }}>
