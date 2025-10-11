<ul type="none" class="d-flex gap-5 p-0 m-0 d-none d-md-flex">
    <li>
        <a href="/article" style="text-decoration: none" class="text-dark">All</a>
    </li>

    @forelse ($categories as $val)
        <li>
            <a href="/article/categories/{{ $val->slug }}" style="text-decoration: none;"
                class="text-dark">{{ $val->name }}</a>
        @empty
            <a href="#" style="text-decoration: none;" class="text-dark">Belum Ada Kategori</a>
        </li>
    @endforelse
</ul>

{{-- MOBILE LAYOUTS --}}
<div class="row d-block d-md-none">
    <div class="col-sm-12 mb-2">
        <select name="category_id" id="category" class="form-select">
            <option value="" id="all">All</option>
            @forelse ($categories as $category)
                <option value="{{ $category->slug }}">{{ $category->name }}</option>
            @empty
                <option value="">Belum Ada Kategori</option>
            @endforelse
        </select>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const categorySelect = document.getElementById('category');
            if (!categorySelect) return;

            document.getElementById('all').addEventListener('click', function() {
                window.location.href = "{{ route('home.article.main') }}";
            })

            categorySelect.addEventListener('change', function() {
                let categoryId = this.value;

                if (categoryId) {
                    window.location.href = "{{ route('home.article.category', '__ID__') }}"
                        .replace('__ID__', encodeURIComponent(categoryId));
                } else {
                    const value = document.getElementById('all');
                    if (value) {
                        value.textContent = "Tidak ada kategori yang tersedia";
                    }
                }
            });
        });
    </script>
@endpush
