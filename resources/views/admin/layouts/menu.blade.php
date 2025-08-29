{{-- USERS  --}}
<div class="d-flex justify-content-between mt-1">
    <div class="space"></div>

    <div class="users py-3 d-flex align-items-center">
        <div class="name">
            <p class="fw-bold text-primary p-0 m-0">
                {{ Auth::user()->name }} ({{ Auth::user()->role }})
            </p>
        </div>

        <div class="image">
            @if ($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}'s pfp"
                    class="rounded-circle ms-3" style="max-width: 38px;" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @else
                <img src="{{ asset('dist/images/profile.jpg') }}" alt="{{ $user->name }}'s pfp"
                    class="rounded-circle ms-3" style="max-width: 38px;" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @endif

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                    {{ __('Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item logout" href="#" data-bs-toggle="modal" data-bs-target="#logout">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>

    </div>
</div>
