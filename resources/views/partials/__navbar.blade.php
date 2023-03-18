@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/navbar/style.css') }}">
@endpush

@section('navbar')
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="material-symbols-outlined js-menu-toggle">close</span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap {{ Request::is('/') ? '' : 'sticky-top' }}">
        <div class="site-navbar site-navbar-target js-sticky-header {{ Request::is('/') ? '' : 'bg-darkblue' }}">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-2">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo Alumni" class="logo">
                        </a>
                    </div>
                    <div class="col-10">
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
                                                    <li class="nav-link"><a href="{{ route('visimisi-sekolah') }}">Visi &
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
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#" class="nav-link">Galeri</a>
                                        <ul class="dropdown arrow-top">
                                            <li><a href="{{ route('galeri-foto') }}" class="nav-link">Foto</a></li>
                                            <li><a href="#" class="nav-link">Video</a></li>
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
                                            @if (Auth::check())
                                                <li><a href="{{ route('pendaftaran.index') }}" class="nav-link">Pendaftaran
                                                        Alumni</a></li>
                                            @else
                                                <li><a href="{{ route('pendaftaran-alumni') }}"
                                                        class="nav-link">Pendaftaran
                                                        Alumni</a></li>
                                            @endif
                                            <li><a href="{{ route('data-alumni') }}" class="nav-link">Data Alumni</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#" class="nav-link">Tentang Tebing Tinggi</a>
                                        <ul class="dropdown arrow-top">
                                            <li><a href="#" class="nav-link">Profil</a></li>
                                            <li><a href="#" class="nav-link">Program</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#classes-section" class="nav-link">Program</a></li>

                                    @if (Auth::check())
                                    <li class="has-children">
                                        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                            width="40" height="40" class="rounded-circle">
                                        <ul class="dropdown arrow-top">
                                            <li><a href="{{route('user-dashboard')}}" class="nav-link">My Dashboard</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                     
                                </ul>
                            </div>
                        </nav>
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
