{{-- NAVBAR SECTION --}}
<nav
    class="container-fluid navbar navbar-expand-lg py-3 d-flex flex-row {{ request()->is(['information/*', 'whistlist', 'user-edit', 'frequently-asked-question']) ? 'fixed-top nav-bg' : 'fixed-top' }}">

    <div class="container px-4 px-sm-0" data-aos="fade-down" data-aos-duration="1100">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="qnoite" width="90">
        </a>

        @if (!Auth::user())
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        @else
            <div class="users d-flex d-md-none align-items-center">

                <div class="image">
                    @if (Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}'s pfp"
                            class="rounded-circle ms-3" style="max-width: 38px; cursor: pointer;"
                            onclick="opensidebar()" title="Buka Sidebar">
                    @else
                        <img src="{{ asset('dist/images/profile.jpg') }}" alt="{{ Auth::user()->name }}'s pfp"
                            class="rounded-circle ms-3" style="max-width: 38px; cursor: pointer;"
                            onclick="opensidebar()" title="Buka Sidebar">
                    @endif
                </div>

            </div>
        @endif


        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav ps-4 ps-sm-0">

                @if (Auth::user())
                    <li class="nav-item d-flex align-items-center me-4 position-relative">
                        <p class="nav-link m-0 me-3" id="categoryDropdown" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            Kategori
                        </p>

                        {{-- CATEGORY DROPDOWN --}}
                        <div class="dropdown-menu mt-3 w-75" aria-labelledby="categoryDropdown"
                            style="top: 100%; left: 0;">
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2"
                                href="/portofolio/categories/1" title="Umkm">
                                <img src="{{ asset('dist/icons/umkm.svg') }}" alt="umkm" width="40">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold" style="font-size: 20px;">Umkm</span>
                                    <small class="p-0 m-0">Ideal untuk usaha startup</small>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2"
                                href="/portofolio/categories/2" title="Bisnis">
                                <img src="{{ asset('dist/icons/bisnis.svg') }}" alt="bisnis" width="40">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold" style="font-size: 20px;">Bisnis</span>
                                    <small class="p-0 m-0">Ideal untuk usaha menengah</small>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center gap-3 py-2"
                                href="/portofolio/categories/3" title="Corporate">
                                <img src="{{ asset('dist/icons/corporate.svg') }}" alt="corporate" width="40">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold" style="font-size: 20px;">Corporate</span>
                                    <small class="p-0 m-0">Ideal untuk instansi & perusahaan</small>
                                </div>
                            </a>
                        </div>


                        <form action="{{ route('home.portofolios.main') }}" method="GET" autocomplete="off"
                            novalidate>
                            @csrf

                            <div class="d-flex">
                                <input type="text" name="search" id="search" placeholder="Cari produk"
                                    class="form-control @if (request()->is(['information/*', 'whistlist', 'user-edit', 'frequently-asked-question'])) form-dark @else form @endif"
                                    style="background-color: transparent;">

                                {{-- Submit button --}}
                                <button type="submit" class="btn text-white px-3">
                                    <img src="{{ asset('dist/icons/search.svg') }}" alt="search" width="35"
                                        title="Cari sekarang">
                                </button>
                            </div>

                        </form>
                    </li>
                @else
                    <li class="nav-item active me-3">
                        <a class="nav-link @if (request()->is('/')) active-link @endif" href="/">Home</a>
                    </li>
                    <li class="nav-item active me-3">
                        <a class="nav-link @if (request()->is('profile')) active-link @endif"
                            href="/profile">Profile</a>
                    </li>
                    <li class="nav-item active me-3">
                        <a class="nav-link @if (request()->is(['portofolio', 'portofolio/*'])) active-link @endif" href="/portofolio">Demo
                            website</a>
                    </li>
                    <li class="nav-item active me-3">
                        <a class="nav-link @if (request()->is(['article', 'article/*'])) active-link @endif"
                            href="/article">Blog</a>
                    </li>
                    <li class="nav-item active me-3">
                        <a class="nav-link @if (request()->is('frequently-asked-question')) active-link @endif"
                            href="/frequently-asked-question">FAQ</a>
                    </li>
                @endif

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <div class="d-none d-md-flex users align-items-center">
                        <div class="name">
                            <p class="fw-bold text-white p-0 m-0 nav-link">
                                {{ Auth::user()->name }}
                            </p>
                        </div>

                        <div class="image">
                            @if (Auth::user()->image)
                                <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                    alt="{{ Auth::user()->name }}'s pfp" class="rounded-circle ms-3"
                                    style="max-width: 38px; cursor: pointer;" onclick="opensidebar()"
                                    title="Buka Sidebar">
                            @else
                                <img src="{{ asset('dist/images/profile.jpg') }}" alt="{{ Auth::user()->name }}'s pfp"
                                    class="rounded-circle ms-3" style="max-width: 38px; cursor: pointer;"
                                    onclick="opensidebar()" title="Buka Sidebar">
                            @endif
                        </div>

                    </div>
                @endguest

            </ul>

        </div>
    </div>

</nav>
