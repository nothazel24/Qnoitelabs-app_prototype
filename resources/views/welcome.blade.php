<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+AMvyTG2xZp3pRzNEn3czUdiYHgZB" crossorigin="anonymous">
    </script>

    <!-- vite integration -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Qnoite - Jasa website terpercaya</title>
</head>

<body style="background-color: #3A7CA5">

    <!-- NAVBAR SECTION -->
    <nav class="container navbar navbar-expand-lg bg-transparent py-3 d-flex flex-row fixed-top">

        <a class="navbar-brand" href="/">
            <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="qnoite" width="110">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">

                <li class="nav-item active me-3">
                    <a class="nav-link text-white" href="/">Home</a>
                </li>
                <li class="nav-item active me-3">
                    <a class="nav-link text-white" href="./templates/list-vps/index.html">Profile</a>
                </li>
                <li class="nav-item active me-3">
                    <a class="nav-link text-white" href="./templates/about-us/index.html">Paket & harga</a>
                </li>
                <li class="nav-item active me-3">
                    <a class="nav-link text-white" href="./templates/about-us/index.html">Kontak</a>
                </li>
                <li class="nav-item active me-3">
                    <a class="nav-link text-white" href="./templates/about-us/index.html">Blog</a>
                </li>
                <li class="nav-item active me-3">
                    <a class="nav-link text-white" href="./templates/about-us/index.html">Open source</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white ml-4" href="{{ route('login') }}">Log In</a>
                </li>
            </ul>

        </div>
    </nav> <!-- END NAV SECTION -->

    <!-- HOMEPAGE -->
    <section class="home">
        <div class="container-fluid position-relative p-0 m-0" style="height: 500px;">

            <img src="{{ asset('dist/images/home-bg.png') }}" class="w-100 h-100"
                style="filter: brightness(30%); object-fit: cover;" alt="background" />

            <div
                class="container position-absolute top-50 start-50 translate-middle text-white d-flex align-items-center">
                <div class="one">
                    <h1 class="fw-bold">QNOITE.COM</h1>
                    <p class="w-50">Qnoite adalah platform digital yang menggabungkan layanan pembuatan website
                        profesional dengan semangat komunitas open source.</p>
                    <div class="cta">
                        <div class="btn btn-md bg-white text-black px-5 me-2">Layanan Konsultasi</div>
                        <div class="btn btn-md bg-transparent text-white px-5 border border-white">Join komunitas</div>
                    </div>
                </div>

                <div class="logo">
                    <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="qnoite" style="opacity: 50%;">
                </div>
            </div>

        </div>
    </section>

    <!-- CLIENT SECTION -->
    <section class="client" style="background-color: #efefef;">
        <div class="container py-5">
            <div class="header">
                <h1 style="font-size: 30px">KLIEN KLIEN KAMI</h1>
                <p>Lebih dari 2000 perusahaan dan bisinis mempercayakan pembuatan websitenya kepada Qnoite.com</p>
            </div>

            <div class="row mt-5">
                <div class="col-lg">
                    <img src="{{ asset('dist/logo/mangadex-logo.webp') }}" alt="indomaret" width="300"
                        class="my-2">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('dist/logo/mangadex-logo.webp') }}" alt="indomaret" width="300"
                        class="my-2">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('dist/logo/mangadex-logo.webp') }}" alt="indomaret" width="300"
                        class="my-2">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-4">
                    <img src="{{ asset('dist/logo/mangadex-logo.webp') }}" alt="indomaret" width="300"
                        class="my-2">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('dist/logo/mangadex-logo.webp') }}" alt="indomaret" width="300"
                        class="my-2">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('dist/logo/mangadex-logo.webp') }}" alt="indomaret" width="300"
                        class="my-2">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-4">
                    <img src="{{ asset('dist/logo/mangadex-logo.webp') }}" alt="indomaret" width="300"
                        class="my-2">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('dist/logo/mangadex-logo.webp') }}" alt="indomaret" width="300"
                        class="my-2">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('dist/logo/mangadex-logo.webp') }}" alt="indomaret" width="300"
                        class="my-2">
                </div>
            </div>
        </div>
    </section>

    <!-- WHY US SECTION -->
    <section class="whyUs" style="background-color: #efefef;">
        <div class="container py-5">
            <h1 style="font-size: 30px" class="text-center">ALASAN KENAPA KAMI MITRA YANG TEPAT UNTUK ANDA</h1>
            <div class="row mt-5 gap-4">
                <div class="col-lg bg-white p-3 rounded">
                    <div class="inner d-flex justify-content-between align-items-center">
                        <img src="{{ asset('dist/icons/responsive.svg') }}" alt="responsive" width="145">
                        <div class="d-flex flex-column">
                            <h1 style="font-size: 20px">DESAIN MODERN DAN RESPONSIVE</h1>
                            <p>Tampil maksimal di semua perangkat. Mulai dari smartphone hingga desktop.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg bg-white p-3 rounded">
                    <div class="inner d-flex justify-content-between align-items-center">
                        <img src="{{ asset('dist/icons/terjangkau.svg') }}" alt="responsive" width="145">
                        <div class="d-flex flex-column">
                            <h1 style="font-size: 20px">HARGA TERJANGKAU & FLEKSIBEL</h1>
                            <p>Paket jasa kami bisa disesuaikan dengan kebutuhan dan anggaranmu.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 gap-4">
                <div class="col-lg bg-white p-3 rounded">
                    <div class="inner d-flex justify-content-between align-items-center">
                        <img src="{{ asset('dist/icons/cepat.svg') }}" alt="responsive" width="145">
                        <div class="d-flex flex-column">
                            <h1 style="font-size: 20px">SEO & KECEPATAN TEROPTIMASI</h1>
                            <p>Website cepat, ringan, dan mudah ditemukan di mesin pencari.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg bg-white p-3 rounded">
                    <div class="inner d-flex justify-content-between align-items-center">
                        <img src="{{ asset('dist/icons/support.svg') }}" alt="responsive" width="145">
                        <div class="d-flex flex-column">
                            <h1 style="font-size: 20px">DUKUNGAN & REVISI</h1>
                            <p>Tim kami siap membantu hingga website kamu benar-benar siap digunakan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PRICE SECTION -->
    <section class="price my-5">
        <div class="container py-4">
            <div class="header mt-3">
                <h1 style="font-size: 14px; color: #3A7CA5; width: 25%; border-radius: 30px;"
                    class="bg-white p-3 text-center mx-auto">DAFTAR HARGA PAKET WEBSITE</h1>
                <div class="d-flex justify-content-center gap-2 my-4">
                    <button class="btn btn-warning py-2 px-4" style="color: #252525; font-size: 13px;">PROFILE
                        COMPANY</button>
                    <button class="btn btn-transparent py-2 px-3 border border-white"
                        style="color: #fefefe; font-size: 13px;">TOKO ONLINE</button>
                </div>
            </div>

            <h1 class="fw-bold text-white text-center mt-5">Pembuatan Website Company Profile</h1>

            <div class="row gap-3">

                <div class="col-lg my-4 bg-white rounded py-5">
                    <div class="inner text-center p-3">
                        <h1 style="font-size: 16px;" class="fw-bold m-0">PAKET UMKM</h1>
                        <p class="m-0" style="font-size: 14px">Cocok untuk Pemula</p>
                        <h2 class="m-5">CALL US</h2>
                        <hr class="mx-3">
                        <button class="btn px-4 py-2 text-white" style="background-color: #3A7CA5">
                            Konsultasi dengan kami
                        </button>
                    </div>
                </div>

                <div class="col-lg my-4 bg-white rounded py-5">
                    <div class="inner text-center p-3">
                        <h1 style="font-size: 16px;" class="fw-bold m-0">PAKET UMKM</h1>
                        <p class="m-0" style="font-size: 14px">Cocok untuk Pemula</p>
                        <h2 class="m-5">CALL US</h2>
                        <hr class="mx-3">
                        <button class="btn px-4 py-2 text-white" style="background-color: #3A7CA5">
                            Konsultasi dengan kami
                        </button>
                    </div>
                </div>

                <div class="col-lg my-4 bg-white rounded py-5">
                    <div class="inner text-center p-3">
                        <h1 style="font-size: 16px;" class="fw-bold m-0">PAKET UMKM</h1>
                        <p class="m-0" style="font-size: 14px">Cocok untuk Pemula</p>
                        <h2 class="m-5">CALL US</h2>
                        <hr class="mx-3">
                        <button class="btn px-4 py-2 text-white" style="background-color: #3A7CA5">
                            Konsultasi dengan kami
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- TESTIMONIAL SECTION -->
    <section class="testimonial" style="background-color: #efefef">
        <div class="container py-5">
            <div class="mb-5">
                <h1 style="font-size: 30px">TESTIMONIAL</h1>
                <p>Berikut tanggapan klien kami yang puas terhadap layanan kami</p>
            </div>
            <div class="row gap-4">

                <div class="col-lg bg-white p-4 rounded">
                    <div class="inner">
                        <div class="d-flex align-items-center gap-4">
                            <img src="{{ asset('dist/images/profile.jpg') }}" alt="profile" width="60"
                                class="rounded-circle">
                            <div class="d-flex flex-column">
                                <p class="fw-bold m-0 p-0">Pak Zulfikar</p>
                                <p class="m-0 p-0">zulfikar.yasin@gmail.com</p>
                            </div>
                        </div>
                        <p class="py-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.
                        </p>
                    </div>
                </div>

                <div class="col-lg bg-white p-4 rounded">
                    <div class="inner">
                        <div class="d-flex align-items-center gap-4">
                            <img src="{{ asset('dist/images/profile.jpg') }}" alt="profile" width="60"
                                class="rounded-circle">
                            <div class="d-flex flex-column">
                                <p class="fw-bold m-0 p-0">Pak Zulfikar</p>
                                <p class="m-0 p-0">zulfikar.yasin@gmail.com</p>
                            </div>
                        </div>
                        <p class="py-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.
                        </p>
                    </div>
                </div>

                <div class="col-lg bg-white p-4 rounded">
                    <div class="inner">
                        <div class="d-flex align-items-center gap-4">
                            <img src="{{ asset('dist/images/profile.jpg') }}" alt="profile" width="60"
                                class="rounded-circle">
                            <div class="d-flex flex-column">
                                <p class="fw-bold m-0 p-0">Pak Zulfikar</p>
                                <p class="m-0 p-0">zulfikar.yasin@gmail.com</p>
                            </div>
                        </div>
                        <p class="py-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BLOG SECTION -->
    <section class="blog" style="background-color: #efefef">
        <div class="container py-5">
            <div class="mb-5">
                <h1 style="font-size: 30px">TIPS & WAWASAN DARI KAMI</h1>
                <p>Kami percaya edukasi adalah bagian dari pelayanan. Baca berbagai artikel seputar pengembangan
                    website, teknologi web, dan strategi digital terbaru dari tim Qnoite.</p>
            </div>

            <!-- BLOG SECTION -->
            <div class="row gap-1">

                <!-- BLOG CARD -->
                <div class="col-lg">
                    <div class="shadow-sm"
                        style="background-color: #fefefe; border-radius: 10px; border: 1px solid rgba(43, 43, 43, 0.07);">
                        <div class="img">
                            <img src="{{ asset('dist/images/bg-about.jpg') }}" alt="vps-image" height="200"
                                style="border-radius: 10px 10px 0 0; filter: brightness(80%); object-fit: cover; width: 100%;">
                        </div>
                        <div class="p-4">
                            <h1 style="font-size: 22px;">5 Ciri Website yang Profesional dan Efektif</h1>
                            <p>Pelajari elemen penting yang membuat website bisnismu tampil kredibel dan menarik.</p>

                            <a href="#" class="text-primary" style="text-decoration: none;">Lihat
                                selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- BLOG CARD -->
                <div class="col-lg">
                    <div class="shadow-sm"
                        style="background-color: #fefefe; border-radius: 10px; border: 1px solid rgba(43, 43, 43, 0.07);">
                        <div class="img">
                            <img src="{{ asset('dist/images/bg-about.jpg') }}" alt="vps-image" height="200"
                                style="border-radius: 10px 10px 0 0; filter: brightness(80%); object-fit: cover; width: 100%;">
                        </div>
                        <div class="p-4">
                            <h1 style="font-size: 22px;">5 Ciri Website yang Profesional dan Efektif</h1>
                            <p>Pelajari elemen penting yang membuat website bisnismu tampil kredibel dan menarik.</p>

                            <a href="#" class="text-primary" style="text-decoration: none;">Lihat
                                selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- BLOG CARD -->
                <div class="col-lg">
                    <div class="shadow-sm"
                        style="background-color: #fefefe; border-radius: 10px; border: 1px solid rgba(43, 43, 43, 0.07);">
                        <div class="img">
                            <img src="{{ asset('dist/images/bg-about.jpg') }}" alt="vps-image" height="200"
                                style="border-radius: 10px 10px 0 0; filter: brightness(80%); object-fit: cover; width: 100%;">
                        </div>
                        <div class="p-4">
                            <h1 style="font-size: 22px;">5 Ciri Website yang Profesional dan Efektif</h1>
                            <p>Pelajari elemen penting yang membuat website bisnismu tampil kredibel dan menarik.</p>

                            <a href="#" class="text-primary" style="text-decoration: none;">Lihat
                                selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- BLOG CARD -->
                <div class="col-lg">
                    <div class="shadow-sm"
                        style="background-color: #fefefe; border-radius: 10px; border: 1px solid rgba(43, 43, 43, 0.07);">
                        <div class="img">
                            <img src="{{ asset('dist/images/bg-about.jpg') }}" alt="vps-image" height="200"
                                style="border-radius: 10px 10px 0 0; filter: brightness(80%); object-fit: cover; width: 100%;">
                        </div>
                        <div class="p-4">
                            <h1 style="font-size: 22px;">5 Ciri Website yang Profesional dan Efektif</h1>
                            <p>Pelajari elemen penting yang membuat website bisnismu tampil kredibel dan menarik.</p>

                            <a href="#" class="text-primary" style="text-decoration: none;">Lihat
                                selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- COMPANY PROFILE -->
    <section class="profile" style="background-color: #81C3D7">
        <div class="container d-flex justify-between align-items-center gap-5 py-5">
            <img src="{{ asset('dist/images/qnoite.png') }}" alt="COMPANY" width="400" class="rounded">
            <div class="d-flex flex-column">
                <h1 style="font-size: 30px;">Qnoite Projects</h1>
                <p>Qnoite adalah penyedia layanan pembuatan website profesional yang didirikan pada tahun 2025. Qnoite
                    mengutamakan pengembangan website yang berkualitas, kecepatan website, dan desain modern.Kami
                    membantu bisnis dan individu membangun kehadiran digital yang kuat, sekaligus mendukung pengembangan
                    teknologi melalui proyek eksperimental seperti Qnoitelabs.</p>
                <a href="/" class="bg-transparent w-25 text-center rounded py-2"
                    style="text-decoration: none; border: 1px solid #252525; color: #252525;"> Profile Kami </a>
            </div>
        </div>
    </section>

    <!-- QNOITELABS SECTION -->
    <section class="qnoitelabs">
        <div class="container py-5">
            <div class="text-white">
                <h1 style="font-size: 30px;">QNOITELABS : EXPERIMEN TEKNOLOGI DARI QNOITE</h1>
                <p>Selain menyediakan layanan pengembangan website, Qnoite juga mengelola proyek khusus bernama
                    Qnoitelabs ruang eksplorasi teknologi yang berfokus pada pengembangan kernel Android, optimasi
                    sistem, dan eksperimen software berbasis open source. </p>
                <div class="d-flex gap-4">
                    <a href="/" class="bg-white w-25 text-center rounded py-2"
                        style="text-decoration: none; color: #252525;"> Kunjungi Qnoitelabs. </a>
                    <a href="/" class="bg-transparent w-25 text-center rounded py-2 text-white"
                        style="text-decoration: none; border: 1px solid #fefefe;"> Lihat Project </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <footer class="p-5" style="background-color: #2F6690;">
        <div class="container">
            <div class="row">

                <div class="col-lg mt-2">
                    <h1 class="text-white" style="font-size: 26px;">Products</h1>
                    <ul class="list-unstyled">
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">Home</li>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">Pricing</li>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">Products</li>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">VPS List</li>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">Support Center</li>
                        </a>
                    </ul>
                </div>

                <div class="col-lg mt-2">
                    <h1 class="text-white" style="font-size: 26px;">Informasi</h1>
                    <ul class="list-unstyled">
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">Home</li>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">Pricing</li>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">Products</li>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">VPS List</li>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <li class="text-white pt-2">Support Center</li>
                        </a>
                    </ul>
                </div>

                <!-- BRANDING SECTION -->
                <div class="col-lg-6 text-white">
                    <img src="{{ asset('dist/logo/qnoite_logo-white.png') }}" alt="qnoite.com" width="130" class="mb-3">
                    <p>Qnoite adalah penyedia layanan pembuatan website profesional. Kami membantu bisnis dan individu membangun kehadiran digital yang kuat, sekaligus mendukung pengembangan teknologi melalui proyek eksperimental seperti Qnoitelabs.</p>
                    <a href="#" style="text-decoration: none;">
                        <div class="btn btn-md px-4 py-2" style="background-color: #fefefe;">
                            <div class="d-flex flex-row gap-4 align-items-center">
                                <img src="{{ asset('dist/icons/whatsapp.svg') }}" alt="whatsapp" width="27"
                                    height="27">
                                <p class="fw-bold text-success m-0">Konsultasi dengan kami</p>
                            </div>
                        </div>
                    </a>
                </div>

                <p class="text-white mt-5" style="opacity: 50%;">© Qnoiteprojects 2025. All rights reserved.</p>

            </div>
        </div>
    </footer>


</body>

</html>
