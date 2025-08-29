<ul type="none" class="d-flex gap-5 p-0 m-0 d-none d-md-flex">
    <li>
        <a href="/price" style="text-decoration: none" class="text-dark">All</a>
    </li>

    @forelse ($categories as $val)
        <li>
            <a href="/price/categories/{{ $val->id }}" style="text-decoration: none;"
                class="text-dark">{{ $val->name }}</a>
        @empty
            <a href="#" style="text-decoration: none;" class="text-dark">Belum Ada Kategori</a>
        </li>
    @endforelse
</ul>

{{-- TUGAS: TAMBAH LOGICNYA UNTUK BAGIAN INI --}}
<div class="row d-block d-md-none">
    <div class="col-lg-12 mb-2">
        <select name="category_id" id="category" class="form-select">
            <option value="">All</option>
            @forelse ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @empty
                <option value="">Belum Ada Kategori</option>
            @endforelse
        </select>
    </div>
</div>
