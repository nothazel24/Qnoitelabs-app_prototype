<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top navbar-minimal shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold me-3" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="qnoite-logo" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link @yield('homeActive')" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}
                    </a>
                </li>

                @if (Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link @yield('usersActive')"
                            href="{{ route('admin.users.index') }}">{{ __('Pengguna') }}
                        </a>
                    </li>
                @endif

                @if (Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link @yield('categoriesActive')"
                            href="{{ route('admin.categories.index') }}">{{ __('Kategori Artikel') }}
                        </a>
                    </li>
                @endif

                @if (Auth::user()->isAdmin() || Auth::user()->isAuthor())
                    <li class="nav-item">
                        <a class="nav-link @yield('articlesActive')"
                            href="{{ route('admin.article.index') }}">{{ __('Artikel') }}
                        </a>
                    </li>
                @endif

                @if (Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link @yield('webCategoriesActive')"
                            href="{{ route('admin.webCategories.index') }}">{{ __('Website') }}
                        </a>
                    </li>
                @endif

                @if (Auth::user()->isAdmin() || Auth::user()->isAuthor())
                    <li class="nav-item">
                        <a class="nav-link @yield('productsActive')"
                            href="{{ route('admin.products.index') }}">{{ __('Produk') }}
                        </a>
                    </li>
                @endif

                @if (Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link @yield('informationActive')"
                            href="{{ route('admin.information.index') }}">{{ __('Informasi') }}</a>
                    </li>
                @endif
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold text-primary" href="#"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} ({{ Auth::user()->role }})
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                            {{ __('Profile') }}
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                        <hr class="my-2">
                        <a class="dropdown-item" href="/">
                            {{ __('Back to Home') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
