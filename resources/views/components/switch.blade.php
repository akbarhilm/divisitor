@php
    $checked = (int) $attributes['checked'] ?? 0;
@endphp

<label class="form-check form-switch">
    <input type="hidden" id="input-checkbox" name="{{ $name }}">
    <input class="form-check-input" type="checkbox" id="switch-checkbox" {{ $checked ? 'checked' : '' }}>
    <span class="form-check-label">{{ $slot }}</span>
</label>

@pushOnce('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#input-checkbox').val(@json($checked))
            $('#switch-checkbox').on('change', function(event) {
                $('#input-checkbox').val(event.target.checked ? 1 : 0)
            })
        });
    </script>
@endPushOnce
