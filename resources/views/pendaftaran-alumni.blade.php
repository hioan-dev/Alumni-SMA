@extends('layouts.app')

@push('styles')
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

        <div class="row mt-5">
            <h3 class="text-center fw-semibold">Pendaftaran Alumni</h3>
            <div class="divider"></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row mt-4">
                    <div class="">
                        <h5 class="fw-semibold">Terima Kasih atas kesediaan anda untuk mengisi formulir data alumni ini.
                            Silakan
                            isi
                            data anda sesuai
                            dengan form yang tersedia dan mohon baca petunjuk pengisian sebelumnya. </h5>
                        <ol>
                            <li>Semua field harus diisi dan tidak boleh kosong untuk menghindari error saat penyimpanan dan
                                pencarian.</li>
                            <li>Mohon lakukan re-size ukuran foto yg akan di unggah dgn ukuran terkecil (silakan crop
                                close-up
                                terlebih dahulu), untuk menghindari waktu upload/load yg lama. <b>(rekomendasi ukuran foto
                                    max.
                                    300×300
                                    pixel) </b> </li>
                            <li>Data tdk bisa langsung lve dalam real-time, Admin akan melakukan pratinjau data anda sebelum
                                ditampilkan, <b> SLA maks. 1×24 jam </b> setelah anda mengisi data akan masuk dalam database
                                utama
                                untuk
                                fitur pencarian. </li>
                            <li>Apabila dilakukan input ulang dengan nama yang sama (multiple input data), maka submitted
                                data
                                sebelumnya akan di hapus dan dianggap overwrite oleh data terbaru.</li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="">

                        <h5 class="fw-semibold">Pernyataan pengurus atas pengumpulan dan penggunaan data alumni.</h5>
                        <ol>
                            <li>Seluruh data input alumuni (data alumni) ini hanya akan digunakan untuk aktifitas dan
                                lingkup
                                terbatas yang berkaitan dengan alumni SMA 1 TEBING TINGGI</li>
                            <li>Penggunaan atau pengolahan data alumni termasuk mencakup didalamnya adalah untuk kepentingan
                                riset
                                dan analisa dan/atau sebagai sumber referensi kontak untuk pusat database alumni.</li>
                            <li>Untuk kepentingan riset dan analisa internal alumni, semua data alumni yg dipakai tdak akan
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
                <div class=" mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                    <label for="tahun-lulus" class="form-label">Tahun Lulus</label>
                    <input type="text" class="form-control" id="tahun-lulus">
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas">
                </div>
                <div class="mb-3">
                    <label for="tmpt_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tmpt_lahir">
                </div>
                <div class="mb-3">
                    <label for="tgl-lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl-lahir">
                </div>
                <div class="mb-3">
                    <label for="teman" class="form-label">Nama Teman Sebangku</label>
                    <input type="text" class="form-control" id="teman">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="jenkel" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Jenis kelamin select">
                        <option selected value="male">Laki-Laki</option>
                        <option value="female">Perempuan</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="baju" class="form-label">Ukuran Baju</label>
                    <select class="form-select" aria-label="Ukuran Baju select">
                        <option selected value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        <option value="XXXL">XXXL</option>
                        <option value="4XL">4XL</option>
                        <option value="5XL">5XL</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                    <select class="form-select" aria-label="Pendidikan select">
                        <option selected value="male">SMA</option>
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
                    <input type="text" class="form-control" id="universitas">
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Program Studi / Jurusan</label>
                    <input type="text" class="form-control" id="jurusan">
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan">
                </div>
                <div class="mb-3">
                    <label for="hp" class="form-label">No HP / WA</label>
                    <input type="text" class="form-control" id="hp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="float-end">
                    <button type="button" class="btn btn-primary">Sumbit</button>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <h5 class="fw-semibold">Tata cara Pengisian:</h5>
                    <ol>
                        <li>Silakan upload file photo anda, dengan format nama_anda.jpg dan ukuran file < 1 MB</li>
                        <li>Tabel bisa diisi menggunakan format string huruf dan angka.</li>
                        <li>Khusus Tahun lulus harap disi dalam format 4 gigit angka (contoh: 1980)</li>
                        <li>Untuk informasi kelas silakan isi sesuai dengan format kelas pada angkatan masing masing
                            (contoh: Fisika, Bio, Bahasa, IPA, Sosial, A1, A2, A3)</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
