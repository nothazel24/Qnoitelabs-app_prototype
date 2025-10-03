<section class="informasi" style="background-color: #EFEFEF;">
    <div class="container px-4 px-md-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="py-5" data-aos="fade-right" data-aos-duration="1100">
                    <h1 class="card-title mb-3" style="font-size: 2rem; font-weight: 700;">{{ $information->title }}
                    </h1>
                    <div class="text-muted mb-4 d-flex flex-wrap align-items-center small">
                        <span class="me-3">
                            <i class="fas fa-calendar-alt me-1"></i> Dibuat:
                            {{ $information->created_at->format('d M Y H:i') }}
                        </span>
                    </div>

                    <hr class="my-3">

                    <div class="note-editable mt-4" style="font-size: 1rem; line-height: 1.5;">
                        {!! $information->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
