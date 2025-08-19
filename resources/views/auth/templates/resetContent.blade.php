<div class="d-flex justify-content-center align-items-center min-vh-100">

    <div class="w-50">

        <div class="d-flex flex-row align-items-center my-4">
            <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="login-image" width="200">
            <h1 class="px-3 fw-bold" style="font-size: 30px; color: #3A7CA5; margin-top: 2.8rem;">Reset password</h1>
        </div>

        <div class="p-5 shadow" style="background-color: #fefefe; border-radius: 10px;">

            <form action="{{ route('password.update') }}" method="POST" autocomplete="off" novalidate>
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

                <div class="mb-3">
                    <label class="form-label">Password Baru:</label>
                    <input type="password" name="password" placeholder="*******" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi password:</label>
                    <input type="password" name="password_confirmation" placeholder="*******" class="form-control"
                        required>
                </div>

                <button type="submit" class="btn text-white px-4 w-100" style="background-color: #3A7CA5;">Reset
                    password</button>

            </form>

        </div>
    </div>
</div>
