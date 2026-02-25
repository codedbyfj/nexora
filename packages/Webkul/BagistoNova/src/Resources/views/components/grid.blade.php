@props([
    'cols' => 4,
    'gap' => 8,
])

@php
    $grids = [
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 sm:grid-cols-2',
        3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
        4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
    ];

    $gaps = [
        4 => 'gap-4',
        6 => 'gap-6',
        8 => 'gap-8',
        10 => 'gap-10',
    ];

    $classes = 'grid ' . ($grids[$cols] ?? $grids[4]) . ' ' . ($gaps[$gap] ?? $gaps[8]);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
