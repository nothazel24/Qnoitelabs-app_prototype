<ul type="none" class="d-flex gap-5 p-0 m-0">
    <li>
        <a href="/article" style="text-decoration: none" class="text-dark">All</a>
    </li>

    @forelse ($categories as $val)
        <li>
            <a href="/article/categories/{{ $val->id }}" style="text-decoration: none;"
                class="text-dark">{{ $val->name }}</a>
        @empty
            <a href="#" style="text-decoration: none;" class="text-dark">Belum Ada Kategori</a>
        </li>
    @endforelse
</ul>
