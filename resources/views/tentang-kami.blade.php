@extends('layouts.app')

@section('title', 'Tentang Kami')

@push('styles')
    <style>
        .student-img {
            height: 200px;
            width: 200px;
            margin: 0 auto;
        }

        .student-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
        }
    </style>
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container" style="margin-top: 120px">
        {{ Breadcrumbs::render('tentang-kami') }}

        <div class="mt-5">
            <div class="mt-5">
                <h1>Visi & Misi</h1>
                <div class="mt-3">
                    <h3>Visi</h3>
                    <p class="fs-5">
                        Terwujudnya Insan SMA Negeri 1 Tebing Tinggi yang Cerdas, Berakhlak Mulia, Berkarakter, Kolaboratif,
                        Kompetitif, Mandiri dan Peduli lingkungan
                    </p>
                    <h3>Misi</h3>
                    <ol class="fs-5">
                        <li>Membentuk Peserta didik yang beriman dan bertawa kepada Tuhan Yang Maha Esa, Serta Berakhlak dan
                            Berbudi Pekerti Luhur</li>
                        <li>Melaksanakan Pembelajaran dan bimbingan guna menanamkan kepedulian terhadap lingkungan</li>
                        <li>Meningkatkan proses belajar & mengajar secara optimal guna membangkitkan seluruh potensi
                            kecerdasan
                            serta bakat siswa</li>
                        <li>Memberikan kemampuan yang memiliki daya saing secara global disemua bidang</li>
                        <li>Meningkatkan dan mengembangkan kultur sekolah berwawasan lingkungan sehat</li>
                        <li>Menimbulkan rasa kepedulian terhadap lingkungan hidup dengan memelihara lingkungan sekolah yang
                            bersih, mengurangi dan mengolah sampah menjadi bermanfaat</li>
                    </ol>
                </div>
            </div>
            <div class="mt-5">
                <h1>Sejarah</h1>
                <div class="mt-3 fs-5">
                    <p>
                        SMA Negeri 1 Tebing tinggi berdiri sejak tahun 1959, dan merupakan salah satu Sekolah menengah atas
                        terbaik di Kota Tebing Tinggi. Prestasi itu antara lain dapat dilihat dari tingginya persentase
                        siswa
                        SMAN 1 Tebing Tinggi, yang masuk ke perguruan tinggi negeri. Sejak tahun 2000, lebih 60% lulusan
                        SMAN 1
                        Tebing Tinggi Berhasil menembus Seleksi Penerimaan Mahasiswa Baru (SPMB) di berbagai Universitas
                        negeri.
                        Kemampuan Para lulusan menembus perguruan tinggi negeri (PTN), juga didukung oleh kenyataan
                        tingginya
                        rata-rata nilai pelajaran yang diraih siswa . Pada tahun pelajaran 2005-2006, dengan jumlah siswa
                        yang
                        lulus sebanyak 65%, nilai rata-rata mata pelajaran mereka masih 7,5. Tetapi pada tahun pelajaran
                        2006-2007, menjadi meningkat 73% dengan jumlah siswa yang lulus sebanyak 230 orang. Semua prestasi
                        itu
                        tidak hanya menakjubkan. Tetapi juga menguatkan legenda SMA Negeri 1 Tebing Tinggi sebagai sebuah
                        SMA
                        berprestasi. Sebab citra sebagai sekolah berprestasi, memang sudah melekat sejak lama pada sekolah
                        yang
                        beralamat di Jalan Kom Laut Yos Sudarso Tebing Tinggi. SMA Negeri 1 Tebing Tinggi ini telah
                        mengalami 7
                        (tujuh) kali pergantian Kepala Sekolah sejak didirikannya, adapun nama-nama pimpinan dari Kepala
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
                        <li class="fw-bold">Tahun 2022 sampai dengan sekarang dipimpin oleh Humisar Sigalingging, S.Pd
                        </li>
                    </ol>
                    <p>Pada masa kepemimpinan Drs. Bahtera Sembiring, M.Pd, SMA Negeri 1 Tebing Tinggi pada
                        tahun 2008
                        dihunjuk oleh Direktorat jendral pendidikan Menengah Atas sebagai sekolah pertama yang menyandang
                        R-SBI (Rintisan Sekolah Bertaraf Internasional) dan hingga sekarang ketika jabatan kepala sekolah
                        berganti dengan Mhd. Syarif, M.Si, M.Pd. Lulusan tahun 2010-2011, salah satu siswa SMA Negeri 1
                        Tebing Tinggi ada yang melanjutkan ke Perguruan TInggi diluar Negeri yaitu di jepang, hal ini
                        merupakan salah satu kebanggan bagi pihak sekolah, agar untuk tahun-tahun berikutnya SMA Negeri 1
                        Tebing Tinggi dapat melahirkan lebih banyak lagi siswa-siswa yang berprestasi.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
