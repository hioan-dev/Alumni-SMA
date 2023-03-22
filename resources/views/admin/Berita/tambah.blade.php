@extends('layouts.admin')

@section('title', 'Tambah Berita')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css"
        integrity="sha512-ZbehZMIlGA8CTIOtdE+M81uj3mrcgyrh6ZFeG33A4FHECakGrOsTPlPQ8ijjLkxgImrdmSVUHn1j+ApjodYZow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .note-editor .dropdown-toggle::after {
            all: unset;
        }

        .note-editor .note-dropdown-menu {
            box-sizing: content-box;
        }

        .note-editor .note-modal-footer {
            box-sizing: content-box;
        }
    </style>
@endpush

@section('content')
<main class="main-content">
    <div class="position-relative iq-banner">
        <!--Nav Start-->
        @include('admin.partials._navbar')
        <!--Nav End-->
    </div>

    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Tambah Berita</h4>
                            </div>
                            <a href="{{ route('berita.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                        </div>
                        <div class="card-body">
                            <div class="new-user-info">
                                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="title">Judul</label>
                                            <input type="text" class="form-control" id="title" name="title"  placeholder="Enter Judul Berita">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="author">Penulis</label>
                                            <input type="text" class="form-control" id="author" name="author"  placeholder="Enter Penulis">
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="kategori_id">Kategori</label>
                                            <select type="text" name="kategori_id" class="form-control">
                                                <option value="">Pilih Kategori</option>
                                                
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="banner">Banner</label>
                                            <input type="file" class="form-control" id="banner" name="banner">
                                        </div> 
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="summernote">Deskripsi</label>
                                            <textarea class="form-control" name="description" id="summernote"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                                    <button type="reset" class="btn btn-danger btn-sm">Batal</button>
                                </form>
                            </div>
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

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"
        integrity="sha512-lVkQNgKabKsM1DA/qbhJRFQU8TuwkLF2vSN3iU/c7+iayKs08Y8GXqfFxxTZr1IcpMovXnf2N/ZZoMgmZep1YQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 450
            });
        });
    </script>
@endpush


