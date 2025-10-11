<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
<meta name="description" content="@yield('metaDesc')" />
<meta name="keywords" content="jasa pembuatan website, qnoite, jasa pembuatan website murah, project pkl, project website bertemakan jasa pembuatan website">
<meta name="author" content="Qnoite projects">
<meta name="robots" content="{{ $robots ?? 'index, follow' }}">

<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

{{-- LEAFLET --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

{{-- FONT AWESOME CDN --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
