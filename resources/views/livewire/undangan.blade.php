<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Undangan
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <x-button
                        color="primary"
                        modal="undangan-modal-form"
						title="Membuat Undangan"
                        wire:mouseenter="$dispatch('create-undangan')"
                    >
                        <x-icon.plus />
                        Create
                    </x-button>
                </div>
            </div>
        </div>
    </x-page.header>
    <x-page.body>
        <livewire:undangan.table />
    </x-page.body>
    <livewire:undangan.modal.form />
    <livewire:undangan.modal.delete />
    <livewire:undangan.modal.detail />
	
</div>
