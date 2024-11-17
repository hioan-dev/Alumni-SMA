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
        {{ Breadcrumbs::render('visimisi-sekolah') }}

        <div class="row">
            <div class="col-md-8">
                <div class="mt-md-5 p-3 p-md-0 ">
                    <div class="">
                        <h1 class="fw-bold">Visi & Misi</h1>
                        <div class="mt-3">
                            <h3>Visi</h3>
                            <p class="fs-6">
                                Terwujudnya Insan SMA Negeri 1 Tebing Tinggi yang Cerdas, Berakhlak Mulia, Berkarakter,
                                Kolaboratif,
                                Kompetitif, Mandiri dan Peduli lingkungan
                            </p>
                            <h3>Misi</h3>
                            <ol class="fs-6">
                                <li>Membentuk Peserta didik yang beriman dan bertawa kepada Tuhan Yang Maha Esa, Serta
                                    Berakhlak
                                    dan
                                    Berbudi Pekerti Luhur</li>
                                <li>Melaksanakan Pembelajaran dan bimbingan guna menanamkan kepedulian terhadap lingkungan
                                </li>
                                <li>Meningkatkan proses belajar & mengajar secara optimal guna membangkitkan seluruh potensi
                                    kecerdasan
                                    serta bakat siswa</li>
                                <li>Memberikan kemampuan yang memiliki daya saing secara global disemua bidang</li>
                                <li>Meningkatkan dan mengembangkan kultur sekolah berwawasan lingkungan sehat</li>
                                <li>Menimbulkan rasa kepedulian terhadap lingkungan hidup dengan memelihara lingkungan
                                    sekolah
                                    yang
                                    bersih, mengurangi dan mengolah sampah menjadi bermanfaat</li>
                            </ol>
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
@endsection
