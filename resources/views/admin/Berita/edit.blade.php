@extends('layouts.admin')

@section('title', 'Edit Berita')

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
            {{ $errors }}}
            <div>
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Edit Berita <b>{{ $berita->title }}</b></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="new-user-info">
                                    <form action="{{ route('berita.update', $berita->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="title">Judul</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    value="{{ $berita->title }}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="author">Penulis</label>
                                                <input type="text" class="form-control" id="author" name="author"
                                                    value="{{ $berita->author }}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="kategori_id">Kategori</label>
                                                <select type="text" name="kategori_id" class="form-control">
                                                    @foreach ($kategori as $item)
                                                        @if ($item->id == $berita->kategori_id)
                                                            <option value="{{ $item->id }}" selected>
                                                                {{ $item->nama_kategori }}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->nama_kategori }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="banner">Banner</label>
                                                <input type="file" class="form-control" id="banner" name="banner">
                                                <label for="gambar" class=" mt-3">Banner Sebelumnya</label>
                                                <br>
                                                <img src="{{ asset('storage/' . $berita->banner) }}" alt=""
                                                    width="100px">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label class="form-label" for="summernote">Deskripsi</label>
                                                    <textarea class="form-control" name="description" id="summernote">
                                                    {!! $berita->description !!}
                                                </textarea>
                                                </div>
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
