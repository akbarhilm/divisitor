@props(['label', 'placeholder', 'items', 'key' => ['id', 'name']])

@php
    $model = $attributes->whereStartsWith('wire:model')->first();
@endphp

<div>
    @isset($label)
        <label class="form-label">{{ $label }}</label>
    @endisset

    <select class="form-select @error($model) is-invalid @enderror" x-init="new TomSelect($el)" {{ $attributes }}>
        @if (isset($label) || isset($placeholder))
            @isset($placeholder)
                <option value="">{{ $placeholder }}</option>
            @else
                <option value="">Select {{ $label }}</option>
            @endisset
        @endif
        @isset($items)
            @foreach ($items as $item)
                <option value="{{ $item->{$key[0]} }}">{{ $item->{$key[1]} }}</option>
            @endforeach
        @else
            {{ $slot }}
        @endisset
    </select>

    @error($model)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
