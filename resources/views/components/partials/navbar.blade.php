<header class="navbar-expand-md sticky-top">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl ">
                <ul class="navbar-nav gap-3 mx-xs-3">
                    <li @class([ 'nav-item' , 'active'=> Route::currentRouteName() == 'dashboard',
                        ])>
                        <a class="nav-link p-0" href="{{ route('dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <x-icon.home />
                            </span>
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li @class([ 'nav-item' ,'dropdown', 'active'=> Route::currentRouteName() == 'referensi'])>
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
                                    <path d="M12 12l8 -4.5"></path>
                                    <path d="M12 12l0 9"></path>
                                    <path d="M12 12l-8 -4.5"></path>
                                    <path d="M16 5.25l-8 4.5"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Referensi
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a @class([ 'dropdown-item' , 'active'=> Route::currentRouteName() =='referensi'])
                                        href="{{ route('referensi') }}">
                                        Visitor Type
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Category
                                    </a>

                                </div>
                            </div>
                    </li>
                    <li @class([ 'nav-item' , 'active'=> Route::currentRouteName() == 'undangan',
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
                    {{-- <li @class([ 'nav-item' , 'active'=> Route::currentRouteName() == 'dashboard',
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
                    <li @class([ 'nav-item' , 'active'=> Route::currentRouteName() == 'resolution',
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