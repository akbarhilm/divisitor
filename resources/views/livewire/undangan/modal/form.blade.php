<x-modal
    id="undangan-modal-form"
    size="lg"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:undangan-updated="modal.hide()"
>
    <form wire:submit="save">
        <x-modal.header>
            <h5 class="modal-title fw-normal">
                {{ $update ? 'Update' : 'Create' }} Undangan
            </h5>
        </x-modal.header>
        <x-modal.body>
            <div class="row">
                <div class="col-lg-6">	
					<legend style="color:black;font-size:15px;font-weight:thin;">Jenis Rapat</legend>
					<span>
						<label class="btn custom-btn-color p-1 " style="width:100px">
							<input type="radio" wire:model.live="receiveStats" wire:click="$dispatch('set-radio', { param: {{ '0' }} })" name='receiveStats'  value="0">&nbsp;&nbsp;Offline 
						</label>
						<label class="btn custom-btn-color p-1" style="width:100px">
							<input type="radio" wire:model.live="receiveStats" wire:click="$dispatch('set-radio', { param: {{ '1' }} })" name='receiveStats' value="1">&nbsp;&nbsp;Online
						</label>
					</span>					
                </div>
                <div class="col-lg-6">

                </div>
            </div><br>	
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
                        label="Tanggal"
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
                        placeholder="Enter Jam Start"
                        wire:model="form.jamStart"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
						type="time"
                        label="Jam Finish"
                        placeholder="Enter Jam Finish"
                        wire:model="form.jamFinish"
                    />
                </div>
            </div>
			{{--
<div  class="row">
   <div class="col-lg-6">
    <label for="time1">Time 1:</label>
    <input id="time1" wire:model="time1" type="time">
    @error('time1') <span class="error">Hellloooooo</span> @enderror
   </div>

   <div class="col-lg-6">
    <label for="time2">Time 2:</label>
    <input id="time2" wire:model="time2" type="time">
    @error('time2') <span class="error">Uhuiiiiiiii</span> @enderror
   </div>
</div>
			<br><br>--}}
			
            <div x-show="0==$wire.receiveStats" class="row">
                <div class="col-lg-6">
                    <x-select
                        label="Pilih Gedung"
                        :items="$buildings"
                        wire:model="form.building_id"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Ruang Rapat"
                        placeholder="Enter Ruang Rapat"
                        wire:model="form.ruangRapat"
                    />
                </div>
            </div>		
            <div x-show="1==$wire.receiveStats" class="row">
                <div class="col-lg-6">
                    <x-input
                        label="Link Rapat Online"
                        placeholder="Enter Link Rapat Online"
                        wire:model="form.linkRapat"
                    />
                </div>
                <div class="col-lg-6">
                    <x-input
                        label="Password"
                        placeholder="Enter Password Link Rapat Online"
                        wire:model="form.password"
                    />
                </div>
            </div>		
            <div class="row">
                <div class="col-lg-6">
                    <x-textarea
                        label="Subject"
                        placeholder="Enter Subject"
                        wire:model="form.subject"
                    />
                </div>
                <div class="col-lg-6">
                    <x-textarea
                        label="Uraian"
                        placeholder="Enter Uraian"
                        wire:model="form.uraian"
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
		