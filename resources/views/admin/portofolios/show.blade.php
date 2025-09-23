@extends('admin.master')

@section('content')
    <div class="px-4 my-5" style="margin-left: 5rem;" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0 rounded-lg">
                    @if ($portofolio->image)
                        <div class="ratio ratio-21x9">
                            <img class="card-img-top object-fit-cover rounded-top"
                                src="{{ asset('storage/' . $portofolio->image) }}" alt="Gambar Artikel: {{ $portofolio->title }}">
                        </div>
                    @else
                        <div class="ratio ratio-21x9 rounded-top d-flex align-items-center"
                            style="background: linear-gradient(rgba(25, 135, 84, 0.7), rgba(13, 110, 253, 0.7)), url('https://wallpapercave.com/wp/wp10992174.png'); background-size: cover; background-position: center;">
                        </div>
                    @endif
                    <div class="card-body p-4 p-md-5">
                        <h1 class="card-title mb-3" style="font-size: 2rem; font-weight: 700;">{{ $portofolio->title }}</h1>

                        <hr class="my-3">

                        <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                            {!! $portofolio->content !!}
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.portofolios.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Portofolio
                            </a>
                            @if (Auth::check() && (Auth::user()->id == $portofolio->user_id || Auth::user()->isAdmin()))
                                <div>
                                    <a href="{{ route('admin.portofolios.edit', $portofolio->slug) }}"
                                        class="btn btn-warning text-white me-2">
                                        <i class="fas fa-edit me-2"></i> Edit Portofolio
                                    </a>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmation"
                                        data-action="{{ route('admin.portofolios.destroy', $portofolio->slug) }}"
                                        data-id="{{ $portofolio->slug }}">
                                        <i class="fas fa-trash-alt"></i> Hapus portofolio
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
