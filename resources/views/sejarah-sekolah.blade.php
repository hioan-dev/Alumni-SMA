@extends('layouts.app')

@section('title', 'Tentang Kami')

@push('styles')
    <style>
        .divider {
            width: 100%;
            height: 2px;
            background-color: #e4e4e4;
            position: relative
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 15%;
            background-color: #152d8f;

        }

        a {
            text-decoration: none;
            color: black;
        }

        .widget a {
            position: relative;
            padding-left: 1.5rem;
        }

        .widget a::before {
            position: absolute;
            content: "\e315";
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            font-family: "Material Symbols Outlined";
            font-size: 24px;
            color: var(--bs-blue);
            -webkit-transition: all 0.3s ease-out 0s;
            -moz-transition: all 0.3s ease-out 0s;
            -ms-transition: all 0.3s ease-out 0s;
            -o-transition: all 0.3s ease-out 0s;
            transition: all 0.3s ease-out 0s;
        }

        .widget a:hover::before {
            margin-left: 4px;
        }
    </style>
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container min-vh-100" style="margin-top: 120px">
        {{ Breadcrumbs::render('sejarah-sekolah') }}

        <div class="row">
            <div class="col-md-8">
                <div class="mt-md-5 p-3 p-md-0 ">
                    <div class="">
                        <h1 class="fw-bold">Sejarah SMAN 1 Tebing Tinggi</h1>
                        <div class="mt-3 fs-6">
                            <p class="text-justify text-md-start">
                                SMA Negeri 1 Tebing tinggi berdiri sejak tahun 1959, dan merupakan salah satu Sekolah
                                menengah atas
                                terbaik di Kota Tebing Tinggi. Prestasi itu antara lain dapat dilihat dari tingginya
                                persentase
                                siswa
                                SMAN 1 Tebing Tinggi, yang masuk ke perguruan tinggi negeri. Sejak tahun 2000, lebih 60%
                                lulusan
                                SMAN 1
                                Tebing Tinggi Berhasil menembus Seleksi Penerimaan Mahasiswa Baru (SPMB) di berbagai
                                Universitas
                                negeri.
                                Kemampuan Para lulusan menembus perguruan tinggi negeri (PTN), juga didukung oleh kenyataan
                                tingginya
                                rata-rata nilai pelajaran yang diraih siswa . Pada tahun pelajaran 2005-2006, dengan jumlah
                                siswa
                                yang
                                lulus sebanyak 65%, nilai rata-rata mata pelajaran mereka masih 7,5. Tetapi pada tahun
                                pelajaran
                                2006-2007, menjadi meningkat 73% dengan jumlah siswa yang lulus sebanyak 230 orang. Semua
                                prestasi
                                itu
                                tidak hanya menakjubkan. Tetapi juga menguatkan legenda SMA Negeri 1 Tebing Tinggi sebagai
                                sebuah
                                SMA
                                berprestasi. Sebab citra sebagai sekolah berprestasi, memang sudah melekat sejak lama pada
                                sekolah
                                yang
                                beralamat di Jalan Kom Laut Yos Sudarso Tebing Tinggi. SMA Negeri 1 Tebing Tinggi ini telah
                                mengalami 7
                                (tujuh) kali pergantian Kepala Sekolah sejak didirikannya, adapun nama-nama pimpinan dari
                                Kepala
                                Sekolah
                                ini antara lain :
                            </p>
                            <ol>
                                <li>Tahun 1959 – 1979 dipimpin oleh Lem Sitepu</li>
                                <li>Tahun 1979 – 1983 dipimpin oleh Tampil Simanjuntak</li>
                                <li>Tahun 1983 – 1993 dipimpin oleh Ardin Togatorop</li>
                                <li>Tahun 1983 – 1993 dipimpin oleh Ardin Togatorop</li>
                                <li>Tahun 2000 – 2009 dipimpin oleh Drs. Bahtera Sembiring, M.Pd</li>
                                <li>Tahun 2009 – 2015 dipimpin oleh Mhd. Syarif, M.Si, M.Pd</li>
                                <li>Tahun 2015 – 2018 dipimpin oleh Drs. Sariono
                                </li>
                                <li>Tahun 2018 – 2022 dipimpin oleh Drs. Adil Shadli, M.Si</li>
                                <li class="fw-bold">Tahun 2022 sampai dengan sekarang dipimpin oleh Humisar Sigalingging,
                                    S.Pd
                                </li>
                            </ol>
                            <p>Pada masa kepemimpinan Drs. Bahtera Sembiring, M.Pd, SMA Negeri 1 Tebing Tinggi pada
                                tahun 2008
                                dihunjuk oleh Direktorat jendral pendidikan Menengah Atas sebagai sekolah pertama yang
                                menyandang
                                R-SBI (Rintisan Sekolah Bertaraf Internasional) dan hingga sekarang ketika jabatan kepala
                                sekolah
                                berganti dengan Mhd. Syarif, M.Si, M.Pd. Lulusan tahun 2010-2011, salah satu siswa SMA
                                Negeri 1
                                Tebing Tinggi ada yang melanjutkan ke Perguruan TInggi diluar Negeri yaitu di jepang, hal
                                ini
                                merupakan salah satu kebanggan bagi pihak sekolah, agar untuk tahun-tahun berikutnya SMA
                                Negeri 1
                                Tebing Tinggi dapat melahirkan lebih banyak lagi siswa-siswa yang berprestasi.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-md-5">
                <div>
                    <h3>Profile</h3>
                    <div class="divider"></div>
                </div>
                <div class="row flex-column gy-2 mt-3 fs-5 widget">
                    <div class="col-12">
                        <a href="{{ route('visimisi-sekolah') }}">Visi & Misi</a>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('sejarah-sekolah') }}">Sejarah</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
@endsection
