<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, viewport-fit=cover"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>{{ config('app.name') }}</title>
    <!-- CSS files -->
    <link
        href={{ asset('dist/css/tabler.min.css') }}
        rel="stylesheet"
    />
    <link
        href={{ asset('dist/css/tabler-vendors.min.css') }}
        rel="stylesheet"
    />
    <link
        href={{ asset('dist/css/demo.min.css') }}
        rel="stylesheet"
    />
    <link
        href={{ asset('dist/css/font.css') }}
        rel="stylesheet"
    />
    <style>
        .rotate-90 {
            transform: rotate(90deg);
            transition: transform 0.1s linear;
        }

        .rotate-180 {
            transform: rotate(180deg);
            transition: transform 0.1s linear;
        }

        .hidden {
            display: none
        }

        .company-color {
            color: #2F318B
        }

        [data-bs-theme=dark] .company-color {
            color: white
        }

        [x-cloak] {
            display: none !important;
        }

        .ask-button {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
        }

        .spinner-border-xs {
            --tblr-spinner-width: 0.8rem;
            --tblr-spinner-height: 0.8rem;
            --tblr-spinner-border-width: 0.8px;
        }
    </style>

    @stack('style')
    <!-- JS files -->
    <script src={{ asset('dist/js/jquery-3.7.0.js') }}></script>
    <script src={{ asset('dist/js/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('dist/js/dataTables.bootstrap5.min.js') }}></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>
    <div class="page {{ Auth::check() ? '' : 'page-center' }}">
        <x-partials.header />
        {{-- @auth --}}
            <x-partials.navbar />
        {{-- @endauth --}}
        <div class="page-wrapper">
            {{ $slot }}
        </div>
        <x-partials.footer />
    </div>
    <!-- another JS files -->
    <script
        src={{ asset('dist/js/tabler.min.js') }}
        defer
    ></script>
    <script
        src={{ asset('dist/js/demo.min.js') }}
        defer
    ></script>
    <script
        src={{ asset('dist/libs/tom-select/dist/js/tom-select.base.min.js') }}
        defer
    ></script>
    <script
        src={{ asset('dist/libs/litepicker/dist/litepicker.js') }}
        defer
    ></script>
    @stack('script')
</body>

</html>
