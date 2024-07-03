<x-modal
    id="tamu-modal-delete"
    size="sm"
    color="danger"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:tamu-deleted="modal.hide()"
>
    <x-modal.body class="text-center py-4">
        <x-icon.alert-triangle class="text-danger icon-lg" />
        <h3>Delete Tamu</h3>
        <div class="text-muted">
            Do you really want to delete this Tamu?
        </div>
    </x-modal.body>
    <x-modal.footer>
        <div class="w-100">
            <div class="row">
                <div class="col">
                    <x-button
                        modal-dismiss
                        class="w-100"
                    >
                        Cancel
                    </x-button>
                </div>
                <div class="col">
                    <x-button
                        class="w-100"
                        color="danger"
                        wire:click="delete"
                    >
                        <x-loading target="delete" />
                        Delete
                    </x-button>
                </div>
            </div>
        </div>
    </x-modal.footer>
</x-modal>
