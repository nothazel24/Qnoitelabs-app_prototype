<div class="d-flex justify-content-center align-items-center min-vh-100 px-3">

    <div class="col-12 col-md-8 col-lg-6">

        <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="login-image" class="img-fluid mx-auto my-4"
            style="max-width: 150px;">

        <div class="p-4 p-md-5 shadow" style="background-color: #fefefe; border-radius: 10px;">

            <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" placeholder="email@example.com" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" placeholder="********"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                    <div class="d-flex flex-column gap-2 text-center text-md-start">
                        <a href="/register" class="text-decoration-none" style="color: #3A7CA5;">Registrasi</a>
                        <a href="/forgot-password" class="text-decoration-none" style="color: #3A7CA5;">Lupa
                            password?</a>
                    </div>
                    <button type="submit" class="btn text-white px-4 py-2"
                        style="background-color: #3A7CA5; border-radius: 8px;">
                        Sign in
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
