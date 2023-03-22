@extends('layouts.app')

@section('title', 'Data Alumni')

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
            <div class="col-md-6 mx-auto">
                <div class="alert alert-info text-center" role="alert">
                    Silakan masukan kata kunci pencarian data berdasarkan <b>Nama</b> (text) atau <b>Tahun
                        Angkatan</b>(4
                    digit angka tahun) atau <b>Kelas</b> (text)
                </div>
                <form action="{{ route('data-alumni') }}" method="GET">
                    <div class="row gx-0 justify-content-center mt-5">
                        <div class="col-8">
                            <input type="text" class="form-control" value="{{ $keyword }}" name="search"
                                placeholder="Cari alumni" aria-label="First name">
                        </div>
                        <div class="col-auto ms-2">
                            <button type="submit" class="btn btn-primary px-4">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if ($keyword)
            <div class="row mt-3">
                <p class="text-center">Hasil pencarian untuk "<span class="fw-bold">{{ $keyword }}</span>"</p>
            </div>
        @endif
        <div class="row mt-5 gy-3">
            @forelse ($alumni as $row)
                <div class=" col-md-6 col-lg-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-header">
                            <h5 class="fw-semibold">{{ $row->kelas }}</h5>
                            <h6>{{ $row->tahun_lulus }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="student-img">
                                <img src="{{ asset('storage/' . $row->foto) }}" alt="" class="img-fluid">
                            </div>
                            <div class="mt-3">
                                <h5 class="card-title fw-semibold">{{ $row->nama_lengkap }}</h5>
                                <p class="card-text">{{ $row->email }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        {{ $keyword ? 'Data alumni tidak ditemukan' : 'Data alumni belum tersedia' }}
                    </div>
                </div>
            @endforelse
            @if (count($alumni) > 0)
                <div class="mt-5">
                    <div class="d-flex justify-content-center ">
                        {!! $alumni->links() !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
