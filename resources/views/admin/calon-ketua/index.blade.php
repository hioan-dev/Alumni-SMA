@extends('layouts.admin')

@section('title', 'Calon Ketua')

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
                            <h4 class="card-title">Calon Ketua</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Pekerjaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($calon_ketua as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->nama_lengkap}}</td>
                                        <td>{{$row->alamat}}</td>
                                        <td>{{$row->pekerjaan}}</td>
                                        <td>
                                            @if ($row->approved == 0)
                                            <form action="{{ route('calon-ketua-approve') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm gap-2">Approve</button>
                                            </form>
                                            <a href="{{ route('calon-ketua.show', $row->id) }}" class="btn btn-success btn-sm gap-2">Lihat</a>
                                            @else
                                            <a href="{{ route('calon-ketua.show', $row->id) }}"
                                                class="btn btn-success btn-sm gap-2">Lihat</a>

                                                <form action="{{ route('calon-ketua.destroy', $row->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Belum Ada Data</td>
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
                ©<script>
                document.write(new Date().getFullYear())
                </script> SMA 1 Tebing Tinggi
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
</main>
@endsection