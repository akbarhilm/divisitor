<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Absensi
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <x-button
                        color="primary"
                        modal="absensi-modal-form"
                        wire:mouseenter="$dispatch('create-undangan')"
                        onclick="window.startscan()"
                    >
                        <x-icon.search />
                        Scan
                    </x-button>
                </div>
            </div>
        </div>
    </x-page.header>
    <x-page.body>
        <livewire:absensi.table />
    </x-page.body>
     <livewire:absensi.modal.form />
    
    {{--<livewire:undangan.modal.delete /> --}}

</div>