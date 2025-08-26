<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #EFEFEF">
    <div class="min-h-screen">

        <main>
            <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 100dvh;">
                <img src="{{ asset('dist/icons/404.svg') }}" alt="page-not-found" width="120" class="m-3">
                <h1 class="fw-bold" style="font-size: 45px; color: #3A7CA5;">404 NOT FOUND</h1>
                <p style="color: #3A7CA5;">Whoops, sepertinya laman yang kamu cari tidak ada/sedang error</p>
            </div>
        </main>

    </div>
    @include('layouts.script')
</body>

</html>
