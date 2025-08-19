@extends('admin.master')

@section('content')
    <div class="px-4 my-5" style="margin-left: 5rem;" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0 rounded-lg">
                    @if ($article->image)
                        <div class="ratio ratio-21x9">
                            <img class="card-img-top object-fit-cover rounded-top"
                                src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel: {{ $article->title }}">
                        </div>
                    @else
                        <div class="ratio ratio-21x9 rounded-top d-flex align-items-center"
                            style="background: linear-gradient(rgba(25, 135, 84, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
                        </div>
                    @endif
                    <div class="card-body p-4 p-md-5">
                        <h1 class="card-title mb-3" style="font-size: 2rem; font-weight: 700;">{{ $article->title }}</h1>
                        <div class="text-muted mb-4 d-flex flex-wrap align-items-center small">
                            <span class="me-3">
                                <i class="fas fa-user me-1"></i> Penulis: <strong>{{ $article->user->name }}</strong>
                            </span>
                            <span class="me-3">
                                <i class="fas fa-tag me-1"></i> Kategori: <strong>{{ $article->category->name }}</strong>
                            </span>
                            <span class="me-3">
                                <i class="fas fa-calendar-alt me-1"></i> Dibuat:
                                {{ $article->created_at->format('d M Y H:i') }}
                            </span>
                            <span>
                                <i class="fas fa-info-circle me-1"></i> Status:
                                @if ($article->status)
                                    <span class="badge bg-primary">Published</span>
                                @else
                                    <span class="badge bg-danger">Draft</span>
                                @endif
                            </span>
                        </div>

                        <hr class="my-3">

                        <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                            {!! $article->content !!}
                        </div>

                        <hr class="my-3">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.article.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Artikel
                            </a>
                            @if (Auth::check() && (Auth::user()->id === $article->user_id || Auth::user()->isAdmin()))
                                <div>
                                    <a href="{{ route('admin.article.edit', $article->slug) }}"
                                        class="btn btn-warning text-white me-2">
                                        <i class="fas fa-edit me-2"></i> Edit Artikel
                                    </a>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmation"
                                        data-action="{{ route('admin.article.destroy', $article->slug) }}"
                                        data-id="{{ $article->slug }}">
                                        <i class="fas fa-trash-alt"></i> Hapus Artikel
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
