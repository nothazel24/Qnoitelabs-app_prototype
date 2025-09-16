<section class="product-{{ $products->slug }}" style="background-color: #EFEFEF;">

    <div class="container pb-5 pb-md-0" style="padding-top: 7rem;">

        <div class="row">

            <div class="col-lg-4" data-aos="fade-right" data-aos-duration="1100">
                {{-- BREADCRUMB --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/price" class="text-decoration-none">Daftar
                                Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ Str::limit($products->title, 50) }}</li>
                    </ol>
                </nav>

                {{-- IMAGE SECTION --}}
                @if ($products->image)
                    <div class="ratio ratio-1x1">
                        <img class="card-img-top object-fit-cover rounded"
                            src="{{ asset('storage/' . $products->image) }}"
                            alt="Gambar Produk: {{ $products->title }}">
                    </div>
                @else
                    <div class="ratio ratio-1x1 rounded d-flex align-items-center"
                        style="background: linear-gradient(rgba(25, 135, 84, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
                    </div>
                @endif
            </div>

            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="800">
                {{-- CONTENT SECTION --}}
                <div class="card-body p-4">
                    <h1 class="card-title mb-3" style="font-size: 2rem; font-weight: 700;">{{ $products->title }}</h1>
                    <div class="text-muted mb-4 d-flex flex-wrap align-items-center small"> {{-- Mengurangi ukuran font meta --}}
                        <span class="me-3">
                            <i class="fas fa-user me-1"></i> Penjual: <strong>{{ $products->user->name }}</strong>
                        </span>
                        <span class="me-3">
                            <i class="fas fa-tag me-1"></i> Kategori:
                            <strong>{{ $products->website_category->name }}</strong>
                        </span>
                        <span class="me-3">
                            <i class="fas fa-calendar-alt me-1"></i> Dibuat:
                            {{ $products->created_at->format('d M Y H:i') }}
                        </span>
                    </div>

                    <hr class="my-3">

                    {{-- TABLE SECTION --}}
                    <div class="row">
                        <div class="col-lg-5 col-sm-6">
                            <p>Harga</p>
                            {{-- <p>Stock</p> --}}
                            <p>Diskon</p>
                            <p>Harga setelah diskon</p>
                        </div>
                        <div class="col-lg-1 d-none d-md-block">
                            @for ($i = 0; $i < 3; $i++)
                                <p>:</p>
                            @endfor
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <p>Rp{{ number_format($products->price, 0, ',', '.') }}</p>
                            {{-- <p>{{ $products->stock }}</p> --}}
                            <p>{{ number_format($products->discount, 0, ',', '.') }} %</p>
                            <p>Rp{{ number_format($products->price - ($products->price * $products->discount) / 100, 0, ',', '.') ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <hr class="m-0 p-0">

                    {{-- PRODUCT DESCRIPTION --}}
                    <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                        <h1 style="font-size: 20px;" class="fw-bold">Deskripsi produk</h1>
                        {!! $products->content !!}
                    </div>

                    <div class="d-flex justify-content-between my-4">
                        <a href="#" class="btn btn-sm btn-outline-success py-3 px-5">
                            Order Sekarang
                        </a>
                        <form action="{{ route('home.whistlist.add', $products->slug) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-danger p-3 rounded-circle" title="Whislist">
                                <img src="{{ asset('dist/icons/whistlist.svg') }}" alt="Whistlist">
                            </button>
                        </form>
                    </div>


                </div> {{-- END OF CONTENT SECTION --}}
            </div>
        </div>
    </div>

</section>
