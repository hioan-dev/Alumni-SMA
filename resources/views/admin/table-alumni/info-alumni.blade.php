@extends('layouts.admin')

@section('title', 'Data Alumni')

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
                                            src="{{ asset('storage/' . $data_alumni->foto) }}" alt="profile-pic">
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
                                                class="form-control text-black">{{ $data_alumni->nama_lengkap }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="lname">Tahun Lulus</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->tahun_lulus }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="lname">Kelas</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->kelas }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="add1">Tempat Lahir</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->tempat_lahir }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="add2">Tanggal Lahir</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->tanggal_lahir }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Teman Sebangku</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->teman_sebangku }}</label>
                                        </div>
                                        <hr>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Alamat</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->alamat }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Provinsi</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->provinsi }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Kota</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->kota }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Jenis Kelamin</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->jenkel }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Ukuran Baju</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->ukuran_baju }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">No HP / WA</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->no_hp }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Email</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->email }}</label>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <h5 class="fw-semibold mb-3">Data Pendidikan</h5>
                                            <div class="row">
                                                @foreach ($data_alumni->pendidikan as $item)
                                                    <div class="col-md-4">
                                                        <label class="form-label" for="cname">Pendidikan</label>
                                                        <label type="text"
                                                            class="form-control text-black">{{ $item->pendidikan }}</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-label" for="cname">Universitas</label>
                                                        <label type="text"
                                                            class="form-control text-black">{{ $item->universitas }}</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-label" for="cname">Jurusan</label>
                                                        <label type="text"
                                                            class="form-control text-black">{{ $item->jurusan }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <h5 class="fw-semibold ">Data Pekerjaan</h5>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Pekerjaan</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->pekerjaan }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Nama Perusahaan</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->perusahaan }}</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cname">Jabatan</label>
                                            <label type="text"
                                                class="form-control text-black">{{ $data_alumni->jabatan }}</label>
                                        </div>


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
