@extends('layouts.app')

@section('title', 'Galeri Video')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container min-vh-100" style="margin-top: 120px">
        {{ Breadcrumbs::render('galeri-video') }}
        <h1 class="text-center my-5 ffw-bold">Galeri Video</h1>
        <div class="row mt-5">
            @if ($vidio->count() == 0)
                <div class="col-md-12">
                    <div class="alert alert-info text-center" role="alert">
                        Video belum ditambahkan
                    </div>
                </div>
            @else
                @foreach ($vidio as $item)
                    <div class="col-md-4">
                        <div class="">
                            <a data-fancybox="video-gallery" href="{{ $item->url }}"><img class="img-fluid"
                                    src="{{ asset('storage/' . $item->image) }}">
                                <p>{{ $item->title }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
@endpush
