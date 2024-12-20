@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/navbar/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush

@section('navbar')
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="material-symbols-outlined js-menu-toggle">close</span>
            </div>
        </div>
        <div class="site-mobile-menu-body">
            @if (Auth::check() && Auth::user()->is_admin == 0)
                <div class="site-menu_login">
                    <div class="dropdown">
                        <button class="profile " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                                alt="{{ Auth::user()->name }}" class="profile_img">
                            <span class="text-capitalize">{{ Auth::user()->name }}</span>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('user-dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="site-menu_login">
                    <a href="/login" class="btn btn-outline-primary rounded-0 btn-sm w-100 py-1 mt-5">Login</a>
                </div>
            @endif

        </div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap {{ Request::is('/') ? '' : 'sticky-top' }}">
        <div class="site-navbar site-navbar-target js-sticky-header {{ Request::is('/') ? '' : 'bg-darkblue' }}">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xxl-2 col-auto">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo Alumni" class="logo">
                        </a>
                    </div>
                    <div class="col-xxl-10 col-auto">
                        <div class="d-flex align-items-center justify-content-end ">
                            <nav class="site-navigation text-right" role="navigation">
                                <div class="container">
                                    <div class="d-inline-block d-xl-none ml-md-0 float-end py-3"><a href="#"
                                            class="site-menu-toggle js-menu-toggle text-white"><span
                                                class="material-symbols-outlined h3">
                                                menu
                                            </span></a></div>

                                    <ul class="site-menu main-menu js-clone-nav d-none d-xl-flex justify-content-end">
                                        <li class="has-children">
                                            <a href="#" class="nav-link">Tentang SMAN 1 Tebing Tinggi</a>
                                            <ul class="arrow-top sub-menu ">
                                                <li>
                                                    <p class="title">Tentang Sekolah</p>
                                                    <ul>
                                                        <li class="nav-link"><a href="{{ route('visimisi-sekolah') }}">Visi
                                                                &
                                                                Misi</a></li>
                                                        <li class="nav-link"><a
                                                                href="{{ route('sejarah-sekolah') }}">Sejarah</a></li>

                                                    </ul>
                                                </li>
                                                <li>
                                                    <p class="title">Tentang Alumni</p>
                                                    <ul class="">
                                                        <li class="nav-link"><a href="#">Visi & Misi</a></li>
                                                        <li class="nav-link"><a href="#">Struktur Organisasi</a></li>
                                                        <li class="nav-link"><a href="{{ route('mars-alumni') }}">Mars
                                                                Alumni</a></li>
                                                        <li class="nav-link"><a
                                                                href="{{ route('anggaran-rumah-tangga') }}">Anggaran Rumah
                                                                Tangga</a></li>
                                                    </ul>
                                                </li>
                                            </ul>

                                        </li>
                                        <li class="has-children">
                                            <a href="#" class="nav-link">Info Terbaru</a>
                                            <ul class="dropdown arrow-top">
                                                <li><a href="{{ route('berita') }}" class="nav-link">Berita</a></li>
                                                <li><a href="{{ route('kegiatan') }}" class="nav-link">Kegiatan</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-children">
                                            <a href="#" class="nav-link">Galeri</a>
                                            <ul class="dropdown arrow-top">
                                                <li><a href="{{ route('galeri-foto') }}" class="nav-link">Foto</a></li>
                                                <li><a href="{{ route('galeri-video') }}" class="nav-link">Video</a></li>
                                            </ul>
                                        </li>


                                        <li class="has-children">
                                            <a href="#" class="nav-link">Iuran</a>
                                            <ul class="dropdown arrow-top">
                                                <li><a href="{{ route('pembayaran-iuran') }}" class="nav-link">Pembayaran
                                                        Iuran</a></li>
                                                <li><a href="{{ route('iuran') }}" class="nav-link">Daftar Iuran</a></li>
                                            </ul>
                                        </li>

                                        <li class="has-children">
                                            <a href="#" class="nav-link">Alumni</a>
                                            <ul class="dropdown arrow-top">
                                                <li><a href="{{ route('pendaftaran-alumni.index') }}"
                                                        class="nav-link">Pendaftaran
                                                        Alumni</a></li>

                                                <li><a href="{{ route('data-alumni') }}" class="nav-link">Data Alumni</a>
                                                </li>
                                                <li><a href="{{ route('pendaftaran-ketua') }}"
                                                        class="nav-link">Pendaftaran
                                                        Calon Ketua Alumni</a>
                                                </li>
                                                <li><a href="{{ route('data-calon-ketua') }}" class="nav-link">Data Calon
                                                        Ketua Alumni</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                            <div class="ms-5 text-black d-none d-xl-flex">
                                @if (Auth::check() && Auth::user()->is_admin == 0)
                                    <div class="dropdown">
                                        <button class="profile " type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                                                alt="{{ Auth::user()->name }}" class="profile_img">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('user-dashboard') }}">Dashboard</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="btn btn-outline rounded-0 btn-sm px-4 py-1 btn-login">Login</a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/navbar/main.js') }}"></script>
@endpush
