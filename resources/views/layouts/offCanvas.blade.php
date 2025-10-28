@if (Auth::user())

    {{-- OFF CANVAS MENU --}}
    <div id="offCanvas" class="sidebar shadow-lg">

        <div class="users d-flex align-items-center justify-content-between ms-2">
            <div class="d-flex align-items-center">
                <div class="image">
                    @if (Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}'s pfp"
                            class="rounded-circle ms-3" style="max-width: 40px; cursor: pointer;"
                            title="{{ Auth::user()->name }}" loading="lazy">
                    @else
                        <img src="{{ asset('dist/images/profile.webp') }}" alt="{{ Auth::user()->name }}'s pfp"
                            class="rounded-circle ms-3" style="max-width: 40px; cursor: pointer;"
                            title="{{ Auth::user()->name }}" loading="lazy">
                    @endif
                </div>

                <div class="d-flex flex-column ms-4">
                    <p class="fw-bold text-dark p-0 m-0">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="p-0 m-0 text-muted" style="font-size: 13px;">Qnoite {{ Auth::user()->role }}</p>
                </div>
            </div>

            <div class="user-settings">
                <a href="/user-edit" title="Edit" style="text-decoration: none;">
                    <img src="{{ asset('dist/icons/user-sidebar/settings.svg') }}" alt="Pengaturan" width="25"
                        style="opacity: 80%;" loading="lazy">
                </a>
            </div>
        </div>

        {{-- SEARCH SECTION --}}
        <form action="{{ route('home.portofolios.main') }}" method="GET" autocomplete="off" novalidate
            class="mt-3 ms-4 d-block d-md-none ">
            @csrf

            <div class="d-flex">
                <input type="text" name="search" id="search" placeholder="Cari produk" class="form-control"
                    style="background-color: transparent;">

                {{-- Submit button --}}
                <button type="submit" class="btn text-white px-3">
                    <img src="{{ asset('dist/icons/search.svg') }}" alt="search" width="35"
                        title="Cari sekarang" loading="lazy">
                </button>
            </div>

        </form>

        <div class="link mt-3 mt-md-4 ms-3">
            <ul>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/home.svg') }}" alt="beranda" width="20" loading="lazy">
                    <a class="nav-link @if (request()->is('/')) active-link @endif" href="/">Home</a>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/our_profile.svg') }}" alt="Tentang kami"
                        width="20">
                    <a class="nav-link @if (request()->is('profile')) active-link @endif" href="/profile">Profile</a>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/price.svg') }}" alt="Produk" width="20" loading="lazy">
                    <a class="nav-link @if (request()->is(['portofolio', 'portofolio/*'])) active-link @endif" href="/portofolio">Demo
                        Website</a>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/article.svg') }}" alt="Blog" width="20" loading="lazy">
                    <a class="nav-link @if (request()->is(['article', 'article/*'])) active-link @endif" href="/article">Artikel</a>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/feedback.svg') }}" alt="Feedback" width="20" loading="lazy">
                    <a class="nav-link @if (request()->is('feedback')) active-link @endif"
                        href="/feedback">Feedback</a>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/faq-black.svg') }}" alt="FAQ" width="20" loading="lazy">
                    <a class="nav-link @if (request()->is('frequently-asked-question')) active-link @endif"
                        href="/frequently-asked-question">FAQ</a>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li class="d-flex align-items-center">
                        <img src="{{ asset('dist/icons/user-sidebar/dashboard.svg') }}" alt="Whistlist" width="20" loading="lazy">
                        <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                    </li>
                @endif
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/logout.svg') }}" alt="logout" width="20" loading="lazy">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="logout" href="#" data-bs-toggle="modal" data-bs-target="#logout">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>

        <span class="close-btn" onclick="closeSidebar()">
            <img src="{{ asset('dist/icons/user-sidebar/hide_sidebar.svg') }}" alt="close" width="25" loading="lazy">
        </span>

    </div>

@endif
