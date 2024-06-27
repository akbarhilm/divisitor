@props(['label', 'items', 'key' => ['id', 'name']])

<div class="mb-3">
    @isset($label)
        <label class="form-label">{{ $label }}</label>
    @endisset
    <div class="form-selectgroup">
        @foreach ($items as $item)
            <label class="form-selectgroup-item">
                <input
                    type="radio"
                    value="{{ $item->{$key[0]} }}"
                    class="form-selectgroup-input"
                    {{ $attributes }}
                >
                <span class="form-selectgroup-label">
                    {{ $item->{$key[1]} }}
                </span>
            </label>
        @endforeach
    </div>
</div>
