<section class="banner">
    <div class="container-fluid position-relative p-0 m-0" style="height: 450px;">

        @if ($portofolio->image)
            <img src="{{ asset('storage/' . $portofolio->image) }}" class="w-100"
                style="filter: brightness(60%); object-fit: cover; height: 450px;" alt="background" />
        @else
            <img src="https://github.com/nothazel24/nothazel24/blob/main/assets/banner.png?raw=true" class="w-100"
                style="filter: brightness(60%); object-fit: cover; height: 450px;" alt="background" />
        @endif

        <div
            class="container-fluid position-absolute top-0 start-0 h-100 w-100 d-flex flex-column justify-content-center align-items-center text-white text-center">
            <div class="mt-5" data-aos="fade-right" data-aos-duration="1000">
                <h1 class="fw-bold">{{ $portofolio->title }}</h1>
                <p>{{ $portofolio->meta_desc ?? '-' }}</p>
            </div>
        </div>


    </div>
</section>

<section class="product-{{ $portofolio->slug }}" style="background-color: #EFEFEF;">
    <div class="container py-5" data-aos="fade-right" data-aos-duration="1100">

        {{-- BREADCRUMB --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/portofolio" class="text-decoration-none">Daftar
                        Portofolio</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ Str::limit($portofolio->title, 50) }}</li>
            </ol>
        </nav>

        <div class="content">
            {{-- ISI KONTEN --}}
            <p>{!! $portofolio->content !!}</p>
        </div>

    </div>
</section>
