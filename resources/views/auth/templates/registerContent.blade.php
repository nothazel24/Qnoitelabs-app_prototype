<!-- WRAPPER FLEX CONTAINER -->
<div class="d-flex justify-content-center align-items-center min-vh-100">

    <div class="d-flex flex-column me-5">
        <img src="{{ asset('dist/images/bg-login.png') }}" alt="login-image" width="400" class="shadow"
            style="border-radius: 10px; filter: brightness(70%); object-fit: cover;">
    </div>

    <!-- FORM LOGIN -->
    <div class="w-50">

        <div class="px-5 py-4 shadow" style="background-color: #fefefe; border-radius: 10px;">

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

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" placeholder="email@example.com" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
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

                <div class="mb-3">
                    <label class="form-label">No. Handphone</label>
                    <input type="text" name="phone" placeholder="+62 xxx xxx xxx" value="{{ old('phone') }}"
                        class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="">Pilih Jenis Kelamin</option>
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

                <div class="mb-4">
                    <label for="instagram" class="form-label">Username Instagram (Opsional)</label>
                    <input id="instagram" type="text" name="instagram" value="{{ old('instagram') }}"
                        class="form-control @error('instagram') is-invalid @enderror" autocomplete="off">
                    @error('instagram')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
