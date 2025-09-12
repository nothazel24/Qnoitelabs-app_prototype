<!DOCTYPE html>
<html lang="en">

<head>
    @include('auth.layouts.head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #EFEFEF">
    <div class="min-h-screen">

        <main>
            @yield('content')
        </main>

    </div>
    @include('auth.layouts.script')
</body>

</html>
