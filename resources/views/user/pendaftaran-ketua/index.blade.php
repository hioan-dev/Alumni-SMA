@extends('layouts.user')

@section('title', 'Pendafataran Ketua')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.css"
        integrity="sha512-tbjZFdjHyHckTfeqkgVFcQ3GJWVfdsNYFvl+rEWmofjj9JpWaohlZgq0Vb6Hav5rqIL019LFpLsE+sTNSfNVXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            @include('user.partials.__navbar')
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info text-center" role="alert">
                        @if ($calon_ketua->approved == 1)
                            <div class="fs-5">Anda telah terdaftar sebagai calon ketua alumni</div>
                        @else
                            <div class="fs-5">Pendaftaran anda sedang dalam proses verifikasi.</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Pas Foto</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="profile-img-edit position-relative">
                                    <div class="baguettebox"> <a href="{{ asset('storage/' . $calon_ketua->pas_foto) }}"
                                            class="cursor-zoom lightbox"> <img class="form-control" width="100"
                                                height="250" src="{{ asset('storage/' . $calon_ketua->pas_foto) }}"
                                                alt="profile-pic"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">KTP</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="profile-img-edit position-relative">
                                    <div class="baguettebox"> <a href="{{ asset('storage/' . $calon_ketua->foto_ktp) }}"
                                            class="cursor-zoom lightbox"> <img class="form-control" width="100"
                                                height="250" src="{{ asset('storage/' . $calon_ketua->foto_ktp) }}"
                                                alt="profile-pic"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Ijazah</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="profile-img-edit position-relative">
                                    <div class="baguettebox"> <a href="{{ asset('storage/' . $calon_ketua->ijazah) }}"
                                            class="cursor-zoom lightbox"><img class="form-control" width="100"
                                                height="250" src="{{ asset('storage/' . $calon_ketua->ijazah) }}"
                                                alt="profile-pic"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Diri</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="fname">Nama Lengkap</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $calon_ketua->nama_lengkap }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="lname">NIK</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $calon_ketua->nik }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="lname">No Ijazah</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $calon_ketua->no_ijazah }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="add1">Alamat</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $calon_ketua->alamat }}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="add2">Pekerjaan</label>
                                        <label type="text"
                                            class="form-control text-black">{{ $calon_ketua->pekerjaan }}</label>
                                    </div>
                                    <hr>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="cname">Visi & Misi</label>
                                        <label type="text"
                                            class="form-control text-black">{!! $calon_ketua->visi_misi !!}</label>
                                    </div>
                                    <hr>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="cname">Rencana Program</label>
                                        <label type="text"
                                            class="form-control text-black">{!! $calon_ketua->rencana_program !!}</label>
                                    </div>
                                </div>
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

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.9.0/baguetteBox.min.js"
        integrity="sha512-+8LoWbC6Y9Vy85wapJUYlRvabpzAIGhgiL6vZWNHn0F8EFJ43a1BCSzXo7b7OeY6bczJ3Q+ifRweZpW1iPAARg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        baguetteBox.run('.baguettebox');
    </script>
@endpush
