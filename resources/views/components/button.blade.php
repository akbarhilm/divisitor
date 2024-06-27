@props(['color', 'size', 'icon' => false, 'modal', 'modalDismiss' => false, 'close' => false])

@php
    if ($close) {
        $defaultClass = 'btn-close';
    } else {
        $colorClass = isset($color) ? "btn-$color " : '';
        $sizeClass = isset($size) ? "btn-$size " : '';
        $iconClass = $icon ? 'btn-icon' : '';

        $defaultClass = 'btn ' . $colorClass . $sizeClass . $iconClass;
    }
@endphp

<button
    @isset($modal) data-bs-toggle="modal" data-bs-target="#{{ $modal }}" @endisset
    @if ($modalDismiss) data-bs-dismiss="modal" @endif
    @if ($close) aria-label="Close" @endif
    {{ $attributes->merge(['class' => $defaultClass]) }}
    {{ $attributes }}
>
    {{ $slot }}
</button>
