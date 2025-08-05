<section class="list-artikel" style="background-color: #efefef;">
    <div class="container py-5">

        <div class="header">

            <h1 style="font-size: 30px;" class="pb-2">Kategori</h1>
            @include('home.article.templates.categories')
            <hr class="py-2 my-2">

        </div>

        {{-- ARTICLE LIST --}}
        <div class="row">
            <div class="col-lg-9 mb-4">
                <div class="row">

                    @forelse ($articles as $key => $val)
                        @if ($key == 0 && !empty($articles) && count($articles) > 0)
                            @continue
                        @endif

                        <div class="col-lg-6">

                            <div class="shadow-sm mb-4"
                                style="background-color: #fefefe; border-radius: 10px; border: 1px solid rgba(43, 43, 43, 0.07);">
                                @if ($val->image)
                                    <div class="img">
                                        <img src="{{ asset('storage/' . $val->image) }}"
                                            alt="gambar-{{ $val->title }}"
                                            style="border-radius: 10px 10px 0 0; filter: brightness(80%); object-fit: cover; width: 100%;">
                                    </div>
                                @else
                                    <div class="card-img-top d-flex align-items-center justify-content-center text-white-50 ratio ratio-16x9"
                                        style=" background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center; border-radius: 10px 10px 0 0;">
                                        MyBlog Image
                                    </div>
                                @endif
                                <div class="p-4">
                                    <h1 style="font-size: 22px;">{{ Str::limit($val->title, 30) }}</h1>
                                    <p class="card-text flex-grow-1">
                                        <small>{{ Str::limit(strip_tags($val->meta_desc), 120) }}</small>
                                        <br>
                                        <small class="text-muted">Diperbaharui:
                                            {{ $val->updated_at->format('d M Y') }}</small>
                                    </p>

                                    <a href="/article/{{ $val->slug }}" class="text-primary"
                                        style="text-decoration: none;">Lihat
                                        selengkapnya</a>
                                </div>
                            </div>

                        </div>

                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                Belum ada artikel yang tersedia.
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>

            @include('home.article.templates.information')

        </div>

        <div class="d-flex justify-content-center">
            {{ $articles->links('pagination::bootstrap-4') }}
        </div>

    </div>
</section>