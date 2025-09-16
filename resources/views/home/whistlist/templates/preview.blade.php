<section class="list-daftarKeinginan" style="background-color: #efefef;">
    <div class="container pb-3" style="padding-top: 7rem;">
        <h2 class="fw-bold mb-4">Keranjang Belanja Anda</h2>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (!$whistlistItems->isEmpty())
            {{-- Cek jika cartItems tidak kosong --}}
            <div class="row gx-4">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            @foreach ($whistlistItems as $item)
                                {{-- Loop melalui CartItem --}}
                                @if ($item->product)
                                    {{-- Pastikan produk terkait masih ada --}}
                                    <div class="row align-items-center mb-4 pb-4 border-bottom">
                                        <div class="col-md-2">
                                            <div
                                                class="card shadow-sm border-0 h-100 d-flex flex-column text-decoration-none text-dark position-relative overflow-hidden">
                                                @if ($item->product->image)
                                                    <img src="{{ asset('storage/' . ($item->product->image ?? 'placeholder.png')) }}"
                                                        alt="{{ $item->product->title }}" class="img-fluid rounded">
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
                                                {{ $item->product->title }}
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
                                            @if ($item->product->price > 0)
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
                                            <form action="{{ route('home.whistlist.remove', $item->product->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                            <a href="https://wa.me/{{ $item->product->user->phone }}"
                                                class="btn btn-sm btn-success">
                                                Hubungi penjual
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        Produk "{{ $item->product_name ?? 'Tidak Dikenal' }}" ({{ $item->quantity }}x)
                                        tidak lagi tersedia. <form
                                            action="{{ route('home.whistlist.remove', $item->id) }}" method="POST"
                                            class="d-inline">@csrf @method('DELETE')<button type="submit"
                                                class="btn btn-link p-0 m-0 align-baseline">Hapus</button></form>
                                    </div>
                                @endif
                            @endforeach
                            <a href="{{ route('home.product.main') }}" class="btn btn-outline-primary">Lanjut
                                Belanja</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center py-4" role="alert">
                Keranjang belanja Anda kosong. <br> <a href="{{ route('home.product.main') }}" class="alert-link">Mulai
                    belanja sekarang!</a>
            </div>
        @endif

    </div>
</section>
