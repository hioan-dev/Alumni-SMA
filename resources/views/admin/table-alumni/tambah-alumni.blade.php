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
                                <form action="{{ route('table-alumni.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap"
                                                name="nama_lengkap">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Tahun Lulus</label>
                                            <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Kelas</label>
                                            <input type="text" class="form-control" id="kelas" name="kelas">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir"
                                                name="tempat_lahir">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir"
                                                name="tanggal_lahir">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Nama Teman Sebangku</label>
                                            <input type="text" class="form-control" id="teman_sebangku"
                                                name="teman_sebangku">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat"
                                                rows="2"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" aria-label="Jenis kelamin select" name="jenkel">
                                                <option selected value="male">Laki-Laki</option>
                                                <option value="female">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Pendidikan Terakhir</label>
                                            <select class="form-select" aria-label="Pendidikan select"
                                                name="pendidikan_terakhir">
                                                <option selected value="SMA">SMA</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Ukuran Baju</label>
                                            <select class="form-select" aria-label="Ukuran Baju select"
                                                name="ukuran_baju">
                                                <option selected value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="XXXL">XXXL</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Universitas</label>
                                            <input type="text" class="form-control" id="universitas" name="universitas">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Program Studi/Jurusan</label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">No Hp/WA</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Email</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Approved</label>
                                            <select class="form-select" aria-label="Ukuran Baju select"
                                                name="approved">
                                                <option selected value="1">Publish</option>
                                                <option value="0">Draft</option>
                                            </select>
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