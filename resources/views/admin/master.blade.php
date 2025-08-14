<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layouts.head')
    @include('admin.layouts.style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <main>

        @include('admin.layouts.sidebar')

        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show px-4" role="alert" style="margin-left: 5rem;">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show px-4" role="alert" style="margin-left: 5rem;">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- FOR NEXT TIME : CHANGE TO INCLUDE. DON'T USE @YIELD! --}}
            @yield('content')
        </div>
        
    </main>

    @include('admin.layouts.script')
</body>

</html>
