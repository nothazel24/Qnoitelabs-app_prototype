<section class="testimonial pb-3" style="background-color: #efefef">
    <div class="container py-5">
        <div class="mb-5 px-3 px-md-0">
            <h1 style="font-size: 30px">TESTIMONIAL</h1>
            <p>Berikut tanggapan klien kami yang puas terhadap layanan kami</p>
            <hr class="p-0 m-0" style="width: 40px; height: 3px; border: none; background-color: rgba(30, 30, 30, 0.80);">
        </div>
        <div class="feedback-wrapper mx-3 mx-md-0">
            <div class="row flex-nowrap overflow-auto gap-4">

                @forelse ($feedback as $val)
                    <div class="col-lg bg-white rounded p-4 shadow-sm box-animated-down">
                        <div class="inner d-flex flex-column">
                            <div class="d-flex align-items-center gap-4 flex-wrap">
                                @if ($val->user->image)
                                    <img src="{{ asset('storage/' . $val->user->image) }}"
                                        alt="{{ $val->user->name }}'s pfp" width="60"
                                        class="rounded-circle flex-shrink-0">
                                @else
                                    <img src="{{ asset('dist/images/profile.webp') }}" alt="{{ $val->user->name }}'s pfp"
                                        width="60" class="rounded-circle flex-shrink-0">
                                @endif

                                <div class="d-flex flex-column flex-grow-1">
                                    <p class="fw-bold m-0 p-0 text-truncate">{{ $val->user->name }}</p>
                                    <p class="m-0 p-0 text-truncate">{{ $val->user->email }}</p>
                                </div>
                            </div>

                            <p class="pt-4 mb-2">
                                {{ $val->content }}
                            </p>

                            <small class="text-muted">Qnoite's {{ $val->user->role }}</small>
                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="alert alert-secondary text-center box-animated-down" role="alert">
                            Belum ada feedback yang tersedia.
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</section>
