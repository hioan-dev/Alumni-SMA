@extends('layouts.admin')

@section('title', 'Pendaftar Alumni')

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
                                <h4 class="card-title">Data Alumni Mendaftar</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tahun Lulus</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($alumni as $row)
                                            <td>{{ $row->nama_lengkap }}</td>
                                            <td>{{ $row->tahun_lulus }}</td>
                                            <td>
                                                <form action="{{ route('pendaftar-approve') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                                    <input <?php if ($row->approved == 1) {
                                                        echo 'checked';
                                                    } ?> type="checkbox" name="approved"
                                                        value="1" id="approved">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm gap-2">Approve</button>
                                                </form>
                                            </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td class="text-center">Belum Ada Pendaftar</td>
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
