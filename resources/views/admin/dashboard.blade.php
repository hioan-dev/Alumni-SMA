@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            @include('admin.partials._navbar')
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="row row-cols-1">
                        <div class="overflow-hidden d-slider1 ">
                            <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                                    <div class="card-body">
                                        <div class="progress-widget">
                                            <div id="circle-progress-01"
                                                class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                                data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                                </svg>
                                            </div>
                                            <div class="progress-detail">
                                                <p class="mb-2">Kategori Berita</p>
                                                <h4 class="counter">{{ $kategori->count() }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                                    <div class="card-body">
                                        <div class="progress-widget">
                                            <div id="circle-progress-02"
                                                class="text-center circle-progress-01 circle-progress circle-progress-info"
                                                data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                                </svg>
                                            </div>
                                            <div class="progress-detail">
                                                <p class="mb-2">Berita</p>
                                                <h4 class="counter">{{ $berita->count() }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                                    <div class="card-body">
                                        <div class="progress-widget">
                                            <div id="circle-progress-03"
                                                class="text-center circle-progress-01 circle-progress circle-progress-info"
                                                data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                                </svg>
                                            </div>
                                            <div class="progress-detail">
                                                <p class="mb-2">Alumni</p>
                                                <h4 class="counter">{{ $alumni->count() }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="swiper-button swiper-button-next"></div>
                            <div class="swiper-button swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="700">
                <div class="row">
                    <div class="col-md-6">
                        <div id="alumniBarChart"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="alumniLineChart"></div>
                    </div>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="700">
                <div style="width: 600px; height: 700px; margin: auto;">
                    <div id="alumniDonutChart"></div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Bar Chart Data
                    var years = @json(array_keys($alumniByYear->toArray()));
                    var alumniCounts = @json(array_values($alumniByYear->toArray()));

                    // Bar Chart Configuration
                    var optionsBar = {
                        series: [{
                            name: 'Jumlah Alumni',
                            data: alumniCounts
                        }],
                        chart: {
                            height: 350,
                            type: 'bar'
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: false
                            }
                        },
                        xaxis: {
                            categories: years
                        },
                        title: {
                            text: 'Jumlah Alumni per Tahun'
                        }
                    };

                    var barChart = new ApexCharts(document.querySelector("#alumniBarChart"), optionsBar);
                    barChart.render();

                    // Line Chart Configuration
                    var optionsLine = {
                        series: [{
                            name: 'Pertumbuhan Alumni',
                            data: alumniCounts
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth'
                        },
                        title: {
                            text: 'Pertumbuhan Alumni per Tahun',
                            align: 'left'
                        },
                        xaxis: {
                            categories: years,
                            title: {
                                text: 'Tahun'
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Jumlah Alumni'
                            }
                        }
                    };

                    var lineChart = new ApexCharts(document.querySelector("#alumniLineChart"), optionsLine);
                    lineChart.render();

                    // Donut Chart Data
                    var cities = @json(array_keys($alumniByCity->toArray()));
                    var alumniCountsByCity = @json(array_values($alumniByCity->toArray()));

                    // Donut Chart Configuration
                    var optionsDonut = {
                        series: alumniCountsByCity,
                        chart: {
                            type: 'donut',
                            height: 350
                        },
                        labels: cities,
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 300
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                        title: {
                            text: 'Jumlah Alumni Berdasarkan Kota',
                            align: 'left'
                        }
                    };

                    var donutChart = new ApexCharts(document.querySelector("#alumniDonutChart"), optionsDonut);
                    donutChart.render();
                });
            </script>
        </div>

        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <div class="right-panel">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> SMA 1 Tebing Tinggi
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>
@endsection
