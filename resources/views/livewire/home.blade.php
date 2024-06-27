<div>
    <x-page.header>
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title fw-normal">
                    Frequently Asked Questions
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <x-search
                    placeholder="Search"
                    wire:model.live="search"
                />
            </div>
        </div>
    </x-page.header>

    <x-page.body>
        <div class="card card-lg">
            <div class="card-body">
                <div class="space-y-4">
                    <div>
                        <h2 class="mb-3 fw-normal">Introduction</h2>
                        <div
                            id="faq-1"
                            class="accordion"
                            role="tablist"
                            aria-multiselectable="true"
                        >
                            <div class="accordion-item">
                                <div
                                    class="accordion-header"
                                    role="tab"
                                >
                                    <button
                                        class="accordion-button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq-1-1"
                                    >Welcome to our service!</button>
                                </div>
                                <div
                                    id="faq-1-1"
                                    class="accordion-collapse collapse show"
                                    role="tabpanel"
                                    data-bs-parent="#faq-1"
                                >
                                    <div class="accordion-body pt-0">
                                        <div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                                alias dignissimos dolorum ea est eveniet, excepturi illum in iste
                                                iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                                ipsa?</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                                alias dignissimos dolorum ea est eveniet, excepturi illum in iste
                                                iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                                ipsa?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div
                                    class="accordion-header"
                                    role="tab"
                                >
                                    <button
                                        class="accordion-button collapsed"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq-1-2"
                                    >Who are we?</button>
                                </div>
                                <div
                                    id="faq-1-2"
                                    class="accordion-collapse collapse"
                                    role="tabpanel"
                                    data-bs-parent="#faq-1"
                                >
                                    <div class="accordion-body pt-0">
                                        <div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                                alias dignissimos dolorum ea est eveniet, excepturi illum in iste
                                                iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                                ipsa?</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                                alias dignissimos dolorum ea est eveniet, excepturi illum in iste
                                                iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                                ipsa?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div
                                    class="accordion-header"
                                    role="tab"
                                >
                                    <button
                                        class="accordion-button collapsed"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq-1-3"
                                    >What are our values?</button>
                                </div>
                                <div
                                    id="faq-1-3"
                                    class="accordion-collapse collapse"
                                    role="tabpanel"
                                    data-bs-parent="#faq-1"
                                >
                                    <div class="accordion-body pt-0">
                                        <div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                                alias dignissimos dolorum ea est eveniet, excepturi illum in iste
                                                iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                                ipsa?</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                                alias dignissimos dolorum ea est eveniet, excepturi illum in iste
                                                iure maiores nemo recusandae rerum saepe sed, sunt totam! Explicabo,
                                                ipsa?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-page.body>

    <x-button
        color="primary"
        class="ask-button"
        modal="modal-ask"
        wire:mouseenter="new"
    >
        <x-icon.message-circle-question />
    </x-button>

    <x-modal
        id="modal-ask"
        size="lg"
    >
        <div class="card-stamp card-stamp-md">
            <div class="card-stamp-icon bg-primary">
                <x-icon.message-circle-question />
            </div>
        </div>
        <form wire:submit="save">
            <x-modal.header>
                <h5 class="modal-title fw-normal">Ask to Admin</h5>
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
                    label="Incident Description"
                    wire:model="form.incident_desc"
                    placeholder="Describe the Incident"
                ></x-textarea>
                <x-input
                    type="file"
                    label="File"
                    wire:model="form.incident_file"
                />
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
                    Submit
                </x-button>
            </x-modal.footer>
        </form>
    </x-modal>
</div>
