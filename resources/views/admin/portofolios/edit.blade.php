@extends('admin.master')

@section('content')
    <div class="px-4 my-5" style="margin-left: 5rem;" data-aos="fade-up">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.portofolios.index') }}">Portofolio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Portofolio</li>
            </ol>
        </nav>
        <hr><br>

        {{-- Summernote CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Data Portofolio
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.portofolios.update', $portofolio->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Tambahkan metode PUT untuk update --}}

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="title" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $portofolio->title) }}"
                                        required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="meta_desc" class="form-label">Meta Deskripsi</label>
                                    <input type="text" class="form-control @error('meta_desc') is-invalid @enderror"
                                        id="meta_desc" name="meta_desc"
                                        value="{{ old('meta_desc', $portofolio->meta_desc) }}" required>
                                    @error('meta_desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="image" class="form-label">Thumbnail Portofolio</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="website_category_id" class="form-label">Kategori</label>
                                    <select class="form-select @error('website_category_id') is-invalid @enderror"
                                        id="website_category_id" name="website_category_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('website_category_id', $portofolio->website_category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('website_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="content" class="form-label">Konten</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10"
                                        required>{{ old('content', $portofolio->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Status Portofolio</label>
                                    <div class="d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input @error('status') is-invalid @enderror"
                                                type="radio" name="status" id="statusDraft" value="0"
                                                {{ old('status', $portofolio->status ? 1 : 0) == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="statusDraft">
                                                Draft
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('status') is-invalid @enderror"
                                                type="radio" name="status" id="statusPublished" value="1"
                                                {{ old('status', $portofolio->status ? 1 : 0) == 1 ? 'checked' : '' }}>
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
                            <button type="submit" class="btn btn-primary">Update Produk</button>
                            <a href="{{ route('admin.portofolios.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Summernote pada textarea dengan ID 'content'
            $('#content').summernote({
                placeholder: 'Tulis deskripsi produk di sini...',
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
