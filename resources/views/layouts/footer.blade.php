{{-- FOOTER SECTION --}}
<footer class="px-3 py-4 p-md-5 px-md-0" style="background-color: #2F6690;">
    <div class="container">
        <div class="row gap-4 gap-md-0">
            {{-- MAP --}}
            <div class="col-lg-12 mb-0 mb-md-5">
                <div class="map p-0 m-0" id="map" style="height: 250px; border-radius: 10px;">
                </div>
            </div>

            {{-- INFORMASI KONTAK --}}
            <div class="col-lg d-flex flex-column gap-2">
                <h1 class="text-white" style="font-size: 26px;">Informasi kontak</h1>
                <a href="#" style="text-decoration: none;" class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/phone-white.svg') }}" alt="instagram" width="30" loading="lazy">
                    <p class="p-0 my-0 mx-2 text-white">+62 8xx xxx xxx</p>
                </a>
                <a href="#" style="text-decoration: none;" class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/mail-white.svg') }}" alt="instagram" width="30" loading="lazy">
                    <p class="p-0 my-0 mx-2 text-white">Qnoite@bussiness.com</p>
                </a>
            </div>

            {{-- SOCIAL MEDIA --}}
            <div class="col-lg d-flex flex-column gap-2">
                <h1 class="text-white" style="font-size: 26px;">Ikuti kami di</h1>
                <a href="#" style="text-decoration: none;" class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/instagram-white.svg') }}" alt="instagram" width="30" loading="lazy">
                    <p class="p-0 my-0 mx-2 text-white">Instagram</p>
                </a>
                <a href="#" style="text-decoration: none;" class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/facebook-white.svg') }}" alt="instagram" width="30" loading="lazy">
                    <p class="p-0 my-0 mx-2 text-white">Facebook</p>
                </a>
                <a href="#" style="text-decoration: none;" class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/linkedin-white.svg') }}" alt="instagram" width="30">
                    <p class="p-0 my-0 mx-2 text-white">LinkedIn</p>
                </a>
            </div>

            {{-- ALAMAT --}}
            <div class="col-lg">
                <h1 class="text-white" style="font-size: 26px;">Alamat</h1>
                <div class="inner d-flex align-items-center">
                    <img src="{{ asset('dist/icons/address.svg') }}" alt="Our office" width="30" loading="lazy">
                    <strong class="text-white p-0 my-0 mx-2">Bandung</strong>
                </div>
                <p class="text-white p-0 my-2">
                    Jelekong, Kp. Gugunungan 03/05<br>
                    40375
                </p>
            </div>

            {{-- MENU LAINNYA --}}
            <div class="col-lg d-flex flex-column gap-2">
                <h1 class="text-white" style="font-size: 26px;">Menu lainnya</h1>
                <a href="#" style="text-decoration: none;" class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/persyaratan.svg') }}" alt="instagram" width="30" loading="lazy">
                    <p class="p-0 my-0 mx-2 text-white">Persyaratan layanan</p>
                </a>
                <a href="/frequently-asked-question" style="text-decoration: none;" class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/faq.svg') }}" alt="instagram" width="30" loading="lazy">
                    <p class="p-0 my-0 mx-2 text-white">Pernyataan umum</p>
                </a>
            </div>
        </div>

        <hr class="my-4 my-md-5" style="color: #fefefe;">

        <div class="row gap-3 gap-md-0">

            <div class="col-lg">
                <h1 class="text-white" style="font-size: 26px;">Products</h1>
                <ul class="list-unstyled">
                    <a href="/" style="text-decoration: none;">
                        <li class="text-white pt-2">Home</li>
                    </a>
                    <a href="/profile" style="text-decoration: none;">
                        <li class="text-white pt-2">Tentang kami</li>
                    </a>
                    <a href="/portofolio" style="text-decoration: none;">
                        <li class="text-white pt-2">Demo website</li>
                    </a>
                </ul>
            </div>

            <div class="col-lg">
                <h1 class="text-white" style="font-size: 26px;">Informasi</h1>
                <ul class="list-unstyled">
                    <a href="/article" style="text-decoration: none;">
                        <li class="text-white pt-2">Artikel</li>
                    </a>
                    <a href="/information" style="text-decoration: none;">
                        <li class="text-white pt-2">Informasi</li>
                    </a>
                    <a href="#" style="text-decoration: none;">
                        <li class="text-white pt-2">Support Center</li>
                    </a>
                    <a href="/feedback" style="text-decoration: none;">
                        <li class="text-white pt-2">Feedback</li>
                    </a>
                </ul>
            </div>

            <!-- BRANDING SECTION -->
            <div class="col-lg-6 text-white">
                <img src="{{ asset('dist/logo/qnoite_logo-white.webp') }}" alt="qnoite.com" width="130"
                    class="mb-3" loading="lazy">
                <p>Qnoite adalah penyedia layanan pembuatan website profesional. Kami membantu bisnis dan individu
                    membangun kehadiran digital yang kuat, sekaligus mendukung pengembangan teknologi melalui proyek
                    eksperimental seperti Qnoitelabs.</p>
                <a href="#" style="text-decoration: none;">
                    <div class="btn btn-md px-4 py-2" style="background-color: #fefefe;">
                        <div class="d-flex flex-row gap-4 align-items-center">
                            <img src="{{ asset('dist/icons/whatsapp.svg') }}" alt="whatsapp" width="27"
                                height="27" loading="lazy">
                            <p class="fw-bold text-success m-0">Konsultasi dengan kami</p>
                        </div>
                    </div>
                </a>
            </div>

            <p class="text-white mt-5" style="opacity: 50%;">© Qnoiteprojects 2025. All rights reserved.</p>

        </div>
    </div>
</footer>

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{ asset('js/map.js') }}"></script>
@endpush
