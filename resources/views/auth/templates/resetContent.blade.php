<div class="d-flex justify-content-center align-items-center min-vh-100 px-3">

    <div class="col-12 col-md-8 col-lg-6 col-xl-4">

        <img src="{{ asset('dist/logo/qnoite_logo.webp') }}" alt="login-image" class="img-fluid my-4 mx-auto"
            style="max-width: 150px;">

        <div class="p-4 p-md-5 shadow" style="background-color: #fefefe; border-radius: 10px;">

            <form action="{{ route('password.update') }}" method="POST" autocomplete="off" novalidate>
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

                <div class="mb-3">
                    <label class="form-label">Password Baru:</label>
                    <input type="password" name="password" placeholder="*******"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password:</label>
                    <input type="password" name="password_confirmation" placeholder="*******" class="form-control"
                        required>
                </div>

                <button type="submit" class="btn text-white px-4 py-2 w-100"
                    style="background-color: #3A7CA5; border-radius: 8px;">
                    Reset Password
                </button>

            </form>

        </div>
    </div>
</div>
