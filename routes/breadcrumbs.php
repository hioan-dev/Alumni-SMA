<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Blog
Breadcrumbs::for('data-alumni', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Data Alumni', route('data-alumni'));
});

// Home
Breadcrumbs::for('berita', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Berita', route('berita'));
});

Breadcrumbs::for('kegiatan', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kegiatan', route('kegiatan'));
});

Breadcrumbs::for('kategori-berita', function (BreadcrumbTrail $trail, $categoryName) {
    $trail->parent('home');
    $trail->push('Berita', route('berita'));
    $trail->push($categoryName, route('kategori-berita', $categoryName));
});

Breadcrumbs::for('detail-berita', function (BreadcrumbTrail $trail, $news) {
    $trail->parent('home');
    $trail->push('Berita', route('berita'));
    $trail->push($news->title, route('detail-berita', $news->slug));
});

Breadcrumbs::for('detail-kegiatan', function (BreadcrumbTrail $trail, $kegiatan) {
    $trail->parent('home');
    $trail->push('Kegiatan', route('kegiatan'));
    $trail->push($kegiatan->title, route('detail-kegiatan', $kegiatan->slug));
});


Breadcrumbs::for('iuran', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Iuran', route('iuran'));
});

Breadcrumbs::for('pembayaran-iuran', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Pembayaran Iuran', route('pembayaran-iuran'));
});

Breadcrumbs::for('pendaftaran-ketua', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Pendaftaran Calon Ketua Alumni', route('pendaftaran-ketua'));
});

Breadcrumbs::for('visimisi-sekolah', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Visi & Misi SMAN 1 Tebing Tinggi', route('visimisi-sekolah'));
});

Breadcrumbs::for('sejarah-sekolah', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Sejarah SMAN 1 Tebing Tinggi', route('sejarah-sekolah'));
});

Breadcrumbs::for('anggaran-rumah-tangga', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Anggaran Rumah Tangga IKA SMANSA', route('anggaran-rumah-tangga'));
});

Breadcrumbs::for('pendaftaran-alumni', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Pendaftaran Alumni', route('pendaftaran-alumni'));
});

Breadcrumbs::for('galeri-foto', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Galeri Foto', route('galeri-foto'));
});
