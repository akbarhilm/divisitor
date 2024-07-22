<x-modal
    id="tamu-modal-form"
    size="lg"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:tamu-updated="modal.hide()"
>
    <form wire:submit="save">
        <x-modal.header>
            <h5 class="modal-title fw-normal">
                {{ $update ? 'Update' : 'Create' }} Tamu
            </h5>
        </x-modal.header>
        <x-modal.body>		
            <div class="row">
                <div class="col-lg-6">
                    <x-input
                        label="Id Vms"
                        placeholder=""
						readonly
						wire:model="form.idvms"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Nama"
                        placeholder="Enter Nama"
                        wire:model="form.nama"
                    />
                </div>
            </div>				
            <div class="row">
                <div class="col-lg-6">
                    <x-input
                        label="Jumlah"
                        placeholder="Enter jumlah"
                        wire:model="form.jumlah"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Email"
                        placeholder="Enter email"
                        wire:model="form.email"
                    />
                </div>
            </div>				
            <div class="row">
                <div class="col-lg-6">
                    <x-input
                        label="Handphone"
                        placeholder="Enter handphone"
                        wire:model="form.handphone"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Nama Perusahaan"
                        placeholder="Enter nama perusahaan"
                        wire:model="form.namaPerusahaan"
                    />
                </div>
            </div>				
            <div class="row">
                <div class="col-lg-6">
                    <x-input
                        label="Alamat Perusahaan"
                        placeholder="Enter alamat perusahaan"
                        wire:model="form.alamatPerusahaan"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Kota Perusahaan"
                        placeholder="Enter kota perusahaan"
                        wire:model="form.kotaPerusahaan"
                    />
                </div>
            </div>				
            <div  class="row">
                <div class="col-lg-6">
                    <x-select
                        label="Pilih Kategori"
                        :items="$kategori"
                        wire:model="form.kategori"
                    />
                </div>
                <div class="col-lg-6">
                    <x-select
                        label="Pilih tipe"
                        :items="$tipe"
                        wire:model="form.tipe"
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
		