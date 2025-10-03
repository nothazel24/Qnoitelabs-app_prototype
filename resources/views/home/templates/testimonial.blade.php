<section class="testimonial" style="background-color: #efefef">
    <div class="container py-5">
        <div class="mb-5 mx-4 mx-md-0">
            <h1 style="font-size: 30px">TESTIMONIAL</h1>
            <p>Berikut tanggapan klien kami yang puas terhadap layanan kami</p>
            <hr class="p-0 m-0" style="width: 40px; height: 3px; border: none; background-color: rgba(30, 30, 30, 0.80);">
        </div>
        <div class="feedback-wrapper mx-4 mx-md-0">
            <div class="row flex-nowrap overflow-auto gap-4">

                @forelse ($feedback as $val)
                    <div class="col-lg bg-white p-4 rounded shadow-sm box-animated-down">
                        <div class="inner">
                            <div class="d-flex align-items-center gap-4">
                                @if ($val->user->image)
                                    <img src="{{ asset('storage/' . $val->user->image) }}"
                                        alt="{{ $val->user->name }}'s pfp" width="60" class="rounded-circle">
                                @else
                                    <img src="{{ asset('dist/images/profile.jpg') }}" alt="{{ $val->user->name }}'s pfp"
                                        width="60" class="rounded-circle">
                                @endif
                                <div class="d-flex flex-column">
                                    <p class="fw-bold m-0 p-0">{{ $val->user->name }}</p>
                                    <p class="m-0 p-0">{{ $val->user->email }}</p>
                                </div>
                            </div>
                            <p class="py-4">
                                {{ $val->content }}
                            </p>
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
