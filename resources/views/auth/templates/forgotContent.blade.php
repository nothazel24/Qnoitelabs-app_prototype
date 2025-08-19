<div class="d-flex justify-content-center align-items-center min-vh-100">

    <div class="w-50">

        <div class="d-flex flex-row align-items-center my-4">
            <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="login-image" width="200">
            <h1 class="px-3 fw-bold" style="font-size: 30px; color: #3A7CA5; margin-top: 2.8rem;">Forgot password</h1>
        </div>

        <div class="p-5 shadow" style="background-color: #fefefe; border-radius: 10px;">

            <form action="{{ route('password.email') }}" method="POST" autocomplete="off" novalidate>
                @csrf

                <div class="mb-4">
                    <label class="form-label">Masukkan email anda:</label>
                    <input type="email" name="email" placeholder="email@example.com" class="form-control" required>
                </div>

                @if (session('status'))
                    <p>{{ session('status') }}</p>
                @endif

                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-footer d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column gap-2">
                        <a href="/login" style="text-decoration: none; color: #3A7CA5;">Kembali</a>
                    </div>
                    <button type="submit" class="btn text-white px-4" style="background-color: #3A7CA5;">Kirim</button>
                </div>

            </form>

        </div>
    </div>
</div>
