<div class="d-flex justify-content-center align-items-center min-vh-100 px-3">

    <div class="col-12 col-md-8 col-lg-6 col-xl-4">

        <img src="{{ asset('dist/logo/qnoite_logo.webp') }}" alt="login-image" class="img-fluid d-block mx-auto my-4"
            style="max-width: 150px;">

        <div class="p-4 p-md-5 shadow" style="background-color: #fefefe; border-radius: 10px;">

            <form action="{{ route('password.email') }}" method="POST" autocomplete="off" novalidate>
                @csrf

                <div class="mb-4">
                    <label class="form-label">Masukkan email anda:</label>
                    <input type="email" name="email" placeholder="email@example.com"
                        class="form-control @error('email') is-invalid @enderror" required>
                </div>

                @if (session('status'))
                    <p class="text-success small">{{ session('status') }}</p>
                @endif

                @error('email')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-3">
                    <a href="/login" class="text-decoration-none" style="color: #3A7CA5;">Kembali</a>
                    <button type="submit" class="btn text-white px-4 py-2"
                        style="background-color: #3A7CA5; border-radius: 8px;">
                        Kirim
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
