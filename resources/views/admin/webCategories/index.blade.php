@extends('admin.master')

@section('content')
    <div class="px-4 mb-5" style="margin-left: 5rem;">

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

        <h1 style="font-size: 30px;">Manajemen Kategori Website</h1>
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
                                            <td>{{ $val->products->count() }} Website</td>
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
                                Grafik Website
                            </div>
                            <div class="card-body">
                                <div id="webCategoryChart"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            chart: {
                type: 'donut',
                fontFamily: 'inherit',
                height: 300,
            },
            series: [
                @foreach ($webCategories as $val)
                    {{ $val->products->count() }},
                @endforeach
            ],
            labels: [
                @foreach ($webCategories as $val)
                    "{{ $val->name }}",
                @endforeach
            ],
            dataLabels: {
                enabled: false
            },
        };

        var chart = new ApexCharts(document.querySelector("#webCategoryChart"), options);
        chart.render();
    </script>
@endpush
