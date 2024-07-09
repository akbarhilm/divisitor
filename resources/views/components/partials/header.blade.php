<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <x-icon.menu-2 />
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal">
            <a wire:navigate href="" class="text-decoration-none">

                <span class="fw-medium d-inline" style="display:inline-flex">{{ config('app.name') }}</span>
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <x-partials.theme />
            <x-partials.userbox />
        </div>
    </div>
</header>