<x-modal id="modal-tambahvisitortype" size="lg" x-data="{ modal: new bootstrap.Modal($el) }" x-on:visitortype-updated="modal.hide()">
    <form wire:submit="save">
        <x-modal.header>
            <h5 class="modal-title fw-normal">
                {{ $update ? 'Update' : 'Create' }} Visitor Type
            </h5>
        </x-modal.header>
        <x-modal.body>

            <div class="row d-flex align-items-center mb-4">
                <div class="col-3">
                    <p class="m-0">Type</p>
                </div>
                <div class="col-9">
                    <x-input placeholder="Enter Type" value="" wire:model.live="form.namatypekunjungan" />
                </div>
            </div>

            <div class="row d-flex align-items-center">
                <div class="col-3">
                    <p class="m-0">Status</p>
                </div>

                <div class="col-9">
                    <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" wire:model.live="form.receiveStats" value="0"
                            id="btn-radio-basic-1" autocomplete="off" checked="1">
                        <label for="btn-radio-basic-1" type="button" class="btn">Offline</label>

                        <input type="radio" class="btn-check" wire:model.live="form.receiveStats" value="1"
                            id="btn-radio-basic-4" autocomplete="off">
                        <label for="btn-radio-basic-4" type="button" class="btn">Online</label>
                    </div>
                    <div class="is-invalid">
                        @error('form.receiveStats')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </x-modal.body>
        <x-modal.footer>
            <x-button type="button" color="link" modal-dismiss>
                Cancel
            </x-button>
            <x-button color="primary" class="ms-auto">
                <x-loading target="save" />
                Save
            </x-button>
        </x-modal.footer>
    </form>
</x-modal>
