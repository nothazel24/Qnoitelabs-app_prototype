@extends('admin.master')

@section('content')
    <div class="px-4 my-5" style="margin-left: 5rem;" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-4">
                    {{-- IMAGE SECTION --}}
                    @if ($product->image)
                        <div class="ratio ratio-1x1">
                            <img class="card-img-top object-fit-cover rounded" src="{{ asset('storage/' . $product->image) }}"
                                alt="Gambar Produk: {{ $product->title }}">
                        </div>
                    @else
                        <div class="ratio ratio-1x1 rounded d-flex align-items-center"
                            style="background: linear-gradient(rgba(25, 135, 84, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
                        </div>
                    @endif
                </div>

                <div class="col-lg-8">
                    {{-- CONTENT SECTION --}}
                    <div class="card-body px-3">
                        <h1 class="card-title mb-3" style="font-size: 2rem; font-weight: 700;">{{ $product->title }}</h1>
                        <div class="text-muted mb-4 d-flex flex-wrap align-items-center small"> {{-- Mengurangi ukuran font meta --}}
                            <span class="me-3">
                                <i class="fas fa-user me-1"></i> Penjual: <strong>{{ $product->user->name }}</strong>
                            </span>
                            <span class="me-3">
                                <i class="fas fa-tag me-1"></i> Kategori:
                                <strong>{{ $product->website_category->name }}</strong>
                            </span>
                            <span class="me-3">
                                <i class="fas fa-calendar-alt me-1"></i> Dibuat:
                                {{ $product->created_at->format('d M Y H:i') }}
                            </span>
                            <span>
                                <i class="fas fa-info-circle me-1"></i> Status:
                                @if ($product->status)
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
                                <p>Diskon</p>
                                <p>Harga setelah diskon</p>
                            </div>
                            <div class="col-lg-1 d-none d-md-block">
                                @for ($i = 0; $i < 3; $i++)
                                    <p>:</p>
                                @endfor
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <p>Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                <p>{{ number_format($product->discount, 0, ',', '.') }} %</p>
                                <p>Rp{{ number_format($product->price - ($product->price * $product->discount) / 100, 0, ',', '.') ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <hr class="p-0 m-0">

                        {{-- PRODUCT DESCRIPTION --}}
                        <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                            <h1 style="font-size: 20px;" class="fw-bold">Deskripsi produk</h1>
                            {!! $product->content !!}
                        </div>

                        {{-- BUTTON SECTION --}}
                        <div class="d-flex justify-content-between align-items-center my-4">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar produk
                            </a>
                            @if (Auth::check() && (Auth::user()->id === $product->user_id || Auth::user()->isAdmin()))
                                <div>
                                    <a href="{{ route('admin.products.edit', $product->slug) }}"
                                        class="btn btn-warning text-white me-2">
                                        <i class="fas fa-edit me-2"></i> Edit Produk
                                    </a>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmation"
                                        data-action="{{ route('admin.products.destroy', $product->slug) }}"
                                        data-id="{{ $product->slug }}">
                                        <i class="fas fa-trash-alt"></i> Hapus Produk
                                    </button>
                                </div>
                            @endif
                        </div> {{-- END OF BUTTON SECTION --}}

                    </div> {{-- END OF CONTENT SECTION --}}
                </div>
            </div>

    </div>
@endsection
