@extends('layouts.app')

@push('styles')
    <style>
        .hero {
            background-image: url("{{asset('images/gedung.jpg')}}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative
        }

        .hero__overlay {
            position: absolute;
            z-index: 1;
            background-color: rgba(14, 107, 168, 0.71);
            height: 100%;
            width: 100%;
        }
    </style>
@endpush

@section('content')
<div class="hero">
   <div class="hero__overlay"></div>
</div>
@endsection
