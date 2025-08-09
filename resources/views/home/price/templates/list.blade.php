<section class="list-artikel" style="background-color: #efefef;">
    <div class="container py-5">

        <div class="header">

            <h1 style="font-size: 30px;" class="pb-2">Kategori</h1>
            @include('home.price.templates.categories')
            <hr class="py-2 my-2">

        </div>

        {{-- PRODUCT LIST --}}
        <div class="row">
            <div class="col-lg-9 mb-4">

                {{-- FEATURED ARTICLE --}}
                @if (request()->is('price') && request()->get('page') == null || request()->get('page') == 1)

                    @if (!empty($products) && count($products) > 0)
                        @php
                            $featuredProduct = $products->first();
                        @endphp

                        <div class="container-fluid position-relative p-0 mb-4" style="height: 350px;">

                            @if ($featuredProduct->image)
                                <div class="img">
                                    <img src="{{ asset('storage/' . $featuredProduct->image) }}"
                                        alt="gambar-{{ $featuredProduct->title }}"
                                        style="border-radius: 10px; filter: brightness(80%); object-fit: cover; width: 100%; height: 350px;">
                                </div>

                                <div class="container position-absolute start-50 translate-middle text-white"
                                    style="top: 65%;">
                                    <div class="px-4 px-md-0 mb-5 mb-md-0">
                                        <span class="badge bg-danger mb-3 fw-bold">TOP RATING</span>
                                        <h1 class="fw-bold">{{ $featuredProduct->title }}</h1>
                                        <p class="w-50">{{ Str::limit(strip_tags($featuredProduct->meta_desc), 250) }}
                                        </p>
                                        <a href="/price/{{ $featuredProduct->slug }}" class="btn text-white fw-bold rounded-pill shadow px-4" style="background-color: #3A7CA5">Lihat
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            @else
                                <div class="img">
                                    <img src="https://github.com/nothazel24/nothazel24/blob/main/assets/banner.png?raw=true"
                                        alt="gambar-{{ $featuredProduct->title }}"
                                        style="border-radius: 10px; filter: brightness(80%); object-fit: cover; width: 100%; height: 350px;">
                                </div>

                                <div class="container position-absolute start-50 translate-middle text-white"
                                    style="top: 65%;">
                                    <div class="px-4 px-md-0 mb-5 mb-md-0">
                                        <span class="badge bg-danger mb-3 fw-bold">TOP RATING</span>
                                        <h1 class="fw-bold">{{ $featuredProduct->title }}</h1>
                                        <p class="w-50">{{ Str::limit(strip_tags($featuredProduct->meta_desc), 250) }}
                                        </p>
                                        <a href="/price/{{ $featuredProduct->slug }}" class="btn text-white fw-bold rounded-pill shadow px-4" style="background-color: #3A7CA5">Lihat
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endif

                @endif

                {{-- ARTICLE CARD --}}
                <div class="row">

                    @forelse ($products as $key => $val)
                        @if ($key == 0 && !empty($products) && count($products) > 0)
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
                                        style=" background: url('https://github.com/nothazel24/nothazel24/blob/main/assets/banner.png?raw=true'); background-size: cover; background-position: center; border-radius: 10px 10px 0 0; filter: brightness(80%);">
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

                                    <a href="/price/{{ $val->slug }}" class="text-primary"
                                        style="text-decoration: none;">Lihat
                                        selengkapnya</a>
                                </div>
                            </div>

                        </div>

                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                Belum ada produk yang tersedia.
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>

            @include('home.price.templates.information')

        </div>

        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>

    </div>
</section>