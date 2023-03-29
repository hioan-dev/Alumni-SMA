@extends('layouts.admin')

@section('title', 'Komfirmasi Iuran')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@endpush

@section('content')
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            @include('admin.partials._navbar')
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Iuran</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Nominal</th>
                                            <th>No Rekening</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($iuran as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $row->nama_lengkap }}</td>
                                                <td>{{ $row->tanggal_pembayaran }}</td>
                                                <td>{{ $row->nominal }}</td>
                                                <td>{{ $row->no_rekening }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $row->bukti_pembayaran) }}"
                                                        alt="Bukti Pembayaran" width="100px">
                                                </td>
                                                <td>
                                                    <form action="{{ route('iuran-delete', $row->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">Belum Ada Data</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <div class="right-panel">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> SMA 1 Tebing Tinggi
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>
@endsection
