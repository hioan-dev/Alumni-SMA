@extends('layouts.app')

@section('title', 'Galeri Foto')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.css"
        integrity="sha512-tbjZFdjHyHckTfeqkgVFcQ3GJWVfdsNYFvl+rEWmofjj9JpWaohlZgq0Vb6Hav5rqIL019LFpLsE+sTNSfNVXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container min-vh-100" style="margin-top: 120px">
        {{ Breadcrumbs::render('galeri-foto') }}
        <h1 class="text-center my-5 ffw-bold">Galeri Foto</h1>
        @if ($foto->count() == 0)
            <div class="col-md-12">
                <div class="alert alert-info text-center" role="alert">
                    Foto belum ditambahkan
                </div>
            </div>
        @else
            <div class="grid tz-gallery">
                @foreach ($foto as $item)
                    <div class="grid-item">
                        <div class="gallery-item">
                            <a href="{{ asset('storage/' . $item->foto) }}" class="lightbox">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="">
                                <div class="title">
                                    <small>{{ date('M j, Y', strtotime($item->created_at)) }}</small>
                                    <p class="clamp-2">{{ $item->deskripsi }} </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.js"
        integrity="sha512-+8LoWbC6Y9Vy85wapJUYlRvabpzAIGhgiL6vZWNHn0F8EFJ43a1BCSzXo7b7OeY6bczJ3Q+ifRweZpW1iPAARg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        baguetteBox.run('.tz-gallery');

        $('.grid').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: 400,
            gutter: 10
        });
    </script>
@endpush
