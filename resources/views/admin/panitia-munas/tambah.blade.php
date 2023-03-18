@extends('layouts.admin')

@section('title', 'Tambah Panitia Munas')

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
                                <h4 class="card-title">Tambah Data</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="new-user-info">
                                <form action="{{ route('panitia-munas.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama"
                                                name="nama">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan" name="jabatan">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="rpass">Foto</label>
                                            <input type="file" class="form-control" id="foto" placeholder=""
                                                name="foto">
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