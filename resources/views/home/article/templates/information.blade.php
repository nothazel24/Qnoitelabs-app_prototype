{{-- INFORMATION --}}
<div class="col-lg-3">
    <div class="small p-0 mb-4">
        <div class="list-group">
            <div class="d-flex gap-2 list-group-item align-items-center" style="background-color: #3A7CA5">
                <img src="{{ asset('dist/icons/notification.svg') }}" alt="information" width="18">
                <p class="text-white fw-bold p-0 m-0" aria-current="true" style="font-size: 16px;">
                    Informasi Terbaru
                </p>
            </div>
            @forelse ($information as $val)
                <a href="/information/{{ $val->slug }}"
                    class="list-group-item list-group-item-action">{{ $val->title }}</a>
            @empty
                <a href="#" class="list-group-item list-group-item-action bg-danger text-white fw-bold"> Belum
                    Ada Informasi</a>
            @endforelse
        </div>
    </div>

    {{-- EXTRAS: SOCIAL MEDIA  --}}
    <div class="social-media mx-2 mb-5 mb-md-0">
        <h1 style="font-size: 20px">Ikuti kami di :</h1>
        <div class="d-flex justify-content-around social-icons py-2">
            <a href="#" class="btn-twitter">
                <img src="{{ asset('dist/icons/twitter.svg') }}" alt="qnoite-twitter" width="30">
            </a>
            <a href="#" class="btn-facebook">
                <img src="{{ asset('dist/icons/facebook.svg') }}" alt="qnoite-facebook" width="30">
            </a>
            <a href="#" class="btn-linkedin">
                <img src="{{ asset('dist/icons/linkedin.svg') }}" alt="qnoite-linkedin" width="30">
            </a>
            <a href="#" class="btn-whatsapp-channel">
                <img src="{{ asset('dist/icons/whatsapp-black.svg') }}" alt="qnoite-whatsapp" width="30">
            </a>
        </div>
    </div>

</div>
