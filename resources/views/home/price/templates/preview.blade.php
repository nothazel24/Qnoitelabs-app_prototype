<section style="background-color: #EFEFEF; margin-top: 4.5rem;">

    <div class="container">
        <div class="row d-flex align-items-center" style="height: 80dvh;">
            <div class="col-lg-4">
                {{-- IMAGE SECTION --}}
                @if ($products->image)
                    <div class="ratio ratio-1x1">
                        <img class="card-img-top object-fit-cover rounded"
                            src="{{ asset('storage/' . $products->image) }}" alt="Gambar Produk: {{ $products->title }}">
                    </div>
                @else
                    <div class="ratio ratio-1x1 rounded d-flex align-items-center"
                        style="background: linear-gradient(rgba(25, 135, 84, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
                    </div>
                @endif
            </div>

            <div class="col-lg-8">
                {{-- CONTENT SECTION --}}
                <div class="card-body p-4 p-md-5">
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
                        <span>
                            <i class="fas fa-info-circle me-1"></i> Status:
                            @if ($products->status)
                                <span class="badge bg-primary">Published</span>
                            @else
                                <span class="badge bg-danger">Draft</span>
                            @endif
                        </span>
                    </div>

                    <hr class="my-3">

                    {{-- TABLE SECTION --}}
                    <div class="row">
                        <div class="col-lg-5 col-sm-6">
                            <p>Harga</p>
                            <p>Stock</p>
                            <p>Diskon</p>
                            <p>Harga setelah diskon</p>
                        </div>
                        <div class="col-lg-1 d-none d-md-block">
                            @for ($i = 0; $i < 4; $i++)
                                <p>:</p>
                            @endfor
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <p>Rp{{ number_format($products->price, 0, ',', '.') }}</p>
                            <p>{{ $products->stock }}</p>
                            <p>{{ number_format($products->discount, 0, ',', '.') }} %</p>
                            <p>Rp{{ number_format($products->price - ($products->price * $products->discount) / 100, 0, ',', '.') ?? '-' }}
                            </p>
                        </div>
                    </div>

                    {{-- PRODUCT DESCRIPTION --}}
                    <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                        <h1 style="font-size: 20px;" class="fw-bold">Deskripsi produk</h1>
                        {!! $products->content !!}
                    </div>

                    <hr class="my-3">

                    {{-- BUTTON SECTION --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/price" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar produk
                        </a>
                    </div> {{-- END OF BUTTON SECTION --}}

                </div> {{-- END OF CONTENT SECTION --}}
            </div>
        </div>
    </div>

</section>
