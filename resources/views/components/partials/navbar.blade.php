<header class="navbar-expand-md sticky-top">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl ">
                <ul class="navbar-nav gap-3 mx-xs-3">
                    <li @class([
                        'nav-item',
                        'active' => Route::currentRouteName() == 'referensi',
                    ])>
                        <a class="nav-link p-0" href="{{ route('referensi') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <x-icon.dashboard />
                            </span>
                            <span class="nav-link-title">
                                Referensi
                            </span>
                        </a>
                    </li>
                    <li @class([
                        'nav-item',
                        'active' => Route::currentRouteName() == 'undangan',
                    ])>
                        <a class="nav-link p-0" href="{{ route('undangan') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <x-icon.dashboard />
                            </span>
                            <span class="nav-link-title">
                                Undangan
                            </span>
                        </a>
                    </li>
                    {{-- <li @class([
                        'nav-item',
                        'active' => Route::currentRouteName() == 'dashboard',
                    ])>
                        <a wire:navigate class="nav-link" href="{{ route('dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <x-icon.dashboard />
                            </span>
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li @class([
                        'nav-item',
                        'active' => Route::currentRouteName() == 'resolution',
                    ])>
                        <a wire:navigate class="nav-link" href="{{ route('resolution') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <x-icon.database />
                            </span>
                            <span class="nav-link-title">
                                Resolution
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown {{ request()->segment(1) === 'incident' ? 'active' : null }}">
                        <a wire:navigate class="nav-link" href="{{ route('incident') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <x-icon.pencil />
                            </span>
                            <span class="nav-link-title">
                                Incident
                            </span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</header>
