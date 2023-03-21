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
                    <form action="{{ route('pembayaran-iuran-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran">
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="text" class="form-control" id="nominal" name="nominal" placeholder="50000">
                        <span class="text-muted">*Masukkan nominal tanpa titik atau koma</span>
                    </div>
                    <div class=" mb-3">
                        <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary">Sumbit</button>
                    </div>
                </form>
                </div>
        </div>
    @endsection
