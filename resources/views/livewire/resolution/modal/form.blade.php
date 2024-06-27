<x-modal
    id="modal-form"
    size="lg"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:resolution-updated="modal.hide()"
>
    <form wire:submit="save">
        <x-modal.header>
            <h5 class="modal-title fw-normal">
                {{ $update ? 'Update' : 'Create' }} Resolution
            </h5>
        </x-modal.header>
        <x-modal.body>
            <div class="row">
                <div class="col-lg-6">
                    <x-input
                        label="Subject"
                        placeholder="Enter Subject"
                        wire:model="form.subject"
                    />
                </div>
                <div class="col-lg-6">
                    <x-select
                        label="Service Catalog"
                        :items="$serviceCatalog"
                        wire:model="form.service_catalog_id"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <x-select
                        label="Level"
                        :items="$level"
                        wire:model="form.level_id"
                    />
                </div>
                <div class="col-lg-6">
                    <x-select
                        label="Category"
                        :items="$category"
                        :key="['value', 'name']"
                        wire:model="form.category"
                    />
                </div>
            </div>
            <x-textarea
                label="Incident"
                wire:model="form.incident_desc"
                placeholder="Describe the Incident"
            />
            <x-textarea
                label="Resolution"
                wire:model="form.resolution_desc"
                placeholder="Describe the Resolution"
            />
            <x-input
                type="file"
                label="File"
                wire:model="form.file"
            >
                @if ($update && $form->file)
                    <x-slot:label-description>
                        <small>{{ $form->file }}</small>
                    </x-slot:label-description>
                    <x-slot:after>
                        <x-button
                            icon
                            type="button"
                            wire:click="downloadFile"
                        >
                            <x-icon.download />
                        </x-button>
                        <x-button
                            icon
                            type="button"
                            color="danger"
                            wire:click="deleteFile"
                        >
                            <x-icon.trash />
                        </x-button>
                    </x-slot:after>
                @endif
            </x-input>
            <x-select-group
                label="Status"
                :items="$status"
                :key="['value', 'name']"
                wire:model.change="form.status"
            />
            @if ($form->status == 2)
                <x-textarea
                    label="Retired Description"
                    wire:model="form.retired_desc"
                    placeholder="Why this Resolution is no longer relevant"
                />
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
