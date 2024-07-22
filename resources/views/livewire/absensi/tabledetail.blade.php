<x-card>
    <x-card.body class="border-bottom">
        <div class="d-flex flex-column">
            
                
                    <div class="p-2">{{'Pengundang :  '.$undangans->i_emp_reqst.' / '.$user->nama}}</div>
                
                    <div class="p-2">{{'Subject :  '.$undangans->e_meet_subject}}</div>
                
                    <div class="p-2">{{'Uraian :  '.$undangans->e_meet}}</div>
                
                    <div class="p-2">{{'Tanggal :  '.$undangans->d_meet}} &nbsp; {{'Jam :  '.$undangans->d_meet_timestart}}</div>
                
                    <div class="p-2">{{'Gedung :  '.$gedung->n_bldg}}</div>
                
                    <div class="p-2">{{'Ruang Rapat :  '.$undangans->n_room}}</div>

                </div>
           
            {{-- <div class="ms-auto text-muted">
                <div class="ms-2 d-inline-block">
                    <x-search
                        placeholder="Search"
                        wire:model.live="search"
                    />
                </div>
            </div> --}}
        
    </x-card.body>
    <x-table>
        <thead>
            <tr>
                
               <th>No</th>
                <th>Nama (CP)</th>
                <th>Perusahaan</th>
                <th>Alamat Perusahaan</th>
                <th>Kota</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Jumlah</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $item)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
					    {{$item->nama}}
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
					    {{$item->email}}
                    </td>
                    <td>
					    {{$item->handphone}}
                    </td>
                    <td>
                        {{$item->jumlah}}
                        </td>
                    <td class="text-center">					
                        <x-button
                            
                           class="btn btn-icon btn-primary"
                            modal="absensi-modal-formdetail"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="upload"
                            wire:click="$dispatch('scan-absen', { q: {{ $item->i_id }} })"
                        >
                    
                       <x-icon.upload/>
                        </x-button>
                        <x-button
                            
                           class="btn btn-icon btn-success"
                            modal="absensi-modal-formdetailnama"
                          data-toggle="tooltip" 
                          data-placement="top" 
                          title="edit nama"
                            wire:mouseenter="$dispatch('edit-absen', { iddetail: {{ $item->i_id }},idvms:{{$undangans->i_id}} })"
                        >
                    
                        <x-icon.pencil/>
                        </x-button>
                        <x-button
                            
                          class="btn btn-icon btn-info"
                            modal="absensi-modal-formdetailsaved"
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="list absen"
                            wire:mouseenter="$dispatch('saved-absen', { iddetail: {{ $item->i_id }},idvms:{{$undangans->i_id}} })"
                        >
                    
                        <x-icon.database/>
                        </x-button>
                        {{-- <x-button
                            icon
                            color="danger"
                            modal="tamu-modal-delete"
                            wire:click="$dispatch('set-tamu-id', { idvms: {{ $item->idvms }},id: {{ $item->id }} })"
                        >
                            <x-icon.trash />
                        </x-button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
		
		
    </x-table>
    <x-card.footer class="d-flex align-items-center">
        {{-- <x-pagination :resources="$tamu" /> --}}
    </x-card.footer>
</x-card>

