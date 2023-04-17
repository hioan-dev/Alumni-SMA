@extends('layouts.admin')

@section('title', 'Edit Alumni')

@section('content')
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            @include('admin.partials._navbar')
            <!--Nav End-->
        </div>

        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div>
                <form action="{{ route('table-alumni.update', $data_alumni->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                            <input class="file-upload" type="file" id="foto" placeholder=""
                                                name="foto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Edit Data</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="new-user-info">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="rpass">Foto</label>
                                                <input type="file" class="form-control" id="foto" placeholder=""
                                                    name="foto">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap"
                                                    name="nama_lengkap" value="{{ $data_alumni->nama_lengkap }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="lname">Tahun Lulus</label>
                                                <input type="text" class="form-control" id="tahun_lulus"
                                                    name="tahun_lulus" value="{{ $data_alumni->tahun_lulus }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="lname">Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas"
                                                    value="{{ $data_alumni->kelas }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="add1">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    name="tempat_lahir" value="{{ $data_alumni->tempat_lahir }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="add2">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir"
                                                    name="tanggal_lahir" value="{{ $data_alumni->tanggal_lahir }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Teman Sebangku</label>
                                                <input type="text" class="form-control" id="teman_sebangku"
                                                    name="teman_sebangku" value="{{ $data_alumni->teman_sebangku }}">
                                            </div>
                                            <hr>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    value="{{ $data_alumni->alamat }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Provinsi</label>
                                                <select class="form-select" aria-label="provinsi select" name="provinsi"
                                                    id="provinsi">
                                                    <option>Pilih Salah Satu</option>
                                                    @foreach ($provinces as $item)
                                                        <option
                                                            {{ $data_alumni->provinsi === $item['name'] ? 'selected' : '' }}
                                                            value="{{ $item['name'] ?? '' }}" id="{{ $item['id'] }}">
                                                            {{ $item['name'] ?? '' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Kota</label>
                                                <select class="form-select" aria-label="kota select" name="kota"
                                                    id="kota">
                                                    <option>Pilih Salah Satu</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Jenis Kelamin</label>
                                                <select class="form-select" aria-label="Jenis kelamin select"
                                                    name="jenkel">
                                                    <option selected value="male">Laki-Laki</option>
                                                    <option value="female">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Ukuran Baju</label>
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
                                                <label class="form-label" for="cname">No HP / WA</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    value="{{ $data_alumni->no_hp }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Email</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    value="{{ $data_alumni->email }}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <h5 class="fw-semibold mb-3">Data Pendidikan</h5>
                                                <div class="row">
                                                    @foreach ($data_alumni->pendidikan as $item)
                                                        <div class="col-md-4">
                                                            <label class="form-label" for="cname">Pendidikan</label>
                                                            <select class="form-select" aria-label="Pendidikan select"
                                                                name="pendidikan[]">
                                                                @foreach ($values = ['SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $value)
                                                                    <option
                                                                        {{ $item->pendidikan === $value ? 'selected' : '' }}
                                                                        value="{{ $value }}">
                                                                        {{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="form-label" for="cname">Universitas</label>
                                                            <input type="text" class="form-control" id="universitas"
                                                                name="universitas[]" value="{{ $item->universitas }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="form-label" for="cname">Jurusan</label>
                                                            <input type="text" class="form-control" id="jurusan"
                                                                name="jurusan[]" value="{{ $item->jurusan }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <h5 class="fw-semibold ">Data Pekerjaan</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Pekerjaan</label>
                                                <input type="text" class="form-control" id="pekerjaan"
                                                    name="pekerjaan" value="{{ $data_alumni->pekerjaan }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Nama Perusahaan</label>
                                                <input type="text" class="form-control" id="nama_perusahaan"
                                                    name="perusahaan" value="{{ $data_alumni->perusahaan }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="cname">Jabatan</label>
                                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                                    value="{{ $data_alumni->jabatan }}">
                                            </div>


                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
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
    <script>
        const selectedKota = '{{ $data_alumni->kota }}'

        function onChangeSelect(id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: `http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`,
                type: 'GET',
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>Pilih Salah Satu</option>');

                    $.each(data, function(key, value) {
                        $('#' + name).append(`<option ${value.name === selectedKota ? 'selected' : ''} value="${value.name}">
                            ${value.name}
                            </option>`);
                    });
                }
            });
        }

        $(function() {
            onChangeSelect($(this).find(':selected').attr('id'), 'kota');

            $('#provinsi').on('change', function(e) {
                onChangeSelect($(this).find(':selected').attr('id'), 'kota');
            });
        });

        // Pilih elemen yang akan dipantau perubahannya
        const targetNode = document.getElementById('provinsi');

        // Buat instance dari MutationObserver
        const observer = new MutationObserver((mutationsList, observer) => {
            // Loop melalui setiap mutasi yang terjadi
            for (let mutation of mutationsList) {
                // Jika terjadi penambahan elemen, tampilkan pesan
                if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                    console.log('Elemen baru telah ditambahkan ke dalam DOM');
                }
            }
        });

        // Konfigurasi observer untuk memantau perubahan pada elemen target
        const config = {
            childList: true
        };

        // Mulai memantau perubahan pada elemen target
        observer.observe(targetNode, config);

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
