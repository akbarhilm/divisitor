@props(['label'])

@php
    $model = $attributes->whereStartsWith('wire:model')->first();
@endphp

<div class="mb-3">
    @isset($label)
        <label class="form-label">{{ $label }}</label>
    @endisset

    <input
        type="text"
        class="form-control @error($model) is-invalid @enderror"
        x-init="new Litepicker({
            position: 'bottom',
            element: $el,
            autoRefresh: true,
            buttonText: {
                previousMonth: '◄',
                nextMonth: '►'
            },
            setup: (picker) => {
                picker.on('selected', () => {
                    $wire.$set('{{ $model }}', $el.value)
                });
            },
        })"
        {{ $attributes }}
    >

    @error($model)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
