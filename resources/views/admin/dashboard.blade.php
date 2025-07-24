@extends('admin.master')

@section('homeActive')
    text-primary
@endsection
@section('metaDesc')
    Aplikasi Content Management System Terbaik by emilogi.com
@endsection

@section('content')
    <h1 class="mb-4" style="font-size:x-large">Dashboard</h1>
    <hr><br>
    <div class="row g-4 mb-5">
        <div class="col-lg-3 col-6">
            <div class="card bg-primary text-white h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-article">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                <path d="M7 8h10" />
                                <path d="M7 12h10" />
                                <path d="M7 16h10" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">125</h3>
                            <p class="card-text text-white-50">Total Artikel</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card bg-success text-white h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-bookmarks">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 10v11l-5 -3l-5 3v-11a3 3 0 0 1 3 -3h4a3 3 0 0 1 3 3z" />
                                <path d="M11 3h5a3 3 0 0 1 3 3v11" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">12</h3>
                            <p class="card-text text-white-50">Total Kategori</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card bg-warning text-white h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">78</h3>
                            <p class="card-text text-white-50">Total User</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card bg-danger text-white h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-files">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                                <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">8</h3>
                            <p class="card-text text-white-50">Total Halaman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card shadow-sm mb-5 h-100">
                <div class="card-header">
                    List Artikel Terbaru
                </div>
                <div class="card-body">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni dolore cupiditate fugit,
                        molestiae esse quo beatae assumenda dicta inventore maiores explicabo cum aspernatur at
                        alias itaque aliquam natus deleniti expedita.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni dolore cupiditate fugit,
                        molestiae esse quo beatae assumenda dicta inventore maiores explicabo cum aspernatur at
                        alias itaque aliquam natus deleniti expedita.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni dolore cupiditate fugit,
                        molestiae esse quo beatae assumenda dicta inventore maiores explicabo cum aspernatur at
                        alias itaque aliquam natus deleniti expedita.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow-sm mb-5 h-100">
                <div class="card-header">
                    Grafik Artikel
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        <em>(Grafik batang atau pie chart akan ditampilkan di sini, misalnya, jumlah artikel per
                            kategori atau tren publikasi artikel.)</em>
                    </p>
                    <div class="bg-light d-flex justify-content-center align-items-center"
                        style="height: 250px; border: 1px dashed #ccc;">
                        <span class="text-muted">Area Grafik Artikel</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection