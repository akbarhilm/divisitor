@props(['size', 'color'])

<div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
    wire:ignore.self
    {{ $attributes }}
>
    <div
        class="modal-dialog @isset($size) modal-{{ $size }} @endisset modal-dialog-centered"
        role="document"
    >
        <div class="modal-content">
            @isset($color)
                <x-button
                    close
                    type="button"
                    modal-dismiss
                ></x-button>
                <div class="modal-status bg-{{ $color }}"></div>
            @endisset
            {{ $slot }}
        </div>
    </div>
</div>
