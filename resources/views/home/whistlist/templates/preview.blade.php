<section class="list-daftarKeinginan" style="background-color: #efefef;">
    <div class="container pb-3" style="padding-top: 7rem;">
        <h2 class="fw-bold mb-4">Keranjang Belanja Anda</h2>

        @if (!$whistlistItems->isEmpty())
            <div class="row gx-4">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            @foreach ($whistlistItems as $item)
                                @if ($item->portofolio)
                                    <div class="row align-items-center mb-4 pb-4 border-bottom">
                                        <div class="col-md-2">
                                            <div
                                                class="card shadow-sm border-0 h-100 d-flex flex-column text-decoration-none text-dark position-relative overflow-hidden">
                                                @if ($item->portofolio->image)
                                                    <img src="{{ asset('storage/' . ($item->portofolio->image ?? 'placeholder.png')) }}"
                                                        alt="{{ $item->portofolio->title }}" class="img-fluid rounded">
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle text-muted"
                                                        style="height: 144px;">
                                                        No Image
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <h5 class="mb-1">
                                                {{ $item->portofolio->title }}
                                            </h5>
                                            @php
                                                $itemPrice = $item->price_at_add;
                                                $finalItemPrice = $itemPrice;

                                                if ($item->discount_at_add > 0) {
                                                    $discountAmountPerUnit =
                                                        $itemPrice * ($item->discount_at_add / 100);
                                                    $finalItemPrice = $itemPrice - $discountAmountPerUnit;
                                                }
                                            @endphp
                                            @if ($item->portofolio->price > 0)
                                                <p class="mb-0">
                                                    <span
                                                        class="badge bg-danger me-1">{{ number_format($item->discount_at_add, 0, ',', '.') }}%
                                                        OFF</span>
                                                    <s class="text-muted small">
                                                        Rp{{ number_format($itemPrice, 0, ',', '.') }}
                                                    </s>
                                                </p>
                                                <p class="fw-bold text-success mb-0">
                                                    Rp{{ number_format($finalItemPrice, 0, ',', '.') }}</p>
                                            @else
                                                <p class="fw-bold text-success mb-0">
                                                    Rp{{ number_format($itemPrice, 0, ',', '.') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-3 text-end d-flex gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmation"
                                                data-action="{{ route('home.whistlist.remove', $item->portofolio->id) }}"
                                                data-id="{{ $item->portofolio->id }}">
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        Produk "{{ $item->portofolio_name ?? 'Tidak Dikenal' }}" tidak lagi tersedia.
                                        <form action="{{ route('home.whistlist.remove', $item->id) }}" method="POST"
                                            class="d-inline">@csrf @method('DELETE')<button type="submit"
                                                class="btn btn-link p-0 m-0 align-baseline">Hapus</button>
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                            <a href="{{ route('home.portofolios.main') }}" class="btn btn-outline-primary">Lanjut
                                Belanja</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-secondary text-center py-4" role="alert">
                <p class="p-0 m-0">Daftar keinginanmu kosong nih, mulai cari produk yang pas buat kamu yuk!</p>
                <a href="{{ route('home.portofolios.main') }}" class="alert-link">Mulai
                    belanja sekarang!</a>
            </div>
        @endif

    </div>
</section>
