@extends('layouts.app')

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

        .divider {
            width: 100%;
            height: 1px;
            background-color: #152d8f;
            margin: 1rem 0;
        }
    </style>
@endpush

@section('title', 'Pendaftaran Calon Ketua Alumni')

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container" style="margin-top: 120px">
        {{ Breadcrumbs::render('pendaftaran-ketua') }}
        @if (empty($ketua))
            @if (empty($alumni))
                <div class="row justify-content-center mt-5 text-center">
                    <div class="col-md-6">
                        <div class="alert alert-info" role="alert">
                            <p> Silahkan mendaftar sebagai alumni terlebih dahulu</p>
                            <a href="{{ route('pendaftaran-alumni.index') }}" class="btn btn-primary">Daftar</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="mt-5">
                    <div class="row ">
                        <h3 class="text-center fw-semibold">Form Pendaftaran Calon Ketua Alumni</h3>
                        <div class="divider"></div>
                    </div>
                    <div class="row mt-5 justify-content-center ">
                        <div class="col-md-6">

                            <form action="{{ route('pendaftaran-ketua-store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        required>
                                </div>
                                <div class=" mb-3">
                                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                                    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp"
                                        accept="image/png, image/jpeg" required>
                                    @error('foto_ktp')
                                        <div class="text-danger">Ukuran file terlalu besar. Maximum file 4MB
                                        </div>
                                    @enderror
                                </div>
                                <div class=" mb-3">
                                    <label for="pas_foto" class="form-label">Pas Foto Warna</label>
                                    <input type="file" class="form-control" id="pas_foto" accept="image/png, image/jpeg"
                                        name="pas_foto" required>
                                    @error('pas_foto')
                                        <div class="text-danger">Ukuran file terlalu besar. Maximum file 4MB
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_ijazah" class="form-label">No Ijazah SMA</label>
                                    <input type="text" class="form-control" id="no_ijazah" name="no_ijazah" required>
                                </div>
                                <div class=" mb-3">
                                    <label for="ijazah" class="form-label">Foto Ijazah</label>
                                    <input type="file" class="form-control" id="ijazah" name="ijazah" required
                                        accept="image/png, image/jpeg">
                                    @error('ijazah')
                                        <div class="text-danger">Ukuran file terlalu besar. Maximum file 4MB
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="visi_misi" class="form-label">Visi & Misi</label>
                                    <textarea class="form-control" name="visi_misi" id="visi_misi" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rencana_program" class="form-label">Rencana Program</label>
                                    <textarea class="form-control" name="rencana_program" id="rencana_program" required></textarea>
                                </div>
                                <div class="float-end">
                                    <button type="submit" class="btn btn-primary">Sumbit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="row justify-content-center mt-5 text-center">
                <div class="col-md-6">
                    @if ($ketua->approved == 0)
                        <div class="alert alert-info" role="alert">
                            Pendaftaran anda sedang dalam proses verifikasi
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            Anda telah terdaftar sebagai calon ketua alumni
                        </div>
                    @endif
                </div>
            </div>
        @endif
    @endsection

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"
            integrity="sha512-lVkQNgKabKsM1DA/qbhJRFQU8TuwkLF2vSN3iU/c7+iayKs08Y8GXqfFxxTZr1IcpMovXnf2N/ZZoMgmZep1YQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                $('#visi_misi').summernote({
                    height: 200,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                    ]
                });
                $('#rencana_program').summernote({
                    height: 200,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                    ]
                });
            });
        </script>
    @endpush
