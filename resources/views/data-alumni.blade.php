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
        <div class="row mt-3">
            <p class="text-center">Hasil pencarian untuk "<span class="fw-bold">Rudi</span>"</p>
        </div>
        <div class="row mt-1 gy-3">
            @for ($i = 0; $i < 10; $i++)
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-header">
                            <h5 class="fw-semibold">IPA 3</h5>
                            <h6>2019</h6>
                        </div>
                        <div class="card-body">
                            <div class="student-img">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="mt-3">
                                <h5 class="card-title fw-semibold">Abrahan GT Sinaga</h5>
                                <p class="card-text">abramtambatuasinaga@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor


        </div>
    </div>
@endsection
