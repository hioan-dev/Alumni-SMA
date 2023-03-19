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
    <div class="container" style="margin-top: 120px">
        {{ Breadcrumbs::render('detail-berita', $detail) }}

        <div class="row">
            <div class="col-md-8 mt-2">
                <h2 class="fw-semibold">{{ $detail->title }}</h4>
                    <div class="d-flex align-content-center ">
                        <div><span>{{ date('M j, Y', strtotime($detail->created_at)) }}</span> </div>
                        <div class="d-flex align-content-center ms-3">
                            <p class="px-1 rounded-1 text-capitalize {{ $detail->informasi == 'akan datang' ? 'bg-warning' : 'bg-danger' }} text-white"
                                style="font-size:12px;">
                                {{ $detail->informasi }}</p>
                            </span>
                        </div>
                    </div>

                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $detail->thumbnail) }}" alt=""
                            class="image-fluid  rounded-1">
                    </div>
                    <div class="mt-3">
                        {!! $detail->deskripsi !!}
                    </div>
            </div>
        </div>
    </div>
@endsection
