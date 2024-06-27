<x-modal
    id="modal-udg-form"
    size="lg"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:undangan-updated="modal.hide()"
>
    <form wire:submit="save">
        <x-modal.header>
            <h5 class="modal-title fw-normal">
                {{ $update ? 'Update' : 'Create' }} Undangan
            </h5>
        </x-modal.header>
        <x-modal.body>
            <div class="row">
                <div class="col-lg-6">		
                    <x-input
                        label="Jenis Rapat"
                        placeholder="Enter Jenis Rapat"
						value="0"
                        wire:model="form.jenisRapat"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Pengundang Rapat"
                        placeholder="Enter Pengundang"
						value="930075"
                        wire:model="form.pengundang"
                    />
                </div>
            </div>		
            <div class="row">
                <div class="col-lg-6">
                    <x-date
                        label="Tanggal"
                        placeholder="Enter Tanggal"
						value="2024-06-29"
                        wire:model="form.tanggal"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Jam"
                        placeholder="Enter Jam"
						value="10"
                        wire:model="form.jamStart"
                    />
                </div>
            </div>		
            <div class="row">
                <div class="col-lg-6">
                    <x-select
                        label="Pilih Gedung"
                        :items="$buildings"
                        wire:model="form.building_id"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Ruang Rapat"
                        placeholder="Enter Ruang Rapat"
						value="Ruang Bisnis"
                        wire:model="form.ruangRapat"
                    />
                </div>
            </div>		
            <div class="row">
                <div class="col-lg-6">
                    <x-input
                        label="Link Rapat Online"
                        placeholder="Enter Link Rapat Online"
                        wire:model="form.linkRapat"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Password"
                        placeholder="Enter Password Link Rapat Online"
                        wire:model="form.password"
                    />
                </div>
            </div>		
            <div class="row">
                <div class="col-lg-6">
                    <x-textarea
                        label="Subject"
                        placeholder="Enter Subject"
						value="Subject rapat ku"
                        wire:model="form.subject"
                    />
                </div>
                <div class="col-lg-6">
                    <x-textarea
                        label="Uraian"
                        placeholder="Enter Uraian"
						value="Uraian rapat ku"
                        wire:model="form.uraian"
                    />
                </div>
            </div>		
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
		