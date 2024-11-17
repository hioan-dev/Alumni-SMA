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
    <div class="container min-vh-100" style="margin-top: 120px">
        {{ Breadcrumbs::render('kegiatan') }}

        <div class="row">
            @if ($kegiatan->count() > 0)
                <div class="col-md-8">
                    <div class="row gy-3 gx-3 mt-2">
                        @foreach ($kegiatan as $row)
                            <div class="col-md-4">
                                <div class="card shadow-sm" style="height:300px">
                                    <div class="card-news__img">
                                        <a href="{{ route('detail-kegiatan', $row->slug) }}">
                                            <img src="{{ asset('storage/' . $row->thumbnail) }}" class="card-img-top"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="card-body h-auto">
                                        <div class="fs-6 mb-2 text-muted d-flex align-content-center">
                                            <div class="d-flex align-content-center">
                                                <span class="material-symbols-outlined fs-6 mr-3">
                                                    calendar_month
                                                </span>
                                                <div class="px-1" style="font-size:12px;">
                                                    {{ date('M j, Y', strtotime($row->created_at)) }}</div>
                                            </div>
                                            <div class="d-flex align-content-center">
                                                <p class="px-1 mb-2  rounded-1 text-capitalize {{ $row->informasi == 'akan datang' ? 'bg-warning' : 'bg-danger' }} text-white"
                                                    style="font-size:12px;">
                                                    {{ $row->informasi }}</p>
                                            </div>
                                        </div>

                                        <a href="{{ route('detail-kegiatan', $row->slug) }}"
                                            class="card-link text-decoration-none d-flex align-items-center">
                                            <h5 class="card-title fw-semibold clamp-2">{{ $row->title }}</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        Tidak ada Kegiatan
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
