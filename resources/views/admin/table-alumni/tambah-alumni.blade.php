@extends('layouts.admin')

@section('title', 'Tambah Alumni')

@push('styles')
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
                                                <input type="text" class="form-control" id="tahun_lulus"
                                                    name="tahun_lulus">
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
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="rpass">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="provinsi" class="form-label">Provinsi</label>
                                                @php
                                                    $provinces = Http::get(
                                                        'http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
                                                    );
                                                    $provinces = $provinces->json();
                                                @endphp
                                                <select class="form-select" aria-label="provinsi select" name="provinsi"
                                                    id="provinsi">
                                                    <option>Pilih Salah Satu</option>
                                                    @foreach ($provinces as $item)
                                                        <option value="{{ $item['name'] ?? '' }}" id="{{ $item['id'] }}">
                                                            {{ $item['name'] ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                @php
                                                    $regency = Http::get(
                                                        'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/12.json',
                                                    );
                                                    $regency = $regency->json();
                                                @endphp
                                                <label for="kota" class="form-label">Kabupaten / Kota</label>
                                                <select class="form-select" aria-label="kota select" name="kota"
                                                    id="kota">
                                                    <option>Pilih Salah Satu</option>
                                                    @foreach ($regency as $item)
                                                        <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" aria-label="Jenis kelamin select"
                                                    name="jenkel">
                                                    <option selected value="male">Laki-Laki</option>
                                                    <option value="female">Perempuan</option>
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
                                                <label class="form-label" for="rpass">Pekerjaan</label>
                                                <input type="text" class="form-control" id="pekerjaan"
                                                    name="pekerjaan">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="perusahaan" class="form-label">Nama
                                                    Perusahaan/Instansi</label>
                                                <input type="text" class="form-control" id="perusahaan"
                                                    name="perusahaan">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" id="jabatan"
                                                    name="jabatan">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="rpass">No Hp/WA</label>
                                                <input type="text" class="form-control" id="no_hp"
                                                    name="no_hp">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="rpass">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    name="email">
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="fw-semibold">Data Pendidikan</h5>
                                            </div>
                                            <div class="mb-3">
                                                <div id="form-pendidikan">
                                                    <div class="mb-3">
                                                        <label for="pendidikan" class="form-label">Pendidikan</label>
                                                        <select class="form-select" aria-label="Pendidikan select"
                                                            name="pendidikan[]">
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
                                                    <div class="mb-3">
                                                        <label for="universitas" class="form-label">Universitas</label>
                                                        <input type="text" class="form-control" id="universitas"
                                                            name="universitas[]">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jurusan" class="form-label">Jurusan</label>
                                                        <input type="text" class="form-control" id="jurusan"
                                                            name="jurusan[]">
                                                    </div>
                                                </div>
                                                <button class="btn btn-outline-primary" id="tambah">+ Tambahkan
                                                    Pendidikan</button>
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
    <script>
        function onChangeSelect(id, name) {
            console.log(id);
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: `http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`,
                type: 'GET',
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>Pilih Salah Satu</option>');

                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + value.name + '">' + value.name +
                            '</option>');
                    });
                }
            });
        }

        $(function() {
            $('#provinsi').on('change', function(e) {
                onChangeSelect($(this).find(':selected').attr('id'), 'kota');
            });

        });

        // add pendidikan
        const formInput = `<div class="mt-5">
                                <div class="mb-3">
                                    <label for="pendidikan" class="form-label">Pendidikan</label>
                                    <select class="form-select" aria-label="Pendidikan select" name="pendidikan[]">
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
                                <div class="mb-3">
                                    <label for="universitas" class="form-label">Universitas</label>
                                    <input type="text" class="form-control" id="universitas"
                                        name="universitas[]">
                                </div>
                                <div class="mb-3">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan[]">
                                </div>
                            </div>`
        $('#tambah').on('click', function(e) {
            e.preventDefault();
            $('#form-pendidikan').append(formInput);
        });
    </script>
@endpush
