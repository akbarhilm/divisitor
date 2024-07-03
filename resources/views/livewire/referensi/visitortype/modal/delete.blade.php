<x-modal id="modal-delete" size="sm" color="danger" x-data="{ modal: new bootstrap.Modal($el) }" x-on:visitortype-delete="modal.hide()">
    <x-modal.body class="text-center py-4">
        <x-icon.alert-triangle class="text-danger icon-lg" />
        <h3>Delete Incident</h3>
        <div class="text-muted">
            Do you really want to delete this visitor type?
        </div>
    </x-modal.body>
    <x-modal.footer>
        <div class="w-100">
            <div class="row">
                <div class="col">
                    <x-button class="w-100" modal-dismiss>
                        Cancel
                    </x-button>
                </div>
                <div class="col">
                    <x-button color="danger" class="w-100" wire:click="delete">
                        <x-loading target="delete" />
                        Delete
                    </x-button>
                </div>
            </div>
        </div>
    </x-modal.footer>
</x-modal>
