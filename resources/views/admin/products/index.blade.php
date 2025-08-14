@extends('admin.master')

@section('content')
    <div class="px-4 mb-5" style="margin-left: 5rem;" data-aos="fade-up">

        {{-- USERS  --}}
        <div class="d-flex justify-content-between">
            <div class="space"></div>

            <div class="users py-3">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold text-primary" href="#"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} ({{ Auth::user()->role }})
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                                {{ __('Profile') }}
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                            
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <h1 style="font-size: 30px;">Manajemen Produk</h1>
        <hr><br>

        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    {{-- Form Pencarian dan Filter Status --}}
                    <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control form-control-sm me-2"
                            placeholder="Cari Judul Artikel..." value="{{ request('search') }}">
                        <select name="status" class="form-select form-select-sm me-2" style="max-width: 150px;">
                            <option value="">Semua Status</option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                            Cari
                        </button>
                        @if (request('search') || request('status') !== null)
                            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-danger ms-2">
                                Reset
                            </a>
                        @endif
                    </form>

                    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary px-3">
                        <i class="fas fa-plus me-1"></i> Tambah Produk
                    </a>
                </div>

                @if ($products->isEmpty())
                    <div class="alert alert-warning text-center" role="alert">
                        Tidak ada produk yang ditemukan.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover small">
                            <thead>
                                <tr class="text-center bg-light">
                                    <th>No.</th>
                                    <th>Nama Produk</th>
                                    <th>SKU</th>
                                    <th>Kategori</th>
                                    <th>Harga Jual</th>
                                    <th>Stock</th>
                                    <th>Penjual</th>
                                    <th>Status</th>
                                    <th>Dibuat Pada</th>
                                    <th>Diskon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $val)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.show', $val->slug) }}"
                                                class="text-decoration-none">
                                                {{ $val->title }}
                                            </a>
                                        </td>
                                        <td>{{ $val->sku ?? '-' }}</td>
                                        <td>{{ $val->website_category->name }}</td>
                                        <td>Rp{{ number_format($val->price, 0, ',', '.') }}</td>
                                        <td>{{ $val->stock }}</td>
                                        <td>{{ $val->user->name }}</td>
                                        <td class="text-center">
                                            @if ($val->status)
                                                <span class="badge bg-primary">Published</span>
                                            @else
                                                <span class="badge bg-danger">Draft</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $val->created_at->format('d M Y H:i') }}</td>
                                        <td>{{ number_format($val->discount, 0, ',', '.') }} %</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.products.show', $val->slug) }}"
                                                class="btn btn-sm btn-info text-white" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $val->slug) }}"
                                                class="btn btn-sm btn-success mx-1" title="Edit">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $val->slug) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus Artikel ini? Tindakan ini tidak dapat dibatalkan.')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
