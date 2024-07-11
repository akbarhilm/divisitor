<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Visitor Type
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <x-button color="primary" modal="modal-tambahvisitortype"
                        wire:mouseenter="$dispatch('visitortype-create">
                        <x-icon.plus />
                        Create
                    </x-button>
                </div>
            </div>
        </div>
    </x-page.header>
    <x-page.body>
        <livewire:referensi.visitortype.table />
    </x-page.body>
    {{--
    <livewire:referensi.modal.form /> --}}
    {{--
    <livewire:referensi.modal.delete /> --}}

</div>
