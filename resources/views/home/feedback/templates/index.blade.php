<section class="feedback mt-md-5 pt-md-4" style="background-color: #EFEFEF;">
    <div class="container">
        <div class="row px-3 px-md-0">
            <div class="col-lg-12">
                <div class="py-5" data-aos="fade-right" data-aos-duration="1100">
                    {{-- header --}}
                    <div class="feedback-title mb-3">
                        <h1 class="p-0 m-0 mb-1" style="font-size: 2rem; font-weight: 700;">Feedback</h1>
                        <small>Pendapat anda membuat kami lebih baik.</small>
                    </div>

                    {{-- feedback form --}}
                    <div class="feedback-form card p-4 shadow-sm">
                        <form action="{{ route('home.feedback.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                                    placeholder="Masukkan E-mail anda" required>
                            </div>
                            @error('email')
                                <div class="text-danger mb-3">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="content" class="form-label">Pesan</label>
                                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Masukkan pesan anda disini"
                                    required></textarea>
                            </div>

                            {{-- reCAPTCHA section --}}
                            <div class="g-recaptcha my-3" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                            @error('g-recaptcha-response')
                                <div class="text-danger mb-3">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</section>

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
