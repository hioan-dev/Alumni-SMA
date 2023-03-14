@extends('layouts.admin')

@section('title', 'Berita')

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
                            <h4 class="card-title">Berita</h4>
                        </div>
                        <a href="{{ route('berita.create') }}" class="btn btn-primary btn-sm gap-2"><i
                                class="bi bi-plus"></i> &nbsp; Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Berita</th>
                                        <th>Kategori</th>
                                        <th>Penulis</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($berita as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->kategori->nama_kategori}}</td>
                                        <td>{{$item->author}}</td>
                                        <td><img src="{{ asset('public/berita' . $item->banner) }}" alt="" width="100px" height="60px"></td>
                                        <td>
                                            <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm gap-2"><i
                                                    class="bi bi-pencil-square"></i></a>

                                            <form action="{{route('berita.destroy', $item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"><i
                                                        class="bi bi-trash3"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">Belum Ada Berita</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforelse
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