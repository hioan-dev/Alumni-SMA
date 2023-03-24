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
                <h4 class="fw-bold  fs-2">KETUA REUNI AKBAR</h4>
            </div>
            <div class="row  mt-5">
                <div class="col-lg-4 col-md-6 ">
                    <div class="img-container">
                        <img class="" src="{{ asset('images/ketua-reuni.jpeg') }}" alt="Ketua Umum">
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex flex-column justify-content-between h-100 ">
                        <p class="mt-3 mt-md-0">Alumni Smansa Tebing Tinggi Hebat....,SMA 1 Tebing tinggi juga tetap hebat.
                            Alumni smansa menjaga silaturahmi yang erat dan Perduli Sekolahnya
                            Pertama sekali izinkan saya menyampaikan Selamat memasuki bulan suci Ramadhan 1444H untuk
                            seluruh SAHABAT yang menjalankannya.<br>
                            Pada kesempatan ini, Kami yang diamanahkan sebagai Panitia Reuni akbar melaporkan Rencana Reuni
                            Akbar kita. <br><br>
                            Dengan RidhoNya, Insya Allah, kita akan melaksanakan Reuni Akbar pada hari Selasa, tanggal 25
                            April 2023 di Sekolah kita, SMA Negeri 1 Tebing Tinggi yang kita cintai dan penuh kenangan.
                            Reuni Akbar rencananya akan diawali dengan kegiatan Munas pada tanggal 25 April 2023 di gedung
                            Hj. Sawiyah jln Sutomo Kota Tebing Tinggi jam 08.00 sd. 12.30 Wib. untuk Memilih Ketua Alumni
                            kita. <br><br>
                            Reuni akbar sendiri akan dilaksanakan mulai jam 10 pagi dengan acara pentas seni dan
                            silaturahmi. Pada Pukul 14.00 Wib kita akan menyerahkan Pokok-Pokok Pikiran Alumni kepada
                            Walikota Tebing Tinggi yang juga merupakan alumni SMA kita.
                            Acara diramaikan dengan kehadiran UMKM yang menyediakan panganan kenangan dengan harga murah
                            untuk kita santap bersama, juga souvenir hasil kreasi UMKM lokal.
                            Acara kita harapkan dapat berjalan dengan lancar dan penuh kehangatan dan direncanakan berakhir
                            pukul 18.00 Wib. Dengan semangat dan kerja keras kita bersama estimasi peserta reuni akbar akan
                            dihadiri sebanyak
                            1000 orang. <br><br>
                            Untuk Informasi terkait kegiatan reuni akbar dan munas termasuk Pendataan Alumni, peserta Munas
                            serta Pendaftaran Calon Ketua Alumni dapat diakses melalui portal alumni kita
                            dengan alamat <a href="https://ikasmansatebingtinggi.org/">ikasmansatebingtinggi.org</a>
                            Mari kita dukung Acara ini dengan Doa,Kehadiran kita dan juga dukungan Dana.
                            Semoga kita tetap diberi kesehatan untuk tetap bisa bersilaturahmi dan berjumpa sama-sama
                            mengenang masa-masa SMA kita, disekolah kita pada Acara Reuni Akbar ini. <br><br>

                            Demikian sepatah kata dari saya mewakili Panitia Reuni Akbar.Terima kasih
                        </p>
                        <h4 class="fw-semibold">Martua Sinurat, ST <br> (Alumni 92)</h4>
                    </div>
                </div>
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
                                <div class="card shadow-sm">
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
                                <div class="card shadow-sm">
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
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="countdown col-md-8 bg-primary text-white rounded-3 p-5 my-md-5">
                    <div>
                        <h2 class="fw-bold">Musyawarah Nasional</h2>
                        <p>Selasa, 25 April 2023</p>
                    </div>
                    <div class="mt-3 row justify-content-center gx-5 " id="countdown__timer">
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
                    "<h2 class='text-center'>Acara Berakhir</h2>";
            }
        }, 1000);
    </script>
@endpush
