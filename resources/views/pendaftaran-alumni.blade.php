@extends('layouts.app')

@push('styles')
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <style>
        .divider {
            width: 100%;
            height: 1px;
            background-color: #152d8f;
            margin: 1rem 0;
        }
    </style>
@endpush

@section('title', 'Pendaftaran Alumni')

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container" style="margin-top: 120px">
        {{ Breadcrumbs::render('pendaftaran-alumni') }}

        @if (empty($alumni))
            <div class="mt-5">
                <div class="row">
                    <h3 class="text-center fw-semibold">Pendaftaran Alumni</h3>
                    <div class="divider"></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mt-4">
                            <div class="">
                                <h5 class="fw-semibold">Terima Kasih atas kesediaan anda untuk mengisi formulir data alumni
                                    ini.
                                    Silakan
                                    isi
                                    data anda sesuai
                                    dengan form yang tersedia dan mohon baca petunjuk pengisian sebelumnya. </h5>
                                <ol>
                                    <li>Semua field harus diisi dan tidak boleh kosong untuk menghindari error saat
                                        penyimpanan
                                        dan
                                        pencarian.</li>
                                    <li>Mohon lakukan re-size ukuran foto yg akan di unggah dgn ukuran terkecil (silakan
                                        crop
                                        close-up
                                        terlebih dahulu), untuk menghindari waktu upload/load yg lama. <b>(rekomendasi
                                            ukuran
                                            foto
                                            max.
                                            300×300
                                            pixel) </b> </li>
                                    <li>Data tdk bisa langsung lve dalam real-time, Admin akan melakukan pratinjau data anda
                                        sebelum
                                        ditampilkan, <b> SLA maks. 1×24 jam </b> setelah anda mengisi data akan masuk dalam
                                        database
                                        utama
                                        untuk
                                        fitur pencarian. </li>
                                    <li>Apabila dilakukan input ulang dengan nama yang sama (multiple input data), maka
                                        submitted
                                        data
                                        sebelumnya akan di hapus dan dianggap overwrite oleh data terbaru.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="">

                                <h5 class="fw-semibold">Pernyataan pengurus atas pengumpulan dan penggunaan data alumni.
                                </h5>
                                <ol>
                                    <li>Seluruh data input alumuni (data alumni) ini hanya akan digunakan untuk aktifitas
                                        dan
                                        lingkup
                                        terbatas yang berkaitan dengan alumni SMA 1 TEBING TINGGI</li>
                                    <li>Penggunaan atau pengolahan data alumni termasuk mencakup didalamnya adalah untuk
                                        kepentingan
                                        riset
                                        dan analisa dan/atau sebagai sumber referensi kontak untuk pusat database alumni.
                                    </li>
                                    <li>Untuk kepentingan riset dan analisa internal alumni, semua data alumni yg dipakai
                                        tdak
                                        akan
                                        menampilkan identitas personal.</li>
                                    <li>engurus berkomitmen, menjamin dan menjaga bahwa data alumni TIDAK digunakan atau
                                        dimanfaatkan
                                        untuk
                                        tujuan komersial atau diberikan kepada pihak ketiga untuk kepentingan apapun.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('/images/logo.png') }}" alt="Logo alumni" class="img-fluid">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <form class="needs-validation" action="{{ route('pendaftaran-alumni.store') }}" method="POST"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class=" mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input accept="image/png, image/jpeg" required type="file" class="form-control"
                                    id="foto" name="foto">
                                @error('foto')
                                    <div class="text-danger">Ukuran file terlalu besar. Maximum file 4MB
                                    </div>
                                @enderror
                                <div class="invalid-feedback">
                                    Pas foto belum di isi
                                </div>
                            </div>
                            <div class="mb-3 mt-5">
                                <h5 class="fw-semibold">Data Pribadi</h5>
                            </div>
                            <div class="mb-3 has-validation">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input required type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    aria-describedby="nama_lengkap">
                                <div class="invalid-feedback">
                                    Nama lengkap belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                <input required type="text" class="form-control" id="tahun_lulus" name="tahun_lulus">
                                <div class="invalid-feedback">
                                    Tahun lulus belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input required type="text" class="form-control" id="kelas" name="kelas">
                                <div class="invalid-feedback">
                                    Kelas belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input required type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                <div class="invalid-feedback">
                                    Tempat lahir belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                <div class="invalid-feedback">
                                    Tanggal lahir belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="teman_sebangku" class="form-label">Nama Teman Sebangku</label>
                                <input required type="text" class="form-control" id="teman_sebangku"
                                    name="teman_sebangku">
                                <div class="invalid-feedback">
                                    Nama teman sebangku belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea required class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                <div class="invalid-feedback">
                                    Alamat belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                @php
                                    $provinces = Http::get(
                                        'http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
                                    );
                                    $provinces = $provinces->json();
                                @endphp
                                <select required class="form-select" aria-label="provinsi select" name="provinsi"
                                    id="provinsi">
                                    <option>Pilih Salah Satu</option>
                                    @foreach ($provinces as $item)
                                        <option value="{{ $item['name'] ?? '' }}" id="{{ $item['id'] }}">
                                            {{ $item['name'] ?? '' }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Provinsi belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                @php
                                    $regency = Http::get(
                                        'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/12.json',
                                    );
                                    $regency = $regency->json();
                                @endphp
                                <label for="kota" class="form-label">Kabupaten / Kota</label>
                                <select required class="form-select" aria-label="kota select" name="kota"
                                    id="kota">
                                    <option>Pilih Salah Satu</option>
                                    @foreach ($regency as $item)
                                        <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Kota belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jenkel" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Jenis kelamin select" name="jenkel">
                                    <option selected value="male">Laki-Laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ukuran_baju" class="form-label">Ukuran Baju</label>
                                <select class="form-select" aria-label="Ukuran Baju select" name="ukuran_baju">
                                    <option selected value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="XXXL">XXXL</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No HP / WA</label>
                                <input required type="text" class="form-control" id="no_hp" name="no_hp">
                                <div class="invalid-feedback">
                                    No HP / WA belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input required type="email" class="form-control" id="email" name="email">
                                <div class="invalid-feedback">
                                    Email belum di isi
                                </div>
                            </div>
                            <div class="mb-3 mt-5">
                                <h5 class="fw-semibold">Data Pendidikan</h5>
                            </div>
                            <div>
                                <div id="form-pendidikan">
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
                                        <input required type="text" class="form-control" id="universitas"
                                            name="universitas[]">
                                        <div class="invalid-feedback">
                                            Universitas belum di isi
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jurusan" class="form-label">Jurusan</label>
                                        <input required type="text" class="form-control" id="jurusan"
                                            name="jurusan[]">
                                        <div class="invalid-feedback">
                                            Jurusan belum di isi
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-primary" id="tambah">+ Tambahkan Pendidikan</button>
                            </div>
                            <div class="mb-3 mt-5">
                                <h5 class="fw-semibold">Data Pekerjaan</h5>
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input required type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                                <div class="invalid-feedback">
                                    Pekerjaan belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="perusahaan" class="form-label">Nama Perusahaan/Instansi</label>
                                <input required type="text" class="form-control" id="perusahaan" name="perusahaan">
                                <div class="invalid-feedback">
                                    Nama Perusahaan belum di isi
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input required type="text" class="form-control" id="jabatan" name="jabatan">
                                <div class="invalid-feedback">
                                    Jabatan belum di isi
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary">Sumbit</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6 mt-5 mt-md-0">
                        <div>
                            <h5 class="fw-semibold">Tata cara Pengisian:</h5>
                            <ol>
                                <li>Silakan upload file photo anda, dengan format nama_anda.jpg dan ukuran file < 1 MB</li>
                                <li>Tabel bisa diisi menggunakan format string huruf dan angka.</li>
                                <li>Khusus Tahun lulus harap disi dalam format 4 gigit angka (contoh: 1980)</li>
                                <li>Untuk informasi kelas silakan isi sesuai dengan format kelas pada angkatan masing masing
                                    (contoh: Fisika, Bio, Bahasa, IPA, Sosial, A1, A2, A3)</li>
                                <li>Silahkan isi "<b>-</b>" jika ingin mengosongkan field</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class="mt-5">
                @if ($alumni->approved == 0)
                    <div class="col-12">
                        <div class="alert alert-info text-center" role="alert">
                            Data anda sedang dalam proses verifikasi
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-info text-center" role="alert">
                            Anda sudah terdaftar sebagai alumni
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        function onChangeSelect(id, name) {
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
                                <button class="btn float-end delete" type="button"><span class="material-symbols-outlined ">
                                            delete
                                        </span></button>
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

        // delete pendidikan
        $(document).on('click', '.delete', function() {
            $(this).parent().remove();
        });
    </script>
@endpush
