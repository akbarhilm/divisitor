<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Incident and Problem
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <x-button
                        color="primary"
                        modal="modal-form"
                        wire:mouseenter="new"
                    >
                        <x-icon.plus />
                        New
                    </x-button>
                </div>
            </div>
        </div>
    </x-page.header>

    <x-page.body>
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
                        <th>No.</th>
                        <th>Reporter</th>
                        <th>Received Date</th>
                        <th>Service Catalog</th>
                        <th>Priority</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidents as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->reporter }}</td>
                            <td> @date($item->date_received) </td>
                            <td>{{ $item->service_catalog_name }}</td>
                            <td>{{ $item->priority_level }} - {{ $item->priority_name }} </td>
                            <td class="text-center">
                                <x-button
                                    icon
                                    color="warning"
                                    wire:navigate
                                    href="{{ route('incident-edit', ['id' => $item->id]) }}"
                                >
                                    <x-icon.pencil />
                                </x-button>
                                <x-button
                                    icon
                                    color="danger"
                                    modal="modal-delete"
                                    wire:mouseenter="setIncidentId({{ $item->id }})"
                                >
                                    <x-icon.trash />
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table>
            <x-card.footer class="d-flex align-items-center">
                <x-pagination :resources="$incidents" />
            </x-card.footer>
        </x-card>
    </x-page.body>

    <x-modal
        id="modal-form"
        size="lg"
    >
        <form wire:submit="save">
            <x-modal.header>
                <h5 class="modal-title fw-normal">
                    Create Incident or Problem
                </h5>
            </x-modal.header>
            <x-modal.body>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input
                            label="Reporter ID"
                            placeholder="Enter Employee ID"
                            wire:model.live="form.reporter"
                        >
                            <x-slot:label-description>
                                <x-loading
                                    target="form.reporter"
                                    size="xs"
                                    no-space
                                />
                            </x-slot:label-description>
                        </x-input>
                    </div>
                    <div class="col-lg-6">
                        <x-select
                            label="Report Channel"
                            wire:model="form.report_channel_id"
                        >
                            @foreach ($channel as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </x-select>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-date
                            label="Date Received"
                            placeholder="Select a Date Received"
                            wire:model="form.date_received"
                        />
                    </div>
                    <div class="col-lg-6">
                        <x-select
                            label="Service Catalog"
                            wire:model="form.service_catalog_id"
                        >
                            @foreach ($serviceCatalog as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                </div>
                <x-textarea
                    label="Incident"
                    wire:model="form.incident_desc"
                    placeholder="Describe the Incident"
                ></x-textarea>
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

    <x-modal
        id="modal-delete"
        size="sm"
        color="danger"
    >
        <x-modal.body class="text-center py-4">
            <x-icon.alert-triangle class="text-danger icon-lg" />
            <h3>Delete Incident</h3>
            <div class="text-muted">
                Do you really want to delete this incident?
            </div>
        </x-modal.body>
        <x-modal.footer>
            <div class="w-100">
                <div class="row">
                    <div class="col">
                        <x-button
                            class="w-100"
                            modal-dismiss
                        >
                            Cancel
                        </x-button>
                    </div>
                    <div class="col">
                        <x-button
                            color="danger"
                            class="w-100"
                            wire:click="delete"
                        >
                            <x-loading />
                            Delete
                        </x-button>
                    </div>
                </div>
            </div>
        </x-modal.footer>
    </x-modal>
</div>
