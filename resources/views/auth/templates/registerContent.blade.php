<!-- WRAPPER FLEX CONTAINER -->
<div class="d-flex justify-content-center align-items-center min-vh-100 px-3">

    <div class="col-12 col-md-10 col-lg-8 col-xl-6">

        <img src="{{ asset('dist/logo/qnoite_logo.webp') }}" alt="register-image" class="img-fluid mx-auto my-4"
            style="max-width: 150px;">

        <div class="p-4 p-md-5 shadow" style="background-color: #fefefe; border-radius: 10px;">

            <form action="{{ route('register') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input id="name" type="text" name="name" placeholder="Nama lengkap anda"
                        value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required
                        autofocus autocomplete="name">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label">No. Handphone</label>
                        <input type="text" name="phone" id="phone" placeholder="+62 xxx xxx xxx"
                            value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
                            <option value="{{ null }}" {{ old('gender') == null ? 'selected' : '' }}>-- Pilih
                                gender --</option>
                            </option>
                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                            <option value="Lainnya" {{ old('gender') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('gender')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" placeholder="email@example.com" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" placeholder="********"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="********" class="form-control" required autocomplete="new-password">
                    </div>
                </div>

                {{-- reCAPTCHA section --}}
                <div class="g-recaptcha my-3" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                @error('g-recaptcha-response')
                    <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-4">
                    <a href="/login" class="text-decoration-none" style="color: #3A7CA5;">Sudah punya akun?</a>
                    <button type="submit" class="btn text-white px-4 py-2"
                        style="background-color: #3A7CA5; border-radius: 8px;">
                        Register
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
