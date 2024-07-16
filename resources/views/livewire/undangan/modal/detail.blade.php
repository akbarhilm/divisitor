<x-modal
    id="undangan-modal-detail"
    size="xl"
    x-data="{ modal: new bootstrap.Modal($el) }"
>
    <form>
        <x-modal.header>
            <h5 class="modal-title fw-normal">
                Detail Undangan
            </h5>
        </x-modal.header>
        <x-modal.body>
            <div class="row">
                <div class="col-lg-6">	
					<legend style="color:black;font-size:15px;font-weight:thin;">Jenis Rapat</legend>
					<span>
						<label class="btn custom-btn-color p-1 " style="width:100px">
							<input type="radio" wire:model.live="receiveStats" name='receiveStats' disabled  value="0">&nbsp;&nbsp;Offline 
						</label>
						<label class="btn custom-btn-color p-1" style="width:100px">
							<input type="radio" wire:model.live="receiveStats"  name='receiveStats' disabled value="1">&nbsp;&nbsp;Online
						</label>
					</span>					
                </div>
                <div class="col-lg-6">

                </div>
            </div>	
            <div class="row">
                <div class="col-lg-6">
                    <x-input
                        label="Pengundang Rapat"
                        placeholder="Enter Pengundang"
						readonly
                        wire:model="form.pengundangTampil"
                    />
                </div>
                <div class="col-lg-6">
                    <x-date
                        label="Tanggal
						readonly
                        placeholder="Enter Tanggal"
                        wire:model="form.tanggal"
                    />
                </div>
            </div>					
            <div class="row">
                <div class="col-lg-6">
                    <x-input
						type="time"
                        label="Jam Start"
						readonly
                        placeholder="Enter Jam Start"
                        wire:model="form.jamStart"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
						type="time"
                        label="Jam Finish"
						readonly
                        placeholder="Enter Jam Finish"
                        wire:model="form.jamFinish"
                    />
                </div>
            </div>			
            <div x-show="0==$wire.receiveStats" class="row">
                <div class="col-lg-6">
                    <x-input
                        label="Gedung"
						readonly
                        wire:model="form.building_id"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
						readonly
                        label="Ruang Rapat"
                        placeholder="Enter Ruang Rapat"
                        wire:model="form.ruangRapat"
                    />
                </div>
            </div>		
            <div x-show="1==$wire.receiveStats" class="row">
                <div class="col-lg-6">
                    <x-input
						readonly
                        label="Link Rapat Online"
                        placeholder="Enter Link Rapat Online"
                        wire:model="form.linkRapat"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
						readonly
                        label="Password"
                        placeholder="Enter Password Link Rapat Online"
                        wire:model="form.password"
                    />
                </div>
            </div>		
            <div class="row">
                <div class="col-lg-6">
                    <x-textarea
						readonly
                        label="Subject"
                        placeholder="Enter Subject"
                        wire:model="form.subject"
                    />
                </div>
                <div class="col-lg-6">
                    <x-textarea
						readonly
                        label="Uraian"
                        placeholder="Enter Uraian"
                        wire:model="form.uraian"
                    />
                </div>
            </div>		
            <div class="row">
                <div class="col-lg-6">	
					<legend style="color:black;font-size:15px;font-weight:thin;">Tamu</legend>			
                </div>
                <div class="col-lg-6">
                </div>
            </div>	
			@if($tamu)
			<x-table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Nama</th>
						<th>Jumlah</th>
						<th>Email</th>
						<th>Handphone</th>
						<th>Nama Perusahaan</th>
						<th>Alamat Perusahaan</th>
						<th>Kota Perusahaan</th>
						<th>Kategori</th>
						<th>Tipe</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tamu as $item)
						<tr>
							<td>
								{{ $item->id }}
							</td>
							<td>
							{{$item->nama}}
							</td>
							<td>
							{{$item->jumlah}}
							</td>
							<td>
							{{$item->email}}
							</td>
							<td>
							{{$item->handphone}}
							</td>
							<td>
							{{$item->namaPerusahaan}}
							</td>
							<td>
							{{$item->alamatPerusahaan}}
							</td>
							<td>
							{{$item->kotaPerusahaan}}
							</td>
							<td>
							{{$item->kategori}}
							</td>
							<td>
							{{$item->tipe}}
							</td>
						</tr>
					@endforeach
				</tbody>				
			</x-table>
			@endif			
        </x-modal.body>
        <x-modal.footer>
            <x-button
                type="button"
                color="link"
                modal-dismiss
            >
                Cancel
            </x-button>

        </x-modal.footer>
    </form>
</x-modal>
		