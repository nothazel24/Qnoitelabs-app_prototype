<!-- WRAPPER FLEX CONTAINER -->
<div class="d-flex justify-content-center align-items-center min-vh-100">

    <!-- FORM LOGIN -->
    <div class="w-75">

        <div class="d-flex flex-row align-items-center mb-4">
            <img src="{{ asset('dist/logo/qnoite_logo.png') }}" alt="login-image" width="200">
            <h1 class="px-3 fw-bold" style="font-size: 30px; color: #3A7CA5; margin-top: 2.8rem;">Register</h1>
        </div>

        <div class="p-5 shadow" style="background-color: #fefefe; border-radius: 10px;">

            <form action="{{ route('register') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input id="name" type="text" name="name" placeholder="Nama lengkap anda"
                        value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required
                        autofocus autocomplete="name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">No. Handphone</label>
                        <input type="text" name="phone" id="phone" placeholder="+62 xxx xxx xxx" value="{{ old('phone') }}"
                            class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                            <option value="Lainnya" {{ old('gender') == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya</option>
                        </select>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" placeholder="email@example.com" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" placeholder="********" value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi
                            Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="********" class="form-control" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-footer d-flex justify-content-between align-items-center">
                    <a href="/login" style="text-decoration: none; color: #3A7CA5;">Sudah punya akun?</a>
                    <button type="submit" class="btn text-white px-4"
                        style="background-color: #3A7CA5;">Register</button>
                </div>

            </form>
        </div>

    </div>
</div>
