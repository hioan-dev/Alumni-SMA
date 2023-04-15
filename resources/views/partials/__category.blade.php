    <div>
        <h5 class="fw-bold">Kategori</h5>
        <div class="divider"></div>
    </div>
    <div class="row  mt-2 gy-3 gx-2">
        @foreach ($categories as $category)
            <div class="col-auto">
                <a href="{{ route('kategori-berita', $category->slug) }}" class="category">{{ $category->nama_kategori }}
                    <span class="badge bg-primary">{{ $category->berita->count() }}</span></a>

            </div>
        @endforeach
    </div>
