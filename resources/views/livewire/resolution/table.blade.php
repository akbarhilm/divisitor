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
                <th>Subject</th>
                <th>Service Catalog</th>
                <th>Level</th>
                <th>Status</th>
                <th>Created</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resolutions as $item)
                <tr>
                    <td>
                        {{ $item->subject }}
                    </td>
                    <td>
                        {{ $item->service_catalog_name }}
                    </td>
                    <td>
                        {{ $item->level_name }}
                    </td>
                    <td>
                        @status($item->status)
                    </td>
                    <td>
                        @date($item->created_at)
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
        <x-pagination :resources="$resolutions" />
    </x-card.footer>
</x-card>
