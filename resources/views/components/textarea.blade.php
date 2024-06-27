@props(['label', 'rows' => 5])

@php
    $model = $attributes->whereStartsWith('wire:model')->first();
@endphp

<div class="mb-3">
    @isset($label)
        <label class="form-label">
            {{ $label }}
            @isset($labelDescription)
                <span class="form-label-description">
                    {{ $labelDescription }}
                </span>
            @endisset
        </label>
    @endisset

    <textarea
        class="form-control @error($model) is-invalid @enderror"
        rows="{{ $rows }}"
        {{ $attributes }}
    ></textarea>

    @error($model)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
