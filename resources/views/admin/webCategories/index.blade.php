@extends('admin.master')

@section('webCategoriesActive')
    text-primary
@endsection

@section('content')
    <h1 class="mb-4" style="font-size:x-large">Manajemen Kategori</h1>
    <hr><br>

    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                {{-- Form Pencarian --}}
                <form action="{{ route('admin.webCategories.index') }}" method="GET" class="d-flex me-3">
                    <input type="text" name="search" class="form-control form-control-sm me-2"
                        placeholder="Cari Kategori Website..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                        Cari
                    </button>
                    @if (request('search') !== null)
                        <a href="{{ route('admin.webCategories.index') }}" class="btn btn-sm btn-outline-danger ms-2">
                            Reset
                        </a>
                    @endif
                </form>

                <a href="{{ route('admin.webCategories.create') }}" class="btn btn-sm btn-primary px-3">
                    <i class="fas fa-plus me-1"></i> Tambah Kategori
                </a>

            </div>

            <div class="row gx-4">
                <div class="col-lg-8 mb-3">
                    @if ($webCategories->isEmpty())
                        <div class="alert alert-warning text-center" role="alert">
                            Tidak ada kategori yang ditemukan.
                        </div>
                    @else
                        <table class="table table-bordered table-striped small">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">No.</th>
                                    <th>Kategori website</th>
                                    <th>Jumlah website tersedia</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($webCategories as $val)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration + ($webCategories->currentPage() - 1) * $webCategories->perPage() }}
                                        </td>
                                        <td>{{ $val->name }}</td>
                                        <td>0 website</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.webCategories.edit', $val->id) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.webCategories.destroy', $val->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus Kategori ini? Tindakan ini tidak dapat dibatalkan.')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $webCategories->links('pagination::bootstrap-4') }}
                        </div>
                    @endif
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Grafik Artikel
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                <em>(Grafik batang atau pie chart akan ditampilkan di sini, misalnya, jumlah artikel per
                                    kategori atau tren publikasi artikel.)</em>
                            </p>
                            <div class="bg-light d-flex justify-content-center align-items-center"
                                style="height: 200px; border: 1px dashed #ccc;">
                                <span class="text-muted">Area Grafik Artikel</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
