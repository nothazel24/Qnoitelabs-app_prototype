<!-- WRAPPER FLEX CONTAINER -->
<div class="d-flex justify-content-center align-items-center min-vh-100">

    <!-- ISI FORM & GAMBAR -->
    <div class="d-flex flex-row align-items-center justify-content-around gap-5 container">

        <!-- GAMBAR -->
        <div class="test">
            <img src="{{ asset('dist/images/bg-login.png') }}" alt="login-image" width="400" class="shadow"
                style="border-radius: 10px; filter: brightness(70%); object-fit: cover;">
        </div>

        <!-- FORM LOGIN -->
        <div class="w-50">
            <h1 style="color: #3A7CA5;">Selamat datang!</h1>
            <p>Silahkan masukkan data diri anda.</p>

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
                        <a href="#" style="text-decoration: none; color: #3A7CA5;">Lupa password?</a>
                        <button type="submit" class="btn text-white px-4" style="background-color: #3A7CA5;">Sign
                            in</button>
                    </div>

                </form>
            </div>

        </div>

    </div>
</div>
