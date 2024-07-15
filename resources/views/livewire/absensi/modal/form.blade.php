<x-modal
    id="undangan-modal-form"
    size="lg"
    x-data="{ modal: new bootstrap.Modal($el) }"
    x-on:undangan-updated="modal.hide()"
>
    
        <x-modal.header>
            <h5 class="modal-title fw-normal">
               Scan Qr
            </h5>
        </x-modal.header>
        <x-modal.body>
            <div id="qr-reader"></div>
            <div id="qr-reader-results"></div>
        </x-modal.body>
        <x-modal.footer>
            {{-- <x-button
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
            </x-button> --}}
        </x-modal.footer>
    </form>
</x-modal>



		