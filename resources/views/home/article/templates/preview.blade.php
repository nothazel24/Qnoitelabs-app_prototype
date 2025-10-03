<section class="article-{{ $articles->slug }}" style="background-color: #fefefe; overflow-x: hidden;">

    @include('layouts.userDetail')

    <div class="container-fluid position-relative p-0 m-0" style="height: 450px;">
        @if ($articles->image)
            <img class="w-100" src="{{ asset('storage/' . $articles->image) }}"
                alt="Gambar Artikel: {{ $articles->title }}"
                style="filter: brightness(75%); object-fit: cover; height: 450px;">
        @else
            <img class="w-100" src="{{ asset('dist/images/default-banner.svg') }}"
                alt="Gambar Artikel: {{ $articles->title }}"
                style="filter: brightness(80%); object-fit: cover; height: 450px;">
        @endif
    </div>

    <div class="container">
        <div class="py-5 px-4 px-md-0" data-aos="fade-right" data-aos-duration="1100">
            <h1 class="mb-3" style="font-size: 2rem; font-weight: 700;">{{ $articles->title }}
            </h1>
            <div class="text-muted mb-4 d-flex flex-wrap align-items-center small">
                <span class="me-3">
                    <i class="fas fa-user me-1"></i> Penulis: <a href="#" data-bs-toggle="modal"
                        data-bs-target="#userDetail" data-user-image="{{ $articles->user->image }}"
                        data-user-name="{{ $articles->user->name }}" data-user-email="{{ $articles->user->email }}"
                        data-user-phone="{{ $articles->user->phone }}"
                        data-user-instagram="{{ $articles->user->instagram }}"
                        style="cursor: pointer; text-decoration: none; color: #252525;" class="fw-bold"
                        title="Lihat detail">
                        {{ $articles->user->name }}
                    </a>
                </span>
                <span class="me-3">
                    <i class="fas fa-tag me-1"></i> Kategori:
                    <strong>{{ $articles->category->name }}</strong>
                </span>
                <span class="me-3">
                    <i class="fas fa-calendar-alt me-1"></i> Dibuat:
                    {{ $articles->created_at->format('d M Y H:i') }}
                </span>
            </div>

            <hr class="my-3">

            <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                {!! $articles->content !!}
            </div>

            <hr class="my-3">

            <div class="d-flex justify-content-between align-items-center">
                <a href="/article" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Artikel
                </a>
            </div>
        </div>
    </div>

</section>
