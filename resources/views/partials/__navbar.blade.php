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
                                <div class="d-inline-block d-lg-none ml-md-0 float-end py-3"><a href="#"
                                        class="site-menu-toggle js-menu-toggle text-white"><span
                                            class="material-symbols-outlined h3">
                                            menu
                                        </span></a></div>

                                <ul class="site-menu main-menu js-clone-nav d-none d-lg-flex justify-content-end">
                                    <li><a href="#home-section" class="nav-link">Tentang Kami</a></li>
                                    <li><a href="#classes-section" class="nav-link">Program</a></li>
                                    <li class="has-children">
                                        <a href="#" class="nav-link">Galeri</a>
                                        <ul class="dropdown arrow-top">
                                            <li><a href="#" class="nav-link">Foto</a></li>
                                            <li><a href="#" class="nav-link">Video</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-children">
                                        <a href="#" class="nav-link">Iuran</a>
                                        <ul class="dropdown arrow-top">
                                            <li><a href="#" class="nav-link">Pembayaran Iuran</a></li>
                                            <li><a href="#" class="nav-link">Daftar Iuran</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#" class="nav-link">Alumni</a>
                                        <ul class="dropdown arrow-top">
                                            <li><a href="{{ route('pendaftaran-alumni') }}" class="nav-link">Pendaftaran
                                                    Alumni</a></li>
                                            <li><a href="{{ route('data-alumni') }}" class="nav-link">Data Alumni</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#about-section" class="nav-link">Info Terbaru</a></li>
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

    <script src="{{ asset('js/navbar/main.js') }}"></script>
@endpush
