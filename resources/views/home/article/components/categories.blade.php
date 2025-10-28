<div class="small p-0 mb-4">
    <div class="list-group">
        <div class="d-flex gap-2 list-group-item align-items-center" style="background-color: #3A7CA5">
            <img src="{{ asset('dist/icons/notification.svg') }}" alt="information" width="18">
            <p class="text-white fw-bold p-0 m-0" aria-current="true" style="font-size: 16px;">
                Kategori Terbaru
            </p>
        </div>
        {{-- ALL CATEGORIES --}}
        <a href="/article/" class="list-group-item list-group-item-action">Semua kategori</a>

        {{-- LOOP CATEGORIES --}}
        @forelse ($categories as $val)
            <a href="/article/categories/{{ $val->slug }}"
                class="list-group-item list-group-item-action">{{ $val->name }}</a>
        @empty
            <a href="#" class="list-group-item list-group-item-action bg-danger text-white fw-bold"> Belum
                Ada Kategori</a>
        @endforelse
    </div>
</div>
