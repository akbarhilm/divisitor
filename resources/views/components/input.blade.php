@props(['label'])

@php
    $model = $attributes->whereStartsWith('wire:model')->first();
    $group = isset($before) || isset($after);
@endphp

<div class="mb-3">
    @isset($label)
        <label class="form-label">
            {{ $label }}
            @isset($labelDescription)
                <span class="form-label-description">
                    @isset($labelDescription)
                        {{ $labelDescription }}
                    @endisset
                </span>
            @endisset
        </label>
    @endisset

    @if ($group)
        <div class="input-group">
            @isset($before)
                {{ $before }}
            @endisset
            <input
                class="form-control @error($model) is-invalid @enderror"
                {{ $attributes }}
            >
            @isset($after)
                {{ $after }}
            @endisset
        </div>
    @else
        <input
            class="form-control @error($model) is-invalid @enderror"
            {{ $attributes }}
        >
    @endif

    @error($model)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
