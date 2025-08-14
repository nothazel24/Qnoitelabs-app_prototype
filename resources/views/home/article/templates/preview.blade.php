<section class="article-{{ $articles->title }}" style="background-color: #fefefe; overflow-x: hidden;">

    <div class="container-fluid position-relative p-0 m-0" style="height: 450px;">
        @if ($articles->image)
            <img class="w-100" src="{{ asset('storage/' . $articles->image) }}"
                alt="Gambar Artikel: {{ $articles->title }}"
                style="filter: brightness(60%); object-fit: cover; height: 450px;">
        @else
            <img class="w-100" src="https://github.com/nothazel24/nothazel24/blob/main/assets/banner.png?raw=true"
                alt="Gambar Artikel: {{ $articles->title }}"
                style="filter: brightness(35%); object-fit: cover; height: 450px;">
        @endif
    </div>


    <div class="container">
        <div class="py-4 py-md-5" data-aos="fade-right" data-aos-duration="1100">
            <h1 class="mb-3" style="font-size: 2rem; font-weight: 700;">{{ $articles->title }}
            </h1>
            <div class="text-muted mb-4 d-flex flex-wrap align-items-center small">
                <span class="me-3">
                    <i class="fas fa-user me-1"></i> Penulis: <strong>{{ $articles->user->name }}</strong>
                </span>
                <span class="me-3">
                    <i class="fas fa-tag me-1"></i> Kategori:
                    <strong>{{ $articles->category->name }}</strong>
                </span>
                <span class="me-3">
                    <i class="fas fa-calendar-alt me-1"></i> Dibuat:
                    {{ $articles->created_at->format('d M Y H:i') }}
                </span>
                <span>
                    <i class="fas fa-info-circle me-1"></i> Status:
                    @if ($articles->status)
                        <span class="badge bg-primary">Published</span>
                    @else
                        <span class="badge bg-danger">Draft</span>
                    @endif
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
