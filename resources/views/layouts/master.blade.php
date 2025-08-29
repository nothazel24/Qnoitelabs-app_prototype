<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #3A7CA5;">
    <div class="min-h-screen">
        @include('layouts.navbar')

        <main>
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>

</html>
