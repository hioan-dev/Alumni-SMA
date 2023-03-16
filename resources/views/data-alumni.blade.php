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
                <div class="row gx-0 justify-content-center ">
                    <div class="col-8">
                        <input type="text" class="form-control" placeholder="Cari alumni" aria-label="First name">
                    </div>
                    <div class="col-auto ms-2">
                        <button type="button" class="btn btn-primary px-4">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row mt-3">
            <p class="text-center">Hasil pencarian untuk "<span class="fw-bold">Rudi</span>"</p>
        </div> --}}
        <div class="row mt-5 gy-3">
            @forelse ($alumni as $row)
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-header">
                            <h5 class="fw-semibold">{{ $row->kelas }}</h5>
                            <h6>{{ $row->tahun_lulus }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="student-img">
                                {{-- <img src="{{ asset('storage/' . $row->foto) }}" alt="" class="img-fluid"> --}}
                                <img src="{{ $row->foto }}" alt="" class="img-fluid">

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
                    <div class="alert alert-warning text-center" role="alert">
                        Belum ada alumni yang mendaftar
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
