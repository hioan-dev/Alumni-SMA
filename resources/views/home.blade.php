@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection


@section('content')
    <div>
        <div class="hero" style="background-image: url('{{ asset('images/gedung.jpg') }}')">
            <div class="hero__overlay"></div>
            <div
                class="w-100 h-100 text-white position-relative z-3 d-flex flex-column justify-content-center align-items-center ">
                <h2 class="fs-2">SELAMAT DATANG DI WEBSITE KAMI</h2>
                <h2 class="">IKATAN KELUARGA ALUMNI</h2>
                <h2 class="">SMA 1 TEBING TINGGI</h2>
            </div>
        </div>
        <div class="container">
            <div class="text-center mt-5 ">
                <h4 class="fw-bold fs-5 text-primary">KATA SAMBUTAN</h4>
                <h4 class="fw-bold  fs-2">KETUA UMUM ALUMNI</h4>
            </div>
            <div class="row  mt-5">
                <div class="col-lg-4 col-md-6 ">
                    <div class="img-container">
                        <img class=""
                            src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                            alt="Ketua Umum">
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex flex-column justify-content-between h-100 ">
                        <p class="mt-3 mt-md-0">Assalam mu’alaikum wr. wb. Puji syukur rahmat dan karunia Allah SWT
                            sehingga kami
                            dapat
                            menerbitkan
                            website resmi Alumni SMA Negeri 4 Banjarmasin sebagai sarana informasi dan komunikasi alumni.
                            Website ini merupakan sarana bagi para alumni SMA Negeri 4 Banjarmasin untuk saling
                            berkomunikasi
                            dan mendapatkan informasi-informasi mengenai berita dan agenda tentang alumni. Website ini juga
                            dapat digunakan oleh pihak masyarakat umum untuk mendapat informasi di website ini. </p>
                        <h4 class="fw-semibold">Johnson Saragih</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 bg-gray mt-5 py-4">
            <div class="container">
                <h3 class="text-center fw-bold">PROFILE PENGURUS</h3>
                <div class="w-75 mx-auto">
                    <div class="row gy-5 gx-5 mt-1">
                        <div class="col-lg-4 col-md-6">
                            <div class="profile-img-container">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                    alt="">
                            </div>
                            <div class="text-center mt-3">
                                <h4 class="fw-bold">Alexander Sutiyono</h4>
                                <p>Ketua Umum</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="profile-img-container">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                    alt="">
                            </div>
                            <div class="text-center mt-3">
                                <h4 class="fw-bold">Alexander Sutiyono</h4>
                                <p>Ketua Umum</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="profile-img-container">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                    alt="">
                            </div>
                            <div class="text-center mt-3">
                                <h4 class="fw-bold">Alexander Sutiyono</h4>
                                <p>Ketua Umum</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5">
                <div class="d-flex justify-content-between">
                    <h3 class="fw-bold text-center">Berita Terbaru</h3>
                    <button class="btn btn-outline-primary">See all</button>
                </div>
            </div>
            <div class="row gy-3 gx-3 mt-2">
                <div class="col-md-4">
                    <div class="card shadow-sm" style="height:400px">
                        <div class="card-news__img">
                            <img src="https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                alt="">
                        </div>
                        <div class="card-body">
                            <div class="fs-6 mb-2 text-muted d-flex align-content-center">
                                <div class="d-flex align-content-center">
                                    <span class="material-symbols-outlined fs-6 mr-3">
                                        calendar_month
                                    </span>
                                    <div class="px-1" style="font-size:12px;">08 Maret 2021</div>
                                </div>
                                <div class="d-flex align-content-center">
                                    <span class="material-symbols-outlined fs-5 mr-3">
                                        folder
                                    </span>
                                    <a href="#" class="px-1 text-decoration-none" style="font-size:12px;">Event</a>
                                </div>
                            </div>
                            <h5 class="card-title fw-semibold">Penyelengaraan Faksinasi Alumni</h5>
                            <p class="card-text clamp-2">Some quick example text to build on the card title and make up the
                                bulk of
                                the card's content.</p>
                            <a href="#" class="card-link text-decoration-none d-flex align-items-center">Read More
                                <span class="material-symbols-outlined px-1 fs-5">
                                    east
                                </span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
