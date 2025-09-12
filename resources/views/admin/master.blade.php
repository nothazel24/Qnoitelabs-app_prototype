<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layouts.head')
    @include('admin.layouts.style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    @include('layouts.logoutPopup')

    {{-- CONFIRMATION POPUP --}}
    <div class="modal fade" id="confirmation" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3A7CA5;">
                    <h5 class="modal-title text-white">Notifikasi</h5>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapusnya?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <main>

        @include('admin.layouts.sidebar')

        <div class="container-fluid">

            @include('layouts.notification')

            {{-- FOR NEXT TIME : CHANGE TO INCLUDE. DON'T USE @YIELD! --}}
            @yield('content')
        </div>

    </main>

    @include('admin.layouts.script')
</body>

</html>
