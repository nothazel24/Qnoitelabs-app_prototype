@extends('admin.master')

@section('content')
    <div class="row mt-4 me-2" style="margin-left: 5rem;">
        <div class="col-lg-8" data-aos="fade-up">
            <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="card mb-4 h-100">
                    <div class="card-body">
                        <header>
                            <h2 class="h5 mb-2">Profil Pengguna</h2>
                            <hr>
                            <p class="mt-1 text-muted">Perbarui informasi profil dan alamat email akun Anda.</p>
                        </header>

                        <div class="row">
                            {{-- Field Name --}}
                            <div class="col-lg-12 mb-2">
                                <label for="name" class="form-label">Nama Pengguna</label>
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Field Gender --}}
                            <div class="col-lg-6 mb-2">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                    name="gender">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki"
                                        {{ old('gender', $user->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="Perempuan"
                                        {{ old('gender', $user->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                    </option>
                                    <option value="Lainnya"
                                        {{ old('gender', $user->gender) == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Field Email --}}
                            <div class="col-lg-6 mb-2">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input id="email" name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required autocomplete="username">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Field Phone --}}
                            <div class="col-lg-6 mb-2">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input id="phone" name="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $user->phone) }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Field Instagram --}}
                            <div class="col-lg-6 mb-2">
                                <label for="instagram" class="form-label">Akun Instagram (Opsional)</label>
                                <input id="instagram" name="instagram" type="text"
                                    class="form-control @error('instagram') is-invalid @enderror"
                                    value="{{ old('instagram', $user->instagram) }}">
                                @error('instagram')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Current Password --}}
                            <div class="col-lg-12 mb-2">
                                <label for="current_password" class="form-label">Password Sekarang</label>
                                <input id="current_password" name="current_password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    autocomplete="current-password">
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- New Password --}}
                            <div class="col-lg-6 mb-2">
                                <label for="password" class="form-label">Password Baru</label>
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="col-lg-6 mb-2">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2 mt-3">
                            <button type="submit" class="btn btn-primary me-1">Simpan Perubahan</button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-4 mb-3">
            <div class="card card-body h-100">
                <div class="mb-3">
                    <header>
                        <h2 class="h5 mb-2">Gambar Profil</h2>
                        <hr>
                    </header>
                    @if ($user->image)
                        <div class="col-lg-12 mb-2">
                            <img src="{{ asset('storage/' . $user->image) }}" alt="Current Profile Image"
                                class="img-thumbnail mx-auto rounded-circle mb-3" style="max-width: 150px;">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image"
                                    value="1">
                                <label class="form-check-label" for="remove_image">Hapus Gambar Saat Ini</label>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12 mb-2 text-center">
                            <img src="{{ asset('dist/images/profile.jpg') }}" alt="Default Profile Image"
                                class="img-thumbnail mx-auto rounded-circle mb-3" style="max-width: 150px;">
                        </div>
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image">
                    <small class="text-muted">Upload gambar baru untuk mengganti yang lama, atau centang "Hapus Gambar Saat
                        Ini".</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </form> {{-- END FORM SECTION --}}

                <hr>

                <div class="delete-user">
                    <header>
                        <h2 class="h5 mb-3">Hapus Akun Pengguna</h2>
                        <p class="mt-1 text-muted" style="font-size: small">
                            Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen.
                            Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.
                        </p>
                    </header>

                    <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                        data-bs-target="#confirmUserDeletionModal">
                        Hapus Akun
                    </button>

                    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1"
                        aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="{{ route('admin.profile.destroy') }}">
                                    @csrf
                                    @method('delete')

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">
                                            Apakah Anda yakin ingin menghapus akun Anda?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p class="text-sm text-muted">
                                            Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara
                                            permanen.
                                            Masukkan kata sandi Anda untuk mengonfirmasi.
                                        </p>

                                        <div class="mb-3">
                                            <label for="password_delete" class="visually-hidden">Password</label>
                                            <input id="password_delete" name="password" type="password"
                                                class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                                placeholder="Password">
                                            @error('password', 'userDeletion')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-danger">Hapus Akun</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
