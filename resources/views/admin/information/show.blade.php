@extends('admin.master')

@section('content')
    <div class="px-4 my-5" style="margin-left: 5rem;" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-12">
                <div class="p-4 p-md-5">
                    <h1 class="mb-3" style="font-size: 2rem; font-weight: 700;">{{ $information->title }}</h1>
                    <div class="text-muted mb-4 d-flex flex-wrap align-items-center small">
                        <span class="me-3">
                            <i class="fas fa-calendar-alt me-1"></i> Dibuat:
                            {{ $information->created_at->format('d M Y H:i') }}
                        </span>
                        <span>
                            <i class="fas fa-info-circle me-1"></i> Status:
                            @if ($information->status)
                                <span class="badge bg-primary">Published</span>
                            @else
                                <span class="badge bg-danger">Draft</span>
                            @endif
                        </span>
                    </div>

                    <hr class="my-3">

                    <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                        {!! $information->content !!}
                    </div>

                    <hr class="my-3">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.information.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Informasi
                        </a>
                        @if (Auth::check() && (Auth::user()->id === $information->user_id || Auth::user()->isAdmin()))
                            <div>
                                <a href="{{ route('admin.information.edit', $information->slug) }}"
                                    class="btn btn-warning text-white me-2">
                                    <i class="fas fa-edit me-2"></i> Edit Informasi
                                </a>
                                <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmation"
                                    data-action="{{ route('admin.information.destroy', $information->slug) }}"
                                    data-id="{{ $information->slug }}">
                                    <i class="fas fa-trash-alt"></i> Hapus Informasi
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
