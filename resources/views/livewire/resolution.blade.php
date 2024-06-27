<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Resolution
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <x-button
                        color="primary"
                        modal="modal-form"
                        wire:mouseenter="$dispatch('create-resolution')"
                    >
                        <x-icon.plus />
                        Create
                    </x-button>
                </div>
            </div>
        </div>
    </x-page.header>
    <x-page.body>
        <livewire:resolution.table />
    </x-page.body>
    <livewire:resolution.modal.form />
    <livewire:resolution.modal.delete />
</div>
