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

@section('title', 'Daftar Iuran')

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container min-vh-100" style="margin-top: 120px">
        {{ Breadcrumbs::render('iuran') }}

        <div class="row mt-5">
            <h3 class="text-center fw-semibold">Daftar Alumni Yang Sudah Membayar Iuran</h3>
            <div class="divider"></div>
        </div>
        <div class="row mt-4 px-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah Pembayaran</th>
                        <th scope="col">Tanggal Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($iuran as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>Rp{{ number_format($item->nominal, 0, ',', '.') }}</td>
                            <td>{{ $item->tanggal_pembayaran }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
