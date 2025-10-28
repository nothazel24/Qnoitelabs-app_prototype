<section class="list-artikel" style="background-color: #efefef;">
    <div class="container py-5 px-3 px-md-0">

        <div class="header mb-4">
            <h1 style="font-size: 30px;" class="p-0 m-0">List artikel</h1>
        </div>

        {{-- ARTICLE LIST --}}
        <div class="row">
            <div class="col-lg-9 mb-4">

                {{-- FEATURED ARTICLE --}}
                @if ((request()->is('article') && request()->get('page') == null) || request()->get('page') == 1)

                    @if (!empty($articles) && count($articles) > 0)
                        @php
                            $featuredArticle = $articles->first();
                        @endphp

                        <div class="container-fluid position-relative p-0 mb-4" style="height: 350px;">

                            @if ($featuredArticle->image)
                                <div class="img">
                                    <img src="{{ asset('storage/' . $featuredArticle->image) }}"
                                        alt="gambar-{{ $featuredArticle->title }}"
                                        style="border-radius: 10px; filter: brightness(80%); object-fit: cover; width: 100%; height: 350px;">
                                </div>

                                <div class="container position-absolute start-50 translate-middle text-white"
                                    style="top: 65%;">
                                    <div class="px-4 px-md-0 mb-5 mb-md-0">
                                        <span class="badge bg-danger mb-3 fw-bold">Featured Article</span>
                                        <h1 class="fw-bold">{{ $featuredArticle->title }}</h1>
                                        <p class="w-50">{{ Str::limit(strip_tags($featuredArticle->meta_desc), 250) }}
                                        </p>
                                        <a href="/article/{{ $featuredArticle->slug }}"
                                            class="btn text-white fw-bold rounded-pill shadow px-4"
                                            style="background-color: #3A7CA5">Lihat
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            @else
                                <div class="img">
                                    <img src="{{ asset('dist/images/default-banner.webp') }}"
                                        alt="gambar-{{ $featuredArticle->title }}"
                                        style="border-radius: 10px; filter: brightness(80%); object-fit: cover; width: 100%; height: 350px;">
                                </div>

                                <div class="container position-absolute start-50 translate-middle text-white"
                                    style="top: 65%;">
                                    <div class="px-4 px-md-0 mb-5 mb-md-0">
                                        <span class="badge bg-danger mb-3 fw-bold">Featured Article</span>
                                        <h1 class="fw-bold">{{ $featuredArticle->title }}</h1>
                                        <p class="w-50">{{ Str::limit(strip_tags($featuredArticle->meta_desc), 250) }}
                                        </p>
                                        <a href="/article/{{ $featuredArticle->slug }}"
                                            class="btn text-white fw-bold rounded-pill shadow px-4"
                                            style="background-color: #3A7CA5">Lihat
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endif

                @endif

                {{-- ARTICLE CARD --}}
                <div class="row">

                    @forelse ($articles as $val)
                        <div class="col-lg-6">

                            <div class="shadow-sm mb-4"
                                style="background-color: #fefefe; border-radius: 10px; border: 1px solid rgba(43, 43, 43, 0.07);">
                                @if ($val->image)
                                    <div class="img">
                                        <img src="{{ asset('storage/' . $val->image) }}"
                                            alt="gambar-{{ $val->title }}"
                                            style="border-radius: 10px 10px 0 0; filter: brightness(95%); object-fit: cover; width: 100%;">
                                    </div>
                                @else
                                    <div class="card-img-top d-flex align-items-center justify-content-center text-white-50 ratio ratio-16x9"
                                        style=" background: url({{ asset('dist/images/default-banner.webp') }}); background-size: cover; background-position: center; border-radius: 10px 10px 0 0; filter: brightness(95%);">
                                    </div>
                                @endif
                                <div class="p-4">
                                    <h1 style="font-size: 22px;">{{ Str::limit($val->title, 30) }}</h1>
                                    <p class="card-text flex-grow-1 pb-2 m-0">
                                        {{ Str::limit(strip_tags($val->meta_desc), 120) }}
                                    </p>
                                    <p class=" small text-muted">Diperbaharui:
                                        {{ $val->updated_at->diffForHumans() }}
                                    </p>

                                    <div class="mt-4">
                                        <a href="/article/{{ $val->slug }}"
                                            class="text-white px-3 py-2 rounded-pill small fw-bold shadow"
                                            style="text-decoration: none; background-color: #3A7CA5;">
                                            Lihat selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    @empty
                        <div class="col-12">
                            <div class="alert alert-secondary text-center" role="alert">
                                Belum ada artikel yang tersedia.
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>

            {{-- @include('home.article.templates.categories') --}}
            @include('home.article.templates.sidebar')

        </div>

        <div class="d-flex justify-content-center">
            {{ $articles->links('pagination::bootstrap-4') }}
        </div>

    </div>
</section>
