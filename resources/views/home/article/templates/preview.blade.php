<article class="article-{{ $articles->slug }}" style="background-color: #fefefe; overflow-x: hidden;">

    @include('layouts.userDetail')

    <div class="container-fluid position-relative p-0 m-0" style="height: 450px;">
        @if ($articles->image)
            <img class="w-100 img-fluid" src="{{ asset('storage/' . $articles->image) }}"
                alt="Gambar Artikel: {{ $articles->title }}"
                style="filter: brightness(75%); object-fit: cover; height: 450px;">
        @else
            <img class="w-100 img-fluid" src="{{ asset('dist/images/default-banner.webp') }}"
                alt="Gambar Artikel: {{ $articles->title }}"
                style="filter: brightness(80%); object-fit: cover; height: 450px;">
        @endif
    </div>

    <div class="container px-3 px-md-0">
        <div class="pt-5 pb-3" data-aos="fade-right" data-aos-duration="1100">
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
                    {{ $articles->created_at->diffForHumans() }}
                </span>
            </div>

            <hr class="my-3">

            <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                {!! $articles->content !!}
            </div>

        </div>

        {{-- Form Tambah Komentar --}}
        <hr class="mb-4">
        <h1 class="h4 h3-sm h2-md h1-lg fw-semibold">
            Apakah artikel diatas membantu? Tuliskan pendapat anda!
        </h1>
        <form action="{{ route('home.comment.store', $articles->slug) }}" method="POST">
            @csrf
            <div class="position-relative my-4">
                <textarea name="content" class="form-control" placeholder="Tulis komentar..." rows="5"
                    style="resize: none; padding-right: 80px;"></textarea>

                <button type="submit" class="btn text-white btn-sm position-absolute px-3"
                    style="bottom: 8px; right: 8px; background-color: #3A7CA5;">
                    Kirim
                </button>
            </div>
        </form>

        {{-- List Komentar --}}
        <div class="border rounded p-3 mb-4">
            <h1 class="mb-4" style="font-size: 20px;">Komentar :</h1>

            @if ($articles->comments->isNotEmpty())
                @foreach ($articles->comments as $comment)
                    <div class="inner mx-3 mb-3 border-bottom pb-3">
                        <div class="d-flex align-items-center justify-content-between">

                            <div class="user d-flex align-items-center">
                                @if ($comment->user->image)
                                    <img src="{{ asset('storage/' . $comment->user->image) }}"
                                        alt="foto-{{ $comment->user->name }}" width="50"
                                        class="rounded-circle me-3">
                                @else
                                    <img src="{{ asset('dist/images/profile.webp') }}"
                                        alt="foto-{{ $comment->user->name }}" width="50"
                                        class="rounded-circle me-3">
                                @endif
                                <div class="d-flex flex-column">
                                    <p class="p-0 m-0"><strong>{{ $comment->user->name }}</strong></p>
                                    <p class="p-0 m-0 text-muted" style="font-size: 13px;">
                                        {{ $comment->updated_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>

                            @if (Auth::check() && Auth::id() == $comment->user_id)
                                <div class="extras d-flex align-items-center gap-2">
                                    <button class="btn btn-sm" style="background-color: #3A7CA5;"
                                        onclick="toggleEditForm({{ $comment->id }})">
                                        <img src="{{ asset('dist/icons/edit.svg') }}" alt="edit" width="20">
                                    </button>
                                    <form action="{{ route('home.comment.destroy', [$articles->slug, $comment->id]) }}"
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <img src="{{ asset('dist/icons/delete.svg') }}" alt="delete"
                                                width="20">
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>

                        <hr class="my-3">

                        <p id="comment-text-{{ $comment->id }}" class="p-0 m-0">{{ $comment->content }}</p>

                        <form id="edit-form-{{ $comment->id }}"
                            action="{{ route('home.comment.update', [$articles->slug, $comment->id]) }}" method="POST"
                            class="d-none mt-2">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <textarea name="content" class="form-control" placeholder="Edit komentar..." rows="5"
                                    style="resize: none; padding-right: 80px;">{{ $comment->content }}</textarea>

                                <div class="d-flex position-absolute gap-2" style="bottom: 8px; right: 8px;">
                                    <button type="submit" class="btn btn-success text-white btn-sm">
                                        <img src="{{ asset('dist/icons/save.svg') }}" alt="save" width="20">
                                    </button>
                                    <button type="submit" class="btn btn-danger text-white btn-sm"
                                        onclick="toggleEditForm({{ $comment->id }})">
                                        <img src="{{ asset('dist/icons/cancel.svg') }}" alt="cancel"
                                            width="20">
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                @endforeach
            @else
                <p class="p-0 m-0">Jadilah orang pertama yang berkomentar disini!</p>
            @endif
        </div>
    </div>

</article>

@push('scripts')
    <script>
        function toggleEditForm(commentId) {
            const form = document.getElementById(`edit-form-${commentId}`);
            const text = document.getElementById(`comment-text-${commentId}`);

            // toggle visibility
            form.classList.toggle('d-none');
            text.classList.toggle('d-none');
        }
    </script>
@endpush
