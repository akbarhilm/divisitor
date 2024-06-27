@props([
    'closed' => false,
])

@php
    $color = '#206BC4';

    if ($closed) {
        $color = '#2FB344';
    }
@endphp

<span
    style="border: solid 2px {{ $color }}; border-radius: 4px; box-sizing: border-box; display: inline-block; margin: 0; padding: 0.125rem 0.25rem 0.05rem 0.25rem; font-size: 0.8rem; text-decoration: none; background-color: {{ $color }}; color: #ffffff"
>
    {{ $slot }}
</span>
