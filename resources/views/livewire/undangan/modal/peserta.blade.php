<x-modal
    id="undangan-modal-peserta"
    size="lg"
    x-data="{ modal: new bootstrap.Modal($el) }"
		{{--x-on:peserta-updated="modal.hide()"--}}
>
<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Peserta
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <x-button
                        color="primary"
                        modal="undangan-modal-peserta-modal-formz"
                        wire:mouseenter="$dispatch('create-peserta')"
                    >
                        <x-icon.plus />
                        Create
                    </x-button>
                </div>
            </div>
        </div>
    </x-page.header>
    <x-page.body>
		<livewire:undangan.modal.peserta.table />
    </x-page.body>
	<livewire:undangan.modal.peserta.modal.form />
	<livewire:undangan.modal.peserta.modal.delete />
</div>
</x-modal>		