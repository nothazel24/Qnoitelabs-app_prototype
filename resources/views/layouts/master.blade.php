<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #3A7CA5;">
    <header>
        @include('layouts.navbar')
    </header>
    <div class="min-h-screen">
        @include('layouts.notification')
        @include('layouts.logoutPopup')
        @include('layouts.confirmationPopUp')
        @include('layouts.offCanvas')

        <main>
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    <div class="position-fixed d-flex align-items-center gap-2" style="bottom: 20px; right: 20px; z-index: 1050;">

        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20gratis"
            class="text-white fw-semibold px-3 py-2 rounded-pill shadow d-none d-md-block"
            style="background-color: #25d366; text-decoration: none;" target="_blank" rel="noopener">
            Konsultasi Gratis
        </a>

        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20gratis"
            class="btn d-flex align-items-center justify-content-center rounded-circle shadow"
            style="width: 55px; height: 55px; background-color: #25d366;" target="_blank" rel="noopener">
            <img src="{{ asset('dist/icons/whatsapp-white.svg') }}" alt="whatsapp" width="30">
        </a>

    </div>

    @include('layouts.script')
</body>

</html>
