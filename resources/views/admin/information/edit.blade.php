@extends('admin.master')

@section('content')
    <div class="px-4 my-5" style="margin-left: 5rem;" data-aos="fade-up">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.information.index') }}">Informasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Informasi</li>
            </ol>
        </nav>
        <hr><br>

        {{-- Summernote CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Data Informasi
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.information.update', $information->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Tambahkan metode PUT untuk update --}}

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="title" class="form-label">Judul Informasi</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $information->title) }}"
                                        required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="meta_desc" class="form-label">Meta Deskripsi</label>
                                    <input type="text" class="form-control @error('meta_desc') is-invalid @enderror"
                                        id="meta_desc" name="meta_desc"
                                        value="{{ old('meta_desc', $information->meta_desc) }}" required>
                                    @error('meta_desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="content" class="form-label">Konten</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10"
                                        required>{{ old('content', $information->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Status Informasi</label>
                                    <div class="d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input @error('status') is-invalid @enderror"
                                                type="radio" name="status" id="statusDraft" value="0"
                                                {{ old('status', $information->status ? 1 : 0) == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusDraft">
                                                Draft
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('status') is-invalid @enderror"
                                                type="radio" name="status" id="statusPublished" value="1"
                                                {{ old('status', $information->status ? 1 : 0) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusPublished">
                                                Published
                                            </label>
                                        </div>
                                    </div>
                                    @error('status')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update Informasi</button>
                            <a href="{{ route('admin.information.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    {{-- Summernote CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    {{-- jQuery (diperlukan oleh Summernote) --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- Summernote JS --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Summernote pada textarea dengan ID 'content'
            $('#content').summernote({
                placeholder: 'Tulis konten informasi di sini...',
                tabsize: 2,
                height: 300, // Tinggi editor
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endpush
