@extends('layouts.admin')

@section('title', 'Mars Alumni')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@endpush
@section('content')
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            @include('admin.partials._navbar')
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Mars Alumni</h4>
                            </div>
                            <div class="d-flex gap-2">
                                @if ($data == null)
                                    <a href="{{ route('mars.create') }}" class="btn btn-primary btn-sm gap-2"><i
                                            class="bi bi-plus me-2"></i> Tambah</a>
                                @endif
                                @if (isset($data))
                                    <a href="{{ route('mars.edit', $data->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('mars.destroy', $data->id) }}" method="post"
                                        style="display: inline;">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                @endif

                            </div>
                        </div>
                        <div class="card-body">
                            <h1>{{ $data->title ?? '' }}</h1>
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
