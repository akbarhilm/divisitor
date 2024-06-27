@auth
    <a
        href="{{ route('logout') }}"
        class="nav-link px-0"
        title="Logout"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
    >
        <x-icon.logout />
    </a>
    <span class="nav-link d-flex lh-1 text-reset p-0">
        <span
            class="avatar avatar-sm ms-2"
            style="background-image: url({{ Auth::user()->photoUrl }})"
        >
        </span>
        <div class="d-none d-xl-block ps-2">
            <div>{{ ucwords(strtolower(Auth::user()->nama)) }}</div>
            <div class="mt-1 small text-muted">{{ Auth::user()->email }}</div>
        </div>
    </span>
@else
    <a
        href="{{ route('dashboard') }}"
        class="nav-link px-0"
        title="Login"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
    >
        <x-icon.login />
    </a>
@endauth
