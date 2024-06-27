<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Incident and Problem
                </h2>
            </div>
        </div>
    </x-page.header>
    <x-page.body>
        <x-card>
            <x-card.header>
                <h3 class="card-title">Update Incident</h3>
            </x-card.header>
            <form wire:submit="save">
                <x-card.body>
                    <div class="row">
                        <div class="col-md-6">
                            <x-input
                                label="Reporter"
                                wire:model="form.reporter"
                                disabled
                            />
                        </div>
                        <div class="col-md-6">
                            <x-input
                                label="Report Channel"
                                wire:model="form.report_channel_name"
                                disabled
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <x-date
                                label="Date Received"
                                wire:model="form.date_received"
                                disabled
                            />
                        </div>
                        <div class="col-md-6">
                            <x-input
                                label="File"
                                wire:model="form.incident_file"
                                disabled
                            >
                                @if ($form->incident_file)
                                    <x-slot:after>
                                        <x-button
                                            icon
                                            type="button"
                                            wire:click="downloadIncidentFile"
                                        >
                                            <x-icon.download />
                                        </x-button>
                                    </x-slot:after>
                                @endif
                            </x-input>
                        </div>
                    </div>
                    <x-textarea
                        label="Incident Description"
                        wire:model="form.incident_desc"
                        disabled
                    />
                </x-card.body>
                <x-card.body>
                    <div class="row">
                        <div class="col-md-6">
                            <x-select
                                label="Service catalog"
                                wire:model="form.service_catalog_id"
                            >
                                @foreach ($serviceCatalog as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="col-md-6">
                            <x-select
                                label="Report Category"
                                wire:model="form.report_category"
                            >
                                @foreach ($reportCategory as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                    </div>
                    <x-textarea
                        label="Initial Analysis"
                        placeholder="Describe the Initial Analysis"
                        wire:model="form.initial_analysis"
                    />
                    <div class="row">
                        <div class="col-md-4">
                            <x-select
                                label="Impact"
                                wire:model="form.impact_id"
                                wire:change="updatePriority"
                            >
                                @foreach ($impact as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="col-md-4">
                            <x-select
                                label="Urgency"
                                wire:model="form.urgency_id"
                                wire:change="updatePriority"
                            >
                                @foreach ($urgency as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="col-md-4">
                            <x-select
                                label="Priority"
                                wire:model="form.priority_id"
                                disabled
                            >
                                @foreach ($priority as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->code }} - {{ $item->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                    </div>
                    <x-textarea
                        label="Resolution"
                        placeholder="Describe the Resolution"
                        wire:model="form.resolution_desc"
                        :disabled="$useExistingResolution"
                    >
                        <x-slot:label-description>
                            <x-button
                                type="button"
                                size="sm"
                                color="link"
                                class="text-decoration-none"
                                wire:click="resetResolution"
                            >
                                Reset
                            </x-button>
                            <span class="text-primary"> • </span>
                            <x-button
                                type="button"
                                size="sm"
                                color="link"
                                class="text-decoration-none"
                                modal="modal-resolution"
                            >
                                Select Resolution
                            </x-button>
                        </x-slot:label-description>
                    </x-textarea>
                    <div class="row">
                        <div class="col-md-6">
                            <x-select
                                label="Level"
                                wire:model="form.level_id"
                                :disabled="$useExistingResolution"
                            >
                                @foreach ($level as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="col-md-6">
                            @if ($useExistingResolution)
                                <x-input
                                    label="File"
                                    wire:model="form.resolution_file"
                                    disabled
                                >
                                    @if ($form->resolution_file)
                                        <x-slot:after>
                                            <x-button
                                                icon
                                                type="button"
                                                wire:click="downloadResolutionFile"
                                            >
                                                <x-icon.download />
                                            </x-button>
                                        </x-slot:after>
                                    @endif
                                </x-input>
                            @else
                                <x-input
                                    type="file"
                                    label="File"
                                    wire:model="form.resolution_file"
                                >
                                    @if ($form->resolution_file)
                                        <x-slot:label-description>
                                            <small>{{ $form->resolution_file }}</small>
                                        </x-slot:label-description>
                                        <x-slot:after>
                                            <x-button
                                                icon
                                                type="button"
                                                wire:click="downloadResolutionFile"
                                            >
                                                <x-icon.download />
                                            </x-button>
                                            <x-button
                                                icon
                                                type="button"
                                                color="danger"
                                                wire:click="deleteResolutionFile"
                                            >
                                                <x-icon.trash />
                                            </x-button>
                                        </x-slot:after>
                                    @endif
                                </x-input>
                            @endif
                        </div>
                    </div>
                </x-card.body>
                <x-card.footer class="d-flex">
                    <x-button
                        color="link"
                        wire:navigate
                        href="{{ route('incident') }}"
                    >
                        Back
                    </x-button>
                    <x-button
                        color="primary"
                        class="ms-auto"
                    >
                        <x-loading target="save" />
                        Update
                    </x-button>
                </x-card.footer>
            </form>
        </x-card>
    </x-page.body>

    <x-modal
        id="modal-resolution"
        size="xl"
    >
        <x-modal.header>
            <h5 class="modal-title fw-normal">Select Resolution</h5>
        </x-modal.header>
        <x-modal.body>
            <x-card>
                <x-card.body class="border-bottom">
                    <div class="d-flex">
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
                                    @date($item->created_at)
                                </td>
                                <td class="text-center">
                                    <x-button
                                        icon
                                        color="success"
                                        modal-dismiss
                                        wire:click="selectResolution({{ $item }})"
                                    >
                                        <x-icon.check />
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
    </x-modal>
</div>
