@if (Auth::user())

    {{-- OFF CANVAS MENU --}}
    <div id="offCanvas" class="sidebar shadow shadow-lg">

        <div class="users d-flex align-items-center justify-content-between ms-2">
            <div class="d-flex align-items-center">
                <div class="image">
                    @if (Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}'s pfp"
                            class="rounded-circle ms-3" style="max-width: 40px; cursor: pointer;"
                            title="{{ Auth::user()->name }}">
                    @else
                        <img src="{{ asset('dist/images/profile.jpg') }}" alt="{{ Auth::user()->name }}'s pfp"
                            class="rounded-circle ms-3" style="max-width: 40px; cursor: pointer;"
                            title="{{ Auth::user()->name }}">
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
                <a href="#" title="Pengaturan" style="text-decoration: none;">
                    <img src="{{ asset('dist/icons/user-sidebar/settings.svg') }}" alt="Pengaturan" width="25"
                        style="opacity: 80%;">
                </a>
            </div>
        </div>

        <div class="link mt-4 ms-3">
            <ul>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/home.svg') }}" alt="beranda" width="20">
                    <a class="nav-link @if (request()->is('/')) active-link @endif" href="/">Home</a>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/our_profile.svg') }}" alt="Tentang kami"
                        width="20">
                    <a class="nav-link @if (request()->is('profile')) active-link @endif" href="/profile">Profile</a>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/article.svg') }}" alt="Blog" width="20">
                    <a class="nav-link @if (request()->is(['article', 'article/*'])) active-link @endif" href="/article">Artikel</a>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/contact_us.svg') }}" alt="Kontak" width="20">
                    <a class="nav-link @if (request()->is('contact')) active-link @endif" href="/contact">Kontak</a>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/price.svg') }}" alt="paket & harga" width="20">
                    <a class="nav-link @if (request()->is(['price', 'price/*'])) active-link @endif" href="/price">Paket &
                        harga</a>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li class="d-flex align-items-center">
                        <img src="{{ asset('dist/icons/user-sidebar/dashboard.svg') }}" alt="Whistlist" width="20">
                        <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                    </li>
                @else
                    <li class="d-flex align-items-center">
                        <img src="{{ asset('dist/icons/user-sidebar/notification.svg') }}" alt="Notifikasi"
                            width="20">
                        <a class="nav-link @if (request()->is('notification')) active-link @endif"
                            href="#">Notifikasi</a>
                    </li>
                    <li class="d-flex align-items-center">
                        <img src="{{ asset('dist/icons/user-sidebar/whistlist.svg') }}" alt="Whistlist" width="20">
                        <a class="nav-link @if (request()->is('whistlist')) active-link @endif"
                            href="/whistlist">Whistlist</a>
                    </li>
                @endif
                <li class="d-flex align-items-center">
                    <img src="{{ asset('dist/icons/user-sidebar/logout.svg') }}" alt="logout" width="20">
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
            <img src="{{ asset('dist/icons/user-sidebar/hide_sidebar.svg') }}" alt="close" width="25">
        </span>

    </div>

@endif
