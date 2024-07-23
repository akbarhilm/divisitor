
<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Absensi Detail
                </h2>
            </div>
      
        </div>
    </x-page.header>
    <x-page.body>
        <livewire:absensi.tableDetail :id="$id" />
    </x-page.body>
    <livewire:absensi.modal.formDetail />
    <livewire:absensi.modal.formDetailNama />
    <livewire:absensi.modal.formDetailSaved />
    
    {{--<livewire:undangan.modal.delete /> --}}

</div>
