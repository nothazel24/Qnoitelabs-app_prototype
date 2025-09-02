{{-- NOTIFICATION --}}
@if (session('messages'))
    <div class="modal fade" id="flashModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-{{ session('type') }}">
                    <h5 class="modal-title text-white">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="my-2">{{ session('messages') }}</p>
                </div>
                <div class="modal-footer">
                    <p style="font-weight: bold; font-style: italic; font-size: 10px;">Qnoite.com - Jasa penyedia
                        website terpercaya</p>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- WRAPPER FLEX CONTAINER -->
<div class="d-flex justify-content-center align-items-center min-vh-100">

    <!-- FORM LOGIN -->
    <div class="w-50">

        <div class="d-flex flex-row align-items-center my-4">
            <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="login-image" width="200">
            <h1 class="px-3 fw-bold" style="font-size: 30px; color: #3A7CA5; margin-top: 2.8rem;">Login</h1>
        </div>

        <div class="p-5 shadow" style="background-color: #fefefe; border-radius: 10px;">

            <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" placeholder="email@example.com" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" placeholder="********" value="{{ old('password') }}"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-footer d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column gap-2">
                        <a href="/register" style="text-decoration: none; color: #3A7CA5;">Registrasi</a>
                        <a href="/forgot-password" style="text-decoration: none; color: #3A7CA5;">Lupa password?</a>
                    </div>
                    <button type="submit" class="btn text-white px-4" style="background-color: #3A7CA5;">Sign
                        in</button>
                </div>

            </form>

        </div>
    </div>
</div>
