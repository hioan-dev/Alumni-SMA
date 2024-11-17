@extends('layouts.app')

@section('title', 'Mars Alumni')

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
        {{ Breadcrumbs::render('mars') }}

        <div class="row">
            <div class="col-md-12">
                <div class="mt-md-5 p-3 p-md-0 ">
                    <div class="">
                        <h1 class="fw-bold">{{ $data->title ?? '' }}</h1>
                        <div class="mt-3">
                            <p>{!! $data->lirik ?? '' !!}</p>
                            @empty($data)
                                <div class="alert alert-info text-center" role="alert">
                                    Belum Ada Mars Alumni
                                </div>
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
