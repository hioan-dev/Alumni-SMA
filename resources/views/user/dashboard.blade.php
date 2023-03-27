@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<main class="main-content">
    <div class="position-relative iq-banner">
        <!--Nav Start-->
        @include('admin.partials._navbar')
        <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        @foreach($data_alumni as $row)            
        <div>
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Foto</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="profile-img-edit position-relative">
                                    <img class="form-control" width="100" height="250"
                                        src="{{ asset('storage/' . $row->foto) }}" alt="profile-pic">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Alumni</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="fname">Nama Lengkap</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->nama_lengkap }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="lname">Tahun Lulus</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->tahun_lulus }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="lname">Kelas</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->kelas }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="add1">Tempat Lahir</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->tempat_lahir }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="add2">Tanggal Lahir</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->tanggal_lahir }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Teman Sebangku</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->teman_sebangku }}</label>
                                    </div>
                                    <hr>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Alamat</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->alamat }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Provinsi</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->provinsi }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Kota</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->kota }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Jenis Kelamin</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->jenkel }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Ukuran Baju</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->ukuran_baju }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Pendidikan Terakhir</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->pendidikan_terakhir }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Universitas</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->universitas }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Jurusan</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->jurusan }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Pekerjaan</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->pekerjaan }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Nama Perusahaan</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->perusahaan }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Jabatan</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->jabatan }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">No HP</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->no_hp }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="cname">Email</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $row->email }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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