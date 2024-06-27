@props(['target', 'size' => 'sm', 'noSpace' => false])

<span
    wire:loading
    @isset($target) wire:target="{{ $target }}" @endisset
    {{ $attributes }}
>
    <span class="spinner-border @if ($size != 'lg') spinner-border-{{ $size }} @endif"></span>
    @if (!$noSpace)
        &nbsp;
    @endif
</span>
