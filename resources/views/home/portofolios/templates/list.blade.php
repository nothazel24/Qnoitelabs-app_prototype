<div class="modal fade" id="previewDemo" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark">

            <img id="modalDemoImage" src="" alt="demoImage" class="img-fluid w-100 rounded">

            <a href="#" class="position-absolute bottom-0 start-50 translate-middle text-white px-4"
                style="opacity: 80%; text-decoration: none;" id="modalDetailLink">Detail</a>

            <button class="btn btn-outline-light position-absolute top-50 start-0 translate-middle-y mx-2"
                id="prevBtn" style="opacity: 80%;">‹</button>

            <button class="btn btn-outline-light position-absolute top-50 end-0 translate-middle-y mx-2" id="nextBtn"
                style="opacity: 80%;">›</button>
        </div>
    </div>
</div>


<section class="list-portofolio" style="background-color: #efefef;">
    <div class="container py-5">

        {{-- PORTOFOLIO LIST --}}
        <div class="row mx-2 mx-md-0">

            <p class="fw-bold">List demo website</p>

            @forelse ($portofolios as $val)
                <div class="col-lg-4" title="{{ $val->title }}">

                    {{-- PORTOFOLIO CARD --}}
                    <a href="#" class="text-dark portofolio-thumb" style="text-decoration: none;"
                        data-bs-toggle="modal" data-bs-target="#previewDemo" data-index="{{ $loop->index }}">
                        <div class="shadow-sm mb-4"
                            style="background-color: #fefefe; border-radius: 10px; border: 1px solid rgba(43, 43, 43, 0.07);">
                            @if ($val->image)
                                <div class="img">
                                    <img src="{{ asset('storage/' . $val->image) }}" alt="gambar-{{ $val->title }}"
                                        style="border-radius: 10px; filter: brightness(80%); object-fit: cover; width: 100%; height: 200px;">
                                </div>
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center text-white-50 "
                                    style=" background: url('https://github.com/nothazel24/nothazel24/blob/main/assets/banner.png?raw=true'); background-size: cover; background-position: center; border-radius: 10px; filter: brightness(80%); width: 100%; height: 200px;">
                                    Portofolio Image
                                </div>
                            @endif
                        </div>
                    </a>

                </div>

            @empty
                <div class="col-12">
                    <div class="alert alert-secondary text-center" role="alert">
                        Tidak ada item yang sesuai dengan pencarian anda.
                    </div>
                </div>
            @endforelse

        </div>

        <div class="d-flex justify-content-center">
            {{ $portofolios->links('pagination::bootstrap-4') }}
        </div>

    </div>
</section>

@push('scripts')
    <script>
        const images = @json(
            $portofolios->map(fn($p) => $p->image
                    ? asset('storage/' . $p->image)
                    : 'https://github.com/nothazel24/nothazel24/blob/main/assets/banner.png?raw=true'));
        let currentIndex = 0;

        const slugs = @json($portofolios->pluck('slug'));

        function showImage(index) {
            const modalDemoImage = document.getElementById("modalDemoImage");
            const showDetailLInk = document.getElementById("modalDetailLink");

            modalDemoImage.src = images[index];
            modalDetailLink.href = "/portofolio/" + slugs[index];

            currentIndex = index;
        }

        document.querySelectorAll(".portofolio-thumb").forEach((thumb) => {
            thumb.addEventListener("click", (e) => {
                e.preventDefault();
                let index = parseInt(thumb.getAttribute("data-index"));
                showImage(index);
            });
        });

        // tombol next
        document.getElementById("nextBtn").addEventListener("click", () => {
            let nextIndex = (currentIndex + 1) % images.length;
            showImage(nextIndex);
        });

        // tombol prev
        document.getElementById("prevBtn").addEventListener("click", () => {
            let prevIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(prevIndex);
        });
    </script>
@endpush
