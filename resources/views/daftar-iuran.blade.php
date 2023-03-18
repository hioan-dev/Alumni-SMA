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
    <div class="container" style="margin-top: 120px">
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Rp275.000</td>
                        <td>13/03/2023</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Rp125.000</td>
                        <td>10/03/2023</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>Rp152.000</td>
                        <td>09/03/2023</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
