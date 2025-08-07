{{-- NAVBAR SECTION --}}
<nav class="container-fluid navbar navbar-expand-lg py-3 d-flex flex-row {{ request()->is('price/*') ? 'fixed-top nav-price' : 'fixed-top'}}">

    <div class="container px-4 px-sm-0">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="qnoite" width="90">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav ps-4 ps-sm-0">

                <li class="nav-item active me-3">
                    <a class="nav-link @if (request()->is('/')) active-link @endif" href="/">Home</a>
                </li>
                <li class="nav-item active me-3">
                    <a class="nav-link @if (request()->is('profile')) active-link @endif" href="/profile">Profile</a>
                </li>
                <li class="nav-item active me-3">
                    <a class="nav-link @if (request()->is(['price', 'price/*'])) active-link @endif" href="/price">Paket &
                        harga</a>
                </li>
                <li class="nav-item active me-3">
                    <a class="nav-link @if (request()->is('contact')) active-link @endif" href="/contact">Kontak</a>
                </li>
                <li class="nav-item active me-3">
                    <a class="nav-link @if (request()->is(['article', 'article/*'])) active-link @endif" href="/article">Blog</a>
                </li>

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>

        </div>
    </div>

</nav>
