@extends('layouts.app')
@section('title', 'Berita')


@push('styles')
    <style>
        .divider {
            width: 100%;
            height: 2px;
            background-color: #e4e4e4;
            position: relative
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 15%;
            background-color: #152d8f;

        }

        .category {
            text-decoration: none;
            color: #969494;
            border: 1px solid #ccc;
            padding: 0.3rem 2rem;
            border-radius: 5px;
        }

        .category:hover {
            border-color: #152d8f
        }
    </style>
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container" style="margin-top: 120px">
        {{ Breadcrumbs::render('kategori-berita', $category->nama_kategori) }}

        <div class="row">


            @if ($news->count() > 0)
                <div class="col-md-8">
                    <div class="row gy-3 gx-3 mt-2">
                        @foreach ($news as $row)
                            <div class="col-md-4">
                                <div class="card shadow-sm" style="height:400px">
                                    <div class="card-news__img">
                                        <a href="{{ route('detail-berita', $row->slug) }}">
                                            <img src="{{ asset('storage/' . $row->banner) }}" class="card-img-top"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="fs-6 mb-2 text-muted d-flex align-content-center">
                                            <div class="d-flex align-content-center">
                                                <span class="material-symbols-outlined fs-6 mr-3">
                                                    calendar_month
                                                </span>
                                                <div class="px-1" style="font-size:12px;">
                                                    {{ date('M j, Y', strtotime($row->created_at)) }}</div>
                                            </div>
                                            <div class="d-flex align-content-center">
                                                <span class="material-symbols-outlined fs-5 mr-3">
                                                    folder
                                                </span>
                                                <a href="{{ route('kategori-berita', $row->kategori->slug) }}"
                                                    class="px-1 text-decoration-none"
                                                    style="font-size:12px;">{{ $row->kategori->nama_kategori }}</a>
                                            </div>
                                        </div>
                                        <h5 class="card-title fw-semibold clamp-2">{{ $row->title }}</h5>
                                        <p class="card-text clamp-2">{{ strip_tags($row->description) }}</p>
                                        <a href="{{ route('detail-berita', $row->slug) }}"
                                            class="card-link text-decoration-none d-flex align-items-center">Read
                                            More
                                            <span class="material-symbols-outlined px-1 fs-5">
                                                east
                                            </span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @include('partials.__category')
            @else
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        Tidak ada berita
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
