@extends('layouts.app')

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

        .category {
            text-decoration: none;
            color: #969494;
            border: 1px solid #ccc;
            padding: 0.3rem 2rem;
            border-radius: 5px;
        }

        .category:hover {
            border-color: #152d8f
        }
    </style>
@endpush

@section('navbar')
    @include('partials.__navbar')
@endsection

@section('content')
    <div class="container" style="margin-top: 120px">
        {{ Breadcrumbs::render('berita') }}

        <div class="row">
            <div class="col-md-8">
                <div class="row gy-3 gx-3 mt-2">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="col-md-4">
                            <div class="card shadow-sm" style="height:400px">
                                <div class="card-news__img">
                                    <a href="#">
                                        <img src="https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                            alt="">
                                    </a>
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
                                            <a href="#" class="px-1 text-decoration-none"
                                                style="font-size:12px;">Event</a>
                                        </div>
                                    </div>
                                    <h5 class="card-title fw-semibold clamp-2">Penyelengaraan Faksinasi Alumni asdasd
                                        asdasda
                                        asdasd</h5>
                                    <p class="card-text clamp-2">Some quick example text to build on the card title and make
                                        up
                                        the
                                        bulk of
                                        the card's content.</p>
                                    <a href="#" class="card-link text-decoration-none d-flex align-items-center">Read
                                        More
                                        <span class="material-symbols-outlined px-1 fs-5">
                                            east
                                        </span></a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <h5 class="fw-bold">Kategori</h5>
                    <div class="divider"></div>
                </div>
                <div class="row  mt-2 gy-3 gx-2">
                    <div class="col-auto">
                        <a href="#" class="category">Event</a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="category">Technology</a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="category">Writing</a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="category">Job Information</a>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="category">Friends</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
