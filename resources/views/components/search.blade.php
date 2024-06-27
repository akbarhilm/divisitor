<div class="input-group input-group-flat">
    <input
        type="text"
        class="form-control"
        x-on:keyup.slash.document="$el.focus()"
        {{ $attributes }}
    >
    <span class="input-group-text">
        <kbd>/</kbd>
    </span>
</div>
