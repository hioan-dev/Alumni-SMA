@extends('layouts.app')
@section('title', $detail->title)


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

        .image-fluid {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            object-position: center;
        }
    </style>
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container min-vh-100" style="margin-top: 120px">
        {{ Breadcrumbs::render('detail-berita', $detail) }}

        <div class="row">
            <div class="col-md-8 mt-2">
                <h2 class="fw-semibold">{{ $detail->title }}</h4>
                    <div class="d-flex align-content-center ">
                        <div><span>{{ date('M j, Y', strtotime($detail->created_at)) }}</span> </div>
                        <div class="d-flex align-content-center ms-3"> <span class="material-symbols-outlined fs-4 mr-3">
                                folder
                            </span>
                            <a href="{{ route('kategori-berita', $detail->kategori->slug) }}"
                                class="px-1 text-decoration-none" style="">{{ $detail->kategori->nama_kategori }}</a>
                        </div>
                    </div>

                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $detail->banner) }}" alt="" class="image-fluid  rounded-1">
                    </div>
                    <div class="mt-3">
                        {!! $detail->description !!}
                    </div>
            </div>
            <div class="col-md-4 mt-5 mt-md-0 ">
                <div>
                    @include('partials.__category')
                </div>
                <div class="mt-5">
                    <div>
                        <h5 class="fw-bold">Berita Terkait</h5>
                        <div class="divider"></div>
                    </div>

                    <div class="row mt-3 gy-3 gx-3">
                        @foreach ($berita_terkait as $row)
                            <div class="col-md-4">
                                <a href="{{ $row->url }}" target="_blank" class="card-news__img">
                                    <img src="{{ asset('storage/' . $row->banner) }}" alt="" class="img-fluid">
                                </a>

                            </div>
                            <div class="col-md-8">
                                <div><small>{{ date('M j, Y', strtotime($detail->created_at)) }}</small></div>
                                <a href="{{ $row->url }}" class="text-decoration-none">{{ $row->title }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-5 mt-md-0 ">
        <div>

        </div>

    </div>
    </div>
@endsection
