@props(['color' => 'blue'])

@php
    // Menyiapkan pilihan warna menggunakan class Tailwind
    $colors = [
        'blue' => 'bg-blue-100 text-blue-800',
        'yellow' => 'bg-yellow-100 text-yellow-800',
        'green' => 'bg-green-100 text-green-800',
        'red' => 'bg-red-100 text-red-800',
    ];
    $colorClass = $colors[$color] ?? $colors['blue'];
@endphp

<!-- $attributes->merge() memungkinkan kita menambahkan class tambahan dari luar -->
<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold {$colorClass}"]) }}>
    {{ $slot }}
</span>