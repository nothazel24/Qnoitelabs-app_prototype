<section class="article pt-3" style="background-color: #efefef">
    <div class="container py-5">
        <div class="mb-5 px-3 px-md-0">
            <h1 style="font-size: 30px">TIPS & WAWASAN DARI KAMI</h1>
            <p>Kami percaya edukasi adalah bagian dari pelayanan. Baca berbagai artikel seputar pengembangan
                website, teknologi web, dan strategi digital terbaru dari tim Qnoite.</p>
            <hr class="p-0 m-0" style="width: 40px; height: 3px; border: none; background-color: rgba(30, 30, 30, 0.80);">
        </div>

        {{-- BLOG SECTION --}}
        <div class="article-wrapper px-3 px-md-0">
            <div class="row flex-nowrap overflow-auto">

                @forelse ($articles as $key => $val)
                    @if ($key == 0 && !empty($articles) && count($articles) > 0)
                        @continue
                    @endif

                    <!-- BLOG CARD -->
                    <div class="col-lg mb-4 mb-md-0">
                        <div class="card shadow-sm box-animated-down"
                            style="background-color: #fefefe; border-radius: 10px; border: 1px solid rgba(43, 43, 43, 0.07);">
                            @if ($val->image)
                                <div class="img">
                                    <img src="{{ asset('storage/' . $val->image) }}" alt="gambar-{{ $val->title }}"
                                        style="border-radius: 10px 10px 0 0; object-fit: cover; width: 100%;">
                                </div>
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center text-white-50 ratio ratio-16x9"
                                    style=" background: url({{ asset('dist/images/default-banner.svg') }}); background-size: cover; background-position: center; border-radius: 10px 10px 0 0;">
                                </div>
                            @endif
                            <div class="p-4">
                                <h1 style="font-size: 22px;">{{ Str::limit($val->title, 18) }}</h1>
                                <p class="card-text flex-grow-1 py-2 m-0">
                                    {{ Str::limit(strip_tags($val->meta_desc), 120) }}
                                </p>
                                <p class="small text-muted">
                                    {{ $val->updated_at->diffForHumans() }}
                                </p>

                                <div class="mt-4">
                                    <a href="/article/{{ $val->slug }}"
                                        class="text-white px-3 py-2 rounded-pill small fw-bold shadow"
                                        style="text-decoration: none; background-color: #3A7CA5;">Lihat
                                        selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="alert alert-secondary text-center box-animated-down" role="alert">
                            Belum ada artikel yang tersedia.
                        </div>
                    </div>
                @endforelse

            </div>
        </div>

    </div>
</section>
