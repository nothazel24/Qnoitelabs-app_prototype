<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
<meta name="description" content="@yield('metaDesc')" />
<meta name="author" content="Qnoite projects">
<meta name="robots" content="{{ $robots ?? 'index, follow' }}">

<link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon" />
<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
