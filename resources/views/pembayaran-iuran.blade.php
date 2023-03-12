@extends('layouts.app')

@push('styles')
    <style>
        .divider {
            width: 100%;
            height: 1px;
            background-color: #152d8f;
            margin: 1rem 0;
        }
    </style>
@endpush

@section('title', 'Pembayaran Iuran')

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container" style="margin-top: 120px">
        {{ Breadcrumbs::render('pembayaran-iuran') }}

        <div class="row mt-5">
            <h3 class="text-center fw-semibold">Form Bukti Pembayaran Iuran</h3>
            <div class="divider"></div>
        </div>
        <div class="row mt-5 justify-content-center ">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                    <label for="tgl-pembayaran" class="form-label">Tenggal Pembayaran</label>
                    <input type="date" class="form-control" id="tgl-pembayaran">
                </div>
                <div class=" mb-3">
                    <label for="foto" class="form-label">Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="foto">
                </div>
                <div class="float-end">
                    <button type="button" class="btn btn-primary">Sumbit</button>
                </div>
            </div>
        </div>
    @endsection
