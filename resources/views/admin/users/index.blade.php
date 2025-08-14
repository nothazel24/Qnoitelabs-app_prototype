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

        <h1 style="font-size: 30px;">Manajemen Pengguna</h1>
        <hr><br>

        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    {{-- Form Pencarian --}}
                    <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control form-control-sm me-2"
                            placeholder="Cari Pengguna..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                            Cari
                        </button>
                        @if (request('search') !== null)
                            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-danger ms-2">
                                Reset
                            </a>
                        @endif
                    </form>

                    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary px-3">
                        <i class="fas fa-plus me-1"></i> Tambah Pengguna
                    </a>
                </div>

                @if ($users->isEmpty())
                    <div class="alert alert-warning text-center" role="alert">
                        Tidak ada pengguna yang ditemukan.
                    </div>
                @else
                    <table class="table table-bordered table-striped small">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No.</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td class="text-center"><span
                                            class="badge {{ $user->isUser() ? 'bg-danger' : 'bg-primary' }}">{{ Str::ucfirst($user->role) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-sm btn-success">
                                            <i class="fas fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini? Tindakan ini tidak dapat dibatalkan.')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $users->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
