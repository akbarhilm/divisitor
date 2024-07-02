<x-card>
    <x-card.header>
        <div class="d-flex justify-content-between align-items-center w-100">
            <h3 class="m-0">
                Visitor Type
            </h3>

            <div class="d-flex align-items-center gap-4">
                <x-select wire:model.change="rowsPerPage">
                    @foreach ($rowsPerPageOptions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </x-select>
                <x-search placeholder="Search" wire:model.live="search" />
                <x-button color="primary" modal="modal-tambahvisitortype" wire:mouseenter="$dispatch('create-referensi')">
                    <x-icon.plus />
                    Create
                </x-button>
            </div>


        </div>
    </x-card.header>
    <x-card.body class="p-0">
        <x-table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datavisitortype as $item)
                    <tr>
                        <td class="w-1">
                            {{ $item->i_id }}
                        </td>
                        <td class="td-truncate">
                            {{ $item->n_type }}
                        </td>
                        <td class="">
                            {{ $item->c_active == '0' ? 'Tidak Aktif' : 'Aktif' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>


        </x-table>
    </x-card.body>

    <x-card.footer class="d-flex align-items-center">
        <x-pagination :resources="$datavisitortype" />
    </x-card.footer>
    <livewire:referensi.visitortype.modal />
</x-card>
