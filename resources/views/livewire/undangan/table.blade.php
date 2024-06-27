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
                <th>No</th>
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
                        <x-button
                            icon
                            color="warning"
                            modal="modal-form"
                            wire:mouseenter="$dispatch('update-resolution', { id: {{ $item->id }} })"
                        >
                            <x-icon.pencil />
                        </x-button>
                        <x-button
                            icon
                            color="danger"
                            modal="modal-delete"
                            wire:click="$dispatch('set-resolution-id', { id: {{ $item->id }} })"
                        >
                            <x-icon.trash />
                        </x-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
		
		
    </x-table>
    <x-card.footer class="d-flex align-items-center">
        <x-pagination :resources="$undangans" />
    </x-card.footer>
</x-card>
