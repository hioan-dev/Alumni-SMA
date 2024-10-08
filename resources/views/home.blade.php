@extends('layouts.app')

@section('title', 'Alumni SMAN 1 Tebing Tinggi')

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
                class="w-100 h-100 text-white position-relative z-3 d-flex flex-column justify-content-center align-items-center">
                <h2 class="fs-2">SELAMAT DATANG DI WEBSITE KAMI</h2>
                <h2 class="">IKATAN KELUARGA ALUMNI</h2>
                <h2 class="">SMA Negeri 1 TEBING TINGGI</h2>
                <img src="{{ asset('images/logo.png') }}" alt="Logo Alumni" class="hero_logo">
            </div>
            {{-- <div
                class="w-100 h-100 text-white position-relative z-3 d-flex flex-column justify-content-center align-items-center">
                <h2 class="fs-2">SELAMAT DATANG DI WEBSITE KAMI</h2>
                <h2 class="">IKATAN KELUARGA ALUMNI</h2>
                <h2 class="">SMA Negeri 1 TEBING TINGGI</h2>
            </div> --}}
        </div>
        <div class="container">
            <div class="text-center mt-5 ">
                <h4 class="fw-bold fs-5 text-primary">KATA SAMBUTAN</h4>
            </div>
            <div class="row  mt-5">
                @forelse ($sambutan as $sambutans)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="img-container">
                            <img class="" src="{{ asset('sambutan_image/' . $sambutans->banner) }}" alt="Ketua Umum">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="d-flex flex-column justify-content-between h-100 ">
                            {!! $sambutans->sambutan !!}
                        </div>
                    </div>
                @empty
                    <div class="alert alert-primary" role="alert">
                        Kata Sambutan ketua Alumni Belum Tersedia
                    </div>
                @endforelse
            </div>
        </div>
        {{-- <div class="w-100 bg-gray mt-5 py-4">
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
        </div> --}}


        <div class="mt-5">
            {{-- Kegiatan --}}
            @if ($kegiatan->count() > 0)
                <div class="container">
                    <div class="row mt-5">
                        <div class="d-flex justify-content-between">
                            <h3 class="fw-bold text-center">Kegiatan Terbaru</h3>
                            <a href="{{ route('berita') }}" class="btn btn-outline-primary">See all</a>
                        </div>
                    </div>
                    <div class="row gy-3 gx-3 mt-2">
                        @foreach ($kegiatan as $row)
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <div class="card-news__img">
                                        <a href="{{ route('detail-kegiatan', $row->slug) }}">
                                            <img src="{{ asset('storage/' . $row->thumbnail) }}" class="card-img-top"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="card-body h-auto">
                                        <div class="fs-6 mb-2 text-muted d-flex align-content-center">
                                            <div class="d-flex align-content-center">
                                                <span class="material-symbols-outlined fs-6 mr-3">
                                                    calendar_month
                                                </span>
                                                <div class="px-1" style="font-size:12px;">
                                                    {{ date('M j, Y', strtotime($row->created_at)) }}</div>
                                            </div>
                                            <div class="d-flex align-content-center">
                                                <p class="px-1 mb-2  rounded-1 text-capitalize {{ $row->informasi == 'akan datang' ? 'bg-warning' : 'bg-danger' }} text-white"
                                                    style="font-size:12px;">
                                                    {{ $row->informasi }}</p>
                                            </div>
                                        </div>

                                        <a href="{{ route('detail-kegiatan', $row->slug) }}"
                                            class="card-link text-decoration-none d-flex align-items-center">
                                            <h5 class="card-title fw-semibold clamp-2">{{ $row->title }}</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Berita --}}
            @if ($news->count() > 0)
                <div class="container">
                    <div class="row mt-5">
                        <div class="d-flex justify-content-between">
                            <h3 class="fw-bold text-center">Berita Terbaru</h3>
                            <a href="{{ route('berita') }}" class="btn btn-outline-primary">See all</a>
                        </div>
                    </div>
                    <div class="row gy-3 gx-3 mt-2">
                        @foreach ($news as $row)
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <a href="{{ route('detail-berita', $row->slug) }}" class="card-news__img">
                                        <img src="{{ asset('storage/' . $row->banner) }}" alt="">
                                    </a>
                                    <div class="card-body">
                                        <div class="fs-6 mb-2 text-muted d-flex align-content-center">
                                            <div class="d-flex align-content-center">
                                                <span class="material-symbols-outlined fs-6 mr-3">
                                                    calendar_month
                                                </span>
                                                <div class="px-1" style="font-size:12px;">
                                                    {{ date('M j, Y', strtotime($row->created_at)) }}</div>
                                            </div>
                                            <div class="d-flex align-content-center">
                                                <span class="material-symbols-outlined fs-5 mr-3">
                                                    folder
                                                </span>
                                                <a href="{{ route('kategori-berita', $row->kategori->slug) }}"
                                                    class="px-1 text-decoration-none"
                                                    style="font-size:12px;">{{ $row->kategori->nama_kategori }}</a>
                                            </div>
                                        </div>
                                        <a href="{{ route('detail-berita', $row->slug) }}"
                                            class="card-link text-decoration-none d-flex align-items-center">
                                            <h5 class="card-title fw-semibold clamp-2">{{ $row->title }}</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Berita Terkait --}}
            @if ($berita_terkait->count() > 0)
                <div class="container">
                    <div class="row mt-5">
                        <div class="d-flex justify-content-between">
                            <h3 class="fw-bold text-center">Berita Terkait</h3>
                            <a href="{{ route('berita-terkait') }}" class="btn btn-outline-primary">See all</a>
                        </div>
                    </div>
                    <div class="row gy-3 gx-3 mt-2">
                        @foreach ($berita_terkait as $row)
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <a href="{{ $row->url }}" target="_blank" class="card-news__img">
                                        <img src="{{ asset('storage/' . $row->banner) }}" alt="">
                                    </a>
                                    <div class="card-body">
                                        <div class="fs-6 mb-2 text-muted d-flex align-content-center">
                                            <div class="d-flex align-content-center">
                                                <span class="material-symbols-outlined fs-6 mr-3">
                                                    calendar_month
                                                </span>
                                                <div class="px-1" style="font-size:12px;">
                                                    {{ date('M j, Y', strtotime($row->created_at)) }}</div>
                                            </div>
                                        </div>
                                        <a href="{{ $row->url }}" target="_blank"
                                            class="card-link text-decoration-none d-flex align-items-center">
                                            <h5 class="card-title fw-semibold clamp-2">{{ $row->title }}</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="container mt-5" id="countdown__timer">
            <div class="row justify-content-center">
                <div class="countdown col-md-8 bg-primary text-white p-5 my-md-5">
                    <div>
                        <h2 class="fw-bold">Musyawarah Nasional</h2>
                        <p>Selasa, 25 April 2023</p>
                    </div>
                    <div class="mt-3 row justify-content-center gx-5 ">
                        <div class="col-auto text-center">
                            <h3 class="countdown__date" id="day">00</h3>
                            <p class="countdown__desc">Hari</p>
                        </div>
                        <div class="col-auto text-center">
                            <h3 class="countdown__date" id="hour">00</h3>
                            <p class="countdown__desc">Jam</p>
                        </div>
                        <div class="col-auto text-center">
                            <h3 class="countdown__date" id="minute">00</h3>
                            <p class="countdown__desc">Menit</p>
                        </div>
                        <div class="col-auto text-center">
                            <h3 class="countdown__date" id="second">00</h3>
                            <p class="countdown__desc">Detik</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container  mt-5">
            <h2 class="fw-bold text-primary">Langkah - Langkah Pendaftaran Alumni</h2>
            <div class="mt-1 mt-md-3 row g-5 p-3 p-md-0">
                <div class="col-md-4 ">
                    <div class="step">
                        <div class="step-num">1</div>
                        <h4 class="fw-bold">Daftar</h4>
                        <p class="fs-5 mt-3">
                            Silahkan <a href="{{ route('register') }}">Buat Akun</a> terlebih dahulu, jika sudah memiliki
                            akun
                            dapat langsung <a href="{{ route('login') }}">Login</a> menggunakan email dan password yang
                            sudah
                            didaftarkan sebelumnya.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step">
                        <div class="step-num">2</div>
                        <h4 class="fw-bold">Pendaftaran Alumni</h4>
                        <p class="fs-5 mt-3">
                            Masuk ke halaman <a href="{{ route('pendaftaran-alumni.index') }}">Pendaftaran Alumni</a> dan
                            isi
                            form
                            yang tersedia.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step">
                        <div class="step-num">3</div>
                        <h4 class="fw-bold">Submit</h4>
                        <p class="fs-5 mt-3">
                            Jika telah selesai mengisi data diri, silahkan klik tombol submit untuk mengirimkan data yang
                            telah
                            di
                            isi.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step">
                        <div class="step-num">5</div>
                        <h4 class="fw-bold">Verifikasi</h4>
                        <p class="fs-5 mt-3">
                            Silahkan tunggu data anda di verifikasi oleh admin.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        var countDownDate = new Date("Apr 25, 2023 00:56:00").getTime();
        const dayElement = document.getElementById('day');
        const hourElement = document.getElementById('hour');
        const minuteElement = document.getElementById('minute');
        const secondElement = document.getElementById('second');

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element
            dayElement.innerHTML = days;
            hourElement.innerHTML = hours;
            minuteElement.innerHTML = minutes;
            secondElement.innerHTML = seconds;


            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown__timer").innerHTML =
                    "";
            }
        }, 1000);
    </script>
@endpush
