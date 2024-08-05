<x-card>
    <x-card.body class="border-bottom">
        <div class="d-flex">
            <div class="text-muted">
                <div class="mx-2 d-inline-block">
                    <x-select wire:model.change="rowsPerPage">
                        @foreach ($rowsPerPageOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="ms-auto text-muted">
                <div class="ms-2 d-inline-block">
                    <x-search
                        placeholder="Search"
                        wire:model.live="search"
                    />
                </div>
            </div>
        </div>
    </x-card.body>
    <x-table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Jenis</th>
                <th>Tgl / Jam</th>
                <th>Subject</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($undangans as $item)
                <tr>
                    <td>
                        {{ $item->i_id }}
                    </td>
                    <td>
                        {{$item->c_meet_online=='0'?'Offline':'Online'}}
                    </td>
                    <td>
                        {{ date("d-m-Y", strtotime($item->d_meet)) }}
                    </td>
                    <td>
					{{$item->e_meet_subject}}
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                        <a href="#" class="btn dropdown-toggle" data-bs-toggle="dropdown"></a>
                        <div class="dropdown-menu">
                        @if ("1"==$item->c_meet_stat)
                        <x-button
                            icon
                            color="info"
                            wire:click="$dispatch('send', { id: {{ $item->id }} })"
                            {{-- wire:click="send({{$item->id}})" --}}
                        >
                        <x-icon.mail/>
                        </x-button>
                        @endif
                        <a
                            class="btn btn-icon btn-success"
                            target="_blank"
							href="{{ route('tamu', ['id' => $item->id]) }}"
							title="Peserta"
                        >
                            <x-icon.person />
                        </a>
						<x-button
                            icon
                            color="info"
                            title="Approve"
                            wire:click="approve({{$item->id}})"
                        >
                        <x-icon.check/>
                        </x-button>	
                        <x-button
                            icon
                            color="warning"
                            modal="undangan-modal-form"
							title="Edit"
                            wire:mouseenter="$dispatch('update-undangan', { id: {{ $item->id }} })"
                        >
                            <x-icon.pencil />
                        </x-button>
                        <x-button
                            icon
                            color="success"
                            modal="undangan-modal-detail"
							title="Detail"
                            wire:mouseenter="$dispatch('detail-undangan', { id: {{ $item->id }} })"
                        >
                            <x-icon.search />
                        </x-button>
						<x-button
                            icon
                            color="info"
                            title="Close"
                            wire:click="close({{$item->id}})"
                        >
                        <x-icon.alert-triangle/>
                        </x-button>	
						<x-button
                            icon
                            color="warning"
                            title="Cancel"
                            wire:click="cancel({{$item->id}})"
                        >
                        <x-icon.sun/>
                        </x-button>	
                        <x-button
                            icon
                            color="danger"
                            modal="undangan-modal-delete"
							title="Delete"
                            wire:click="$dispatch('set-undangan-id', { id: {{ $item->id }} })"
                        >
                            <x-icon.trash />
                        </x-button>						
                        @if ("1"==$item->c_meet_online)
						<a
                            class="btn btn-icon btn-info"
							title="Copy Link Absensi Online"
							onclick="
								var tempItem = document.createElement('input');
								tempItem.setAttribute('type','text');
								tempItem.setAttribute('display','none');    	    
								tempItem.setAttribute('value','{{$urlAbsen}}/{{$item->id}}');
								document.body.appendChild(tempItem);    
								tempItem.select();
								document.execCommand('Copy');
								tempItem.parentElement.removeChild(tempItem);							"							
                        >
                            <x-icon.copylink />
                        </a>
                        @endif						
                        </div>
                        </div>						
                    </td>
                </tr>
            @endforeach
        </tbody>
		
		
    </x-table>
    <x-card.footer class="d-flex align-items-center">
        <x-pagination :resources="$undangans" />
    </x-card.footer>
</x-card>

	