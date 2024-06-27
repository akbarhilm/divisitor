<x-modal
    id="modal-pst-x-form"
    size="lg"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:peserta-updated="modal.hide()"
>
    <form wire:submit="save">
        <x-modal.header>
            <h5>HELLOO..HEADERR</h5>
        </x-modal.header>
        <x-modal.body>
			<h5>HELLOO..BODY</h5>
        </x-modal.body>
        <x-modal.footer>
            <x-button
                type="button"
                color="link"
                modal-dismiss
            >
                Cancel
            </x-button>
            <x-button
                color="primary"
                class="ms-auto"
            >
                <x-loading target="save" />
                Save
            </x-button>
        </x-modal.footer>
    </form>
</x-modal>

</x-modal>
