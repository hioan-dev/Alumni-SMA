@extends('layouts.admin')

@section('title', 'Edit Sambutan')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
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
                    <div class="col-xl-12 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Edit Kata Sambutan</h4>
                                </div>
                                <a href="{{ route('sambutan.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                            </div>
                            <div class="card-body">
                                <div class="new-user-info">
                                    <form action="{{ route('sambutan.update', $data->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="banner">Banner</label>
                                                <input type="file" class="form-control" id="banner" name="banner"
                                                    accept=".png,.jpg,.jpeg.,jpg,.svg">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="summernote">Deskripsi</label>
                                                <input id="x" type="hidden" name="sambutan"
                                                    value="{!! $data->sambutan !!}">
                                                <trix-editor input="x"></trix-editor>
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
