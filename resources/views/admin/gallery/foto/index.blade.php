@extends('layouts.admin')

@section('title', 'Gallery Foto')

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
                            <h4 class="card-title">Gallery Foto</h4>
                        </div>
                        <a href="{{route('gallery-foto.create')}}" class="btn btn-primary btn-sm gap-2"><i
                                class="bi bi-plus"></i> &nbsp; Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($foto as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img src="{{asset('storage/'.$row->foto)}}" alt="" width="100px"></td>
                                        <td>{{$row->deskripsi}}</td>
                                        <td>
                                            <a href="{{ route('gallery-foto.edit', $row->id) }}"
                                                class="btn btn-warning btn-sm gap-2"><i
                                                    class="bi bi-pencil-square"></i></a>

                                                <form action="{{ route('gallery-foto.destroy', $row->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash3"></i></button>
                                                </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">Belum Ada Data Foto</td>
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