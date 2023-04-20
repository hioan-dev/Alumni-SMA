@extends('layouts.admin')

@section('title', 'Edit Data Calon Ketua')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.css"
        integrity="sha512-tbjZFdjHyHckTfeqkgVFcQ3GJWVfdsNYFvl+rEWmofjj9JpWaohlZgq0Vb6Hav5rqIL019LFpLsE+sTNSfNVXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css"
        integrity="sha512-ZbehZMIlGA8CTIOtdE+M81uj3mrcgyrh6ZFeG33A4FHECakGrOsTPlPQ8ijjLkxgImrdmSVUHn1j+ApjodYZow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <form action="{{ route('calon-ketua.update', $calon_ketua->id) }}" method="POST"
                    enctype="multipart/form-data" class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-xl-3 col-lg-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Pas Foto</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="profile-img-edit position-relative">
                                        <div class="baguettebox"> <a href="{{ asset('storage/' . $calon_ketua->pas_foto) }}"
                                                class="cursor-zoom lightbox"> <img class="form-control" width="100"
                                                    height="250" src="{{ asset('storage/' . $calon_ketua->pas_foto) }}"
                                                    alt="profile-pic"></a>
                                            <div class="form-group">
                                                <input name="pas_foto" type="file" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">KTP</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="profile-img-edit position-relative">
                                        <div class="baguettebox"> <a href="{{ asset('storage/' . $calon_ketua->foto_ktp) }}"
                                                class="cursor-zoom lightbox"> <img class="form-control" width="100"
                                                    height="250" src="{{ asset('storage/' . $calon_ketua->foto_ktp) }}"
                                                    alt="profile-pic"></a>
                                            <div class="form-group">
                                                <input name="foto_ktp" type="file" accept="image/*" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Ijazah</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="profile-img-edit position-relative">
                                        <div class="baguettebox"> <a href="{{ asset('storage/' . $calon_ketua->ijazah) }}"
                                                class="cursor-zoom lightbox"><img class="form-control" width="100"
                                                    height="250" src="{{ asset('storage/' . $calon_ketua->ijazah) }}"
                                                    alt="profile-pic"></a>
                                            <div class="form-group">
                                                <input name="ijazah" type="file" accept="image/*" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Data Calon Ketua</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="new-user-info">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="fname">Nama Lengkap</label>
                                            <input name="nama_lengkap" type="text" class="form-control text-black"
                                                value="{{ $calon_ketua->nama_lengkap }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="lname">NIK</label>
                                            <input name="nik" type="text" class="form-control text-black"
                                                value="{{ $calon_ketua->nik }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="lname">No Ijazah</label>
                                            <input name="no_ijazah" type="text" class="form-control text-black"
                                                value="{{ $calon_ketua->no_ijazah }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="add1">Alamat</label>
                                            <input name="alamat" type="text" class="form-control text-black"
                                                value="{{ $calon_ketua->alamat }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="add2">Pekerjaan</label>
                                            <input name="pekerjaan" type="text" class="form-control text-black"
                                                value="{{ $calon_ketua->pekerjaan }}">
                                        </div>
                                        <hr>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="cname">Visi & Misi</label>
                                            <textarea class="form-control" name="visi_misi" id="visi_misi" required>{{ $calon_ketua->visi_misi }}</textarea>
                                        </div>
                                        <hr>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="cname">Rencana Program</label>
                                            <textarea class="form-control" name="rencana_program" id="rencana_program" required>{{ $calon_ketua->rencana_program }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div><button class="btn btn-success">Simpan</button></div>
                            </div>
                        </div>
                    </div>
                </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.js"
        integrity="sha512-+8LoWbC6Y9Vy85wapJUYlRvabpzAIGhgiL6vZWNHn0F8EFJ43a1BCSzXo7b7OeY6bczJ3Q+ifRweZpW1iPAARg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        baguetteBox.run('.baguettebox');
    </script>
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
