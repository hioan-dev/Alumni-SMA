@extends('layouts.app')

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container" style="margin-top: 120px">
        {{ Breadcrumbs::render('pendaftaran-alumni') }}

        <div class="row mt-5">
            <h3 class="text-center fw-semibold">Pendaftaran Alumni</h3>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
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
                    <label for="tgl-lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl-lahir">
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
                    <label for="hp" class="form-label">No HP</label>
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
        </div>
    </div>
    </div>
@endsection
