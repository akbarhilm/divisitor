<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Tamu
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <x-button
                        color="primary"
                        modal="tamu-modal-form"
						wire:mouseenter="$dispatch('create-tamu', { idvms: {{ $id }} })"
                    >
                        <x-icon.plus />
                        Create
                    </x-button>
                </div>
            </div>
        </div>
    </x-page.header>
    <x-page.body>
        <livewire:tamu.table :id="$id" />
    </x-page.body>
    <livewire:tamu.modal.form />
    <livewire:tamu.modal.delete />
	
</div>
	