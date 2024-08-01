<div>
    <form wire:submit="save">
    <x-page.body>
		@if ("1"==$statusRapat)
			<center>
            <h5 class="modal-title fw-normal">
                ABSENSI ONLINE
            </h5>
			</center>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <x-input
                        label="Tanggal Kegiatan"
						readonly
                        wire:model="tanggal"
                    />
                </div>
                <div class="col-lg-2"></div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <x-input
                        label="Nama Kegiatan"
						readonly
                        wire:model="nama"
                    />
                </div>
                <div class="col-lg-2"></div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">	
                    <x-select
                        label="Pilih Perusahaan"
                        :items="$perusahaans"
                        wire:model="idvmsdetail"
						wire:change="updatePerusahaan"
                    />
                </div>
                <div class="col-lg-2"></div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <x-input
                        label="Alamat Perusahaan"
						readonly
                        wire:model="alamat"
                    />
                </div>
                <div class="col-lg-2"></div>
            </div>			
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <x-input
                        label="Kota"
						readonly
                        wire:model="kota"
                    />
                </div>
                <div class="col-lg-2"></div>
            </div>			
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <x-input
                        label="Nama"
						placeholder="Isi nama tamu"
                        wire:model="namaTamu"
                    />
                </div>
                <div class="col-lg-2"></div>
            </div>			
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <x-input
                        label="Email"
						type="mail"
						placeholder="Isi email tamu"
                        wire:model="emailTamu"
                    />
                </div>
                <div class="col-lg-2"></div>
            </div>			
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <x-input
                        label="No HP"
						placeholder="Isi no hp tamu"
                        wire:model="hpTamu"
                    />
                </div>
                <div class="col-lg-2"></div>
            </div>	
			<br>			
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 text-center">
					<x-button
						color="primary"
						class="ms-auto"
					>
						<x-loading target="save" />
						Save
					</x-button>
                </div>
                <div class="col-lg-2"></div>
            </div>	
		@endif
		@if ("0"==$statusRapat)
			<center>
            <h5 class="modal-title fw-normal">
                RAPAT OFFLINE
            </h5>
			</center>
		@endif
		@if ("X"==$statusRapat)
			<center>
            <h5 class="modal-title fw-normal">
                TIDAK BISA ABSENSI
            </h5>
			</center>
		@endif		
    </x-page.body>
    </form>	
</div>
