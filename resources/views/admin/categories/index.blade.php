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
                                <a class="dropdown-item logout" href="#" data-bs-toggle="modal"
                                    data-bs-target="#logout">
                                    {{ __('Log Out') }}
                                </a>
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <h1 style="font-size: 30px;">Manajemen Kategori Artikel</h1>
        <hr><br>

        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    {{-- Form Pencarian --}}
                    <form action="{{ route('admin.categories.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control form-control-sm me-2"
                            placeholder="Cari Kategori..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                            Cari
                        </button>
                        @if (request('search') !== null)
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-danger ms-2">
                                Reset
                            </a>
                        @endif
                    </form>

                    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary px-3">
                        <i class="fas fa-plus me-1"></i> Tambah Kategori
                    </a>
                </div>

                <div class="row gx-4">
                    <div class="col-lg-8 mb-3">
                        @if ($categories->isEmpty())
                            <div class="alert alert-warning text-center" role="alert">
                                Tidak ada kategori yang ditemukan.
                            </div>
                        @else
                            <table class="table table-bordered table-striped small" style="z-index: -1;">
                                <thead>
                                    <tr class="text-center">
                                        <th width="5%">No.</th>
                                        <th>Kategori</th>
                                        <th>Jumlah Artikel</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $val)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}
                                            </td>
                                            <td>{{ $val->name }}</td>
                                            <td>{{ $val->articles->count() }} Judul</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.categories.edit', $val->id) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirmation"
                                                    data-action="{{ route('admin.categories.destroy', $val->id) }}"
                                                    data-id="{{ $val->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {{ $categories->links('pagination::bootstrap-4') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                Grafik Artikel
                            </div>
                            <div class="card-body">
                                {{-- ARTICLE CHART --}}
                                <div id="articleChart"></div>
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
                @foreach ($categories as $val)
                    {{ $val->articles->count() }},
                @endforeach
            ],
            labels: [
                @foreach ($categories as $val)
                    "{{ $val->name }}",
                @endforeach
            ],
            dataLabels: {
                enabled: false
            },
        };

        var chart = new ApexCharts(document.querySelector("#articleChart"), options);
        chart.render();
    </script>
@endpush
