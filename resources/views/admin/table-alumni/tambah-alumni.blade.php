@extends('layouts.admin')

@section('title', 'Tambah Alumni')

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
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pass">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="type" class="selectpicker form-control" data-style="py-0">
                                                <option>Laki - Laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Angkatan</label>
                                            <input type="text" class="form-control" id="angkatan" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Kelas</label>
                                            <input type="text" class="form-control" id="kelas" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Pendidikan Terakhir</label>
                                            <input type="text" class="form-control" id="pendidikan_terakhir"
                                                placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="rpass">Foto</label>
                                            <input type="file" class="form-control" id="pendidikan_terakhir"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                                    <button type="submit" class="btn btn-danger btn-sm">Batal</button>
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