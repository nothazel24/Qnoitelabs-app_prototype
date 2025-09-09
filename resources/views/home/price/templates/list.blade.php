<section class="list-produk" style="background-color: #efefef;">
    <div class="container py-5">

        {{-- PRODUCT LIST --}}
        <div class="row">
            <div class="col-lg-12 mb-4">

                {{-- FEATURED ARTICLE --}}
                @if ((request()->is('price') && request()->get('page') == null) || request()->get('page') == 1)

                    @if (!empty($products) && count($products) > 0)
                        @php
                            $featuredProduct = $products->first();
                        @endphp

                        <p class="fw-bold">Produk unggulan kami</p>
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
                                        <a href="/price/{{ $featuredProduct->slug }}"
                                            class="btn text-white fw-bold rounded-pill shadow px-4"
                                            style="background-color: #3A7CA5">Lihat
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
                                        <a href="/price/{{ $featuredProduct->slug }}"
                                            class="btn text-white fw-bold rounded-pill shadow px-4"
                                            style="background-color: #3A7CA5">Lihat
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endif

                @endif

                {{-- PRODUCT LIST --}}
                <div class="row">

                    <p class="fw-bold">Produk kami</p>
                    @forelse ($products as $val)
                        <div class="col-lg-3">

                            {{-- PRODUCT CARD --}}
                            <a href="/price/{{ $val->slug }}" class="text-dark" style="text-decoration: none;">
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
                                            Product Image
                                        </div>
                                    @endif
                                    <div class="p-4">
                                        <h1 style="font-size: 22px;">{{ Str::limit($val->title, 30) }}</h1>
                                        <p class="p-0 m-0" style="font-size: 22px;">
                                            Rp{{ number_format($val->price - ($val->price * $val->discount) / 100, 0, ',', '.') ?? '-' }}
                                        </p>

                                        <div class="d-flex gap-3 align-items-center">
                                            <p class="text-muted" style="font-size: 15px;">
                                                <s>Rp{{ number_format($val->price, 0, ',', '.') }}</s>
                                            </p>
                                            <p style="color: #3A7CA5; font-size: 15px;">
                                                {{ number_format($val->discount, 0, ',', '.') }} %</p>
                                        </div>

                                        <div class="d-flex gap-2 mb-2">
                                            <img src="{{ asset('dist/icons/seller.svg') }}"
                                                alt="{{ $val->user->name }}" width="18">
                                            <p style="font-size: 15px;" class="p-0 m-0">{{ $val->user->name }}</p>
                                        </div>

                                        <div class="d-flex gap-3">
                                            <div class="d-flex gap-2 align-items-center">
                                                <img src="{{ asset('dist/icons/star.svg') }}" alt="star"
                                                    width="18">
                                                <p style="font-size: 12px" class="p-0 m-0">4.4</p>
                                            </div>

                                            <p style="font-size: 12px" class="p-0 m-0">Stock : {{ $val->stock }}</p>
                                        </div>

                                    </div>
                                </div>
                            </a>

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

        </div>

        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>

    </div>
</section>
