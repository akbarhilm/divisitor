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
                <th>Id Vms</th>
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
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tamu as $item)
                <tr>
                    <td>
                        {{ $item->idvms }}
                    </td>
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
                    <td class="text-center">					
                        <x-button
                            icon
                            color="warning"
                            modal="tamu-modal-form"
                            wire:mouseenter="$dispatch('update-tamu', { id: {{ $item->id }} })"
                        >
                            <x-icon.pencil />
                        </x-button>
                        <x-button
                            icon
                            color="danger"
                            modal="tamu-modal-delete"
                            wire:click="$dispatch('set-tamu-id', { idvms: {{ $item->idvms }},id: {{ $item->id }} })"
                        >
                            <x-icon.trash />
                        </x-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
		
		
    </x-table>
    <x-card.footer class="d-flex align-items-center">
        <x-pagination :resources="$tamu" />
    </x-card.footer>
</x-card>
