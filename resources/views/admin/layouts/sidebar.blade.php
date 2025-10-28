<aside class="d-flex flex-column justify-content-between align-items-center rounded-end py-4 position-fixed"
    style="background-color: #3A7CA5; min-height: 100dvh; width: 5rem; z-index: 999 !important;">

    <div class="logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('dist/logo/logo-small.webp') }}" alt="qnoite-logo" width="35">
        </a>
    </div>

    <div class="links">
        <ul class="navbar-nav me-auto">

            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('dist/icons/sidebar-icons/dashboard.svg') }}" alt="dashboard" width="30"
                        title="Dashboard">
                </a>
            </li>

            {{-- IS ADMIN --}}
            @if (Auth::user()->isAdmin())
                <li class="nav-item mb-2">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        <img src="{{ asset('dist/icons/sidebar-icons/user.svg') }}" alt="users" width="30"
                            title="Pengguna">
                    </a>
                </li>

                <li class="nav-item mb-2 dropdown" data-bs-display="static">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('dist/icons/sidebar-icons/category.svg') }}" alt="categories" width="30"
                            title="Kategori">
                    </a>

                    <ul class="dropdown-menu custom-dropdown p-0">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.webCategories.index') }}">
                                Website
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.categories.index') }}">
                                Article
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item mb-2">
                    <a class="nav-link" href="{{ route('admin.information.index') }}">
                        <img src="{{ asset('dist/icons/sidebar-icons/information.svg') }}" alt="dashboard"
                            width="30" title="Informasi">
                    </a>
                </li>
            @endif

            {{-- IS ADMIN / AUTHOR --}}
            @if (Auth::user()->isAdmin() || Auth::user()->isAuthor())
                <li class="nav-item mb-2">
                    <a class="nav-link" href="{{ route('admin.article.index') }}">
                        <img src="{{ asset('dist/icons/sidebar-icons/article.svg') }}" alt="articles" width="30"
                            title="Artikel">
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.portofolios.index') }}">
                        <img src="{{ asset('dist/icons/sidebar-icons/website.svg') }}" alt="portofolio" width="30"
                            title="Portofolio">
                    </a>
                </li>
            @endif
        </ul>
    </div>

    <div class="home">
        <a href="/">
            <img src="{{ asset('dist/icons/sidebar-icons/home.svg') }}" alt="home" width="30" title="Beranda">
        </a>
    </div>

</aside>
