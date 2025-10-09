@extends('admin.master')

@section('content')
    <div class="px-4 mb-5" style="margin-left: 5rem;" data-aos="fade-up">

        {{-- USER MENU --}}
        @include('admin.layouts.menu')

        <h1 style="font-size: 30px;">Manajemen Informasi</h1>
        <hr><br>

        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    {{-- Form Pencarian dan Filter Status --}}
                    <form action="{{ route('admin.information.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control form-control-sm me-2"
                            placeholder="Cari Judul Informasi..." value="{{ request('search') }}">
                        <select name="status" class="form-select form-select-sm me-2" style="max-width: 150px;">
                            <option value="">Semua Status</option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                            Cari
                        </button>
                        @if (request('search') || request('status') !== null)
                            <a href="{{ route('admin.information.index') }}" class="btn btn-sm btn-outline-danger ms-2">
                                Reset
                            </a>
                        @endif
                    </form>

                    <a href="{{ route('admin.information.create') }}" class="btn btn-sm btn-primary px-3">
                        <i class="fas fa-plus me-1"></i> Tambah Informasi
                    </a>
                </div>

                @if ($information->isEmpty())
                    <div class="alert alert-warning text-center" role="alert">
                        Tidak ada artikel yang ditemukan.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover small">
                            <thead>
                                <tr class="text-center bg-light">
                                    <th>No.</th>
                                    <th>Judul Informasi</th>
                                    <th>Status</th>
                                    <th>Dibuat Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($information as $val)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration + ($information->currentPage() - 1) * $information->perPage() }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.information.show', $val->slug) }}"
                                                class="text-decoration-none">
                                                {{ $val->title }}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            @if ($val->status)
                                                <span class="badge bg-primary">Published</span>
                                            @else
                                                <span class="badge bg-danger">Draft</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $val->created_at->format('d M Y H:i') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.information.show', $val->slug) }}"
                                                class="btn btn-sm btn-info text-white" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.information.edit', $val->slug) }}"
                                                class="btn btn-sm btn-success mx-1" title="Edit">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmation"
                                                data-action="{{ route('admin.information.destroy', $val->slug) }}"
                                                data-id="{{ $val->slug }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $information->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
