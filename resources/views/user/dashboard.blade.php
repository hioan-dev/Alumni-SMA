@extends('layouts.user')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.css"
        integrity="sha512-tbjZFdjHyHckTfeqkgVFcQ3GJWVfdsNYFvl+rEWmofjj9JpWaohlZgq0Vb6Hav5rqIL019LFpLsE+sTNSfNVXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush


@section('content')
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            @include('user.partials.__navbar')
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div>
                @if ($data_alumni == true)
                    @if ($data_alumni->approved == 1)
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
                                                <div class="baguettebox"> <a
                                                        href="{{ asset('storage/' . $data_alumni->foto) }}"
                                                        class="cursor-zoom lightbox"> <img class="form-control"
                                                            width="100" height="250"
                                                            src="{{ asset('storage/' . $data_alumni->foto) }}"
                                                            alt="profile-pic"></a>
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
                                            <h4 class="card-title">Data Alumni</h4>
                                            <a href="{{ route('user-dashboard-edit', $data_alumni->id) }}"
                                                class="btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                                <span>Edit</span>
                                            </a>
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
                                                                <label class="form-label"
                                                                    for="cname">Pendidikan</label>
                                                                <label type="text"
                                                                    class="form-control text-black">{{ $item->pendidikan }}</label>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="form-label"
                                                                    for="cname">Universitas</label>
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
                    @else
                        <div class="col-md-12">
                            <div class="alert alert-info text-center" role="alert">
                                <p class="fs-5"> Data anda sedang dalam proses verifikasi.</p>

                            </div>
                        </div>
                    @endif
                @else
                    <div class="col-md-12">
                        <div class="alert alert-info text-center" role="alert">
                            <p class="fs-5">Anda belum terdaftar sebagai alumni, silakan mendaftar sebagai alumni
                                terlebih dahulu. </p>
                            <a href="{{ route('pendaftaran-alumni.index') }}" class="btn btn-primary">Pendaftaran
                                Alumni</a>
                        </div>
                    </div>
                @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.js"
        integrity="sha512-+8LoWbC6Y9Vy85wapJUYlRvabpzAIGhgiL6vZWNHn0F8EFJ43a1BCSzXo7b7OeY6bczJ3Q+ifRweZpW1iPAARg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        baguetteBox.run('.baguettebox');
    </script>
@endpush
