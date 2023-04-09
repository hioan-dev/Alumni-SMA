@extends('layouts.app')

@section('title', 'Data Calon Ketua Alumni')

@push('styles')
    <style>
        .student-img {
            height: 200px;
            width: 200px;
            margin: 0 auto;
        }

        .student-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .student-img {
                height: 150px;
                width: 150px;
            }
        }
    </style>
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container" style="margin-top: 120px">
        {{ Breadcrumbs::render('data-alumni') }}

        <div class="row mt-5 gx-0">
            <h2 class="text-center">Data Calon Ketua Alumni</h2>
        </div>
        <div class="row mt-5 gy-3">
            @forelse ($ketua as $row)
                <div class=" col-md-6 col-lg-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-header">
                            <h5 class="fw-semibold">{{ $row->kelas }}</h5>
                            <h6>{{ $row->tahun_lulus }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="student-img">
                                <img src="{{ asset('storage/' . $row->pas_foto) }}" alt="" class="img-fluid">
                            </div>
                            <div class="mt-3">
                                <h5 class="card-title fw-semibold">{{ $row->nama_lengkap }}</h5>
                                <p class="card-text capitalize">{{ $row->pekerjaan }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        Data Calon Ketua Belum Tersedia
                    </div>
                </div>
            @endforelse

        </div>
    </div>
@endsection
