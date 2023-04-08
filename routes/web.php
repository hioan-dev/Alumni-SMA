<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\Admin\PendaftarController;
use App\Http\Controllers\Admin\TabelAlumniController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AnggotaMunasController;
use App\Http\Controllers\Admin\PendaftarMunasController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\Admin\IuranController;
use App\Http\Controllers\CalonKetuaController;
use App\Http\Controllers\VidioController;



/*
|--------------------------------------------------------------------------
| Web Routes Halomoan Nababan / Richardo Ehbet
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/data-alumni', [FrontendController::class, 'alumni'])->name('data-alumni');
Route::get('/data-calon-ketua', [FrontendController::class, 'calonKetua'])->name('data-calon-ketua');
Route::get('/info-berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/info-berita/{slug}', [FrontendController::class, 'detail_berita'])->name('detail-berita');
Route::get('/info-kegiatan', [FrontendController::class, 'kegiatan'])->name('kegiatan');
Route::get('/info-kegiatan/{slug}', [FrontendController::class, 'detail_kegiatan'])->name('detail-kegiatan');
Route::get('/kategori/{slug}', [FrontendController::class, 'category'])->name('kategori-berita');
Route::get('/iuran', [FrontendController::class, 'iuran'])->name('iuran');

// Pembayaran Iuran by User
Route::get('/pembayaran-iuran', [FrontendController::class, 'pembayaran'])->name('pembayaran-iuran');
Route::post('/pembayaran-iuran-store', [FrontendController::class, 'storei'])->name('pembayaran-iuran-store');

Route::get('/tentang-sekolah/visi-misi', [FrontendController::class, 'visimisi_sekolah'])->name('visimisi-sekolah');
Route::get('/tentang-sekolah/sejarah', [FrontendController::class, 'sejarah_sekolah'])->name('sejarah-sekolah');
Route::get('/galeri-foto', [FrontendController::class, 'galeri_foto'])->name('galeri-foto');
Route::get('/galeri-video', [FrontendController::class, 'galeri_video'])->name('galeri-video');
Route::view('tentang-alumni/anggaran-rumah-tangga', 'art-alumni')->name('anggaran-rumah-tangga');

// Pendaftaran Calon Ketua Alumni
Route::get('pendaftaran-calon-ketua-alumni', [FrontendController::class, 'pendaftaran_ketua'])->name('pendaftaran-ketua');
Route::post('/pendaftaran-calon-ketua-alumni', [FrontendController::class, 'store'])->name('pendaftaran-ketua-store');



// Pendaftaran Alumni Before Login
Route::get('/pendaftaran-alumni', function () {
    return view('pendaftaran-alumni');
})->name('pendaftaran-alumni');

Route::middleware(['auth'])->group(function () {
    //Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard')->middleware('EnsureUserRole:admin');

    // Calon Ketua
    Route::resource('calon-ketua', CalonKetuaController::class)->middleware('EnsureUserRole:admin');
    Route::post('/calon-ketua-approve', [CalonKetuaController::class, 'approval'])->name('calon-ketua-approve')->middleware('EnsureUserRole:admin');

    // Kategori Berita
    Route::resource('kategori-berita', KategoriBeritaController::class)->middleware('EnsureUserRole:admin');
    // Berita
    Route::resource('berita', BeritaController::class)->middleware('EnsureUserRole:admin');
    // Kegiatan
    Route::resource('kegiatan', KegiatanController::class)->middleware('EnsureUserRole:admin');
    // Pendafatar Alumni
    Route::get('/pendaftar-alumni', [PendaftarController::class, 'index'])->name('pendaftar-alumni')->middleware('EnsureUserRole:admin');
    Route::get('/pendaftar-alumni/{id}', [PendaftarController::class, 'show'])->name('info-alumni')->middleware('EnsureUserRole:admin');

    Route::post('/pendaftar-approve', [PendaftarController::class, 'approval'])->name('pendaftar-approve')->middleware('EnsureUserRole:admin');
    // Tabel Alumni
    Route::resource('table-alumni', TabelAlumniController::class)->middleware('EnsureUserRole:admin');
    // Anggota Munas Validation
    Route::get('/anggota-pendaftar', [PendaftarMunasController::class, 'index'])->name('anggota-pendaftar')->middleware('EnsureUserRole:admin');
    Route::post('/anggota-approve', [PendaftarMunasController::class, 'approval'])->name('anggota-approve')->middleware('EnsureUserRole:admin');
    // Anggota Munas
    Route::resource('anggota-munas', AnggotaMunasController::class)->middleware('EnsureUserRole:admin');
    // Panitia Munas
    Route::resource('panitia-munas', PanitiaController::class)->middleware('EnsureUserRole:admin');
    //Gallery Foto
    Route::resource('gallery-foto', FotoController::class)->middleware('EnsureUserRole:admin');
    // Gallery Video
    Route::resource('gallery-vidio', VidioController::class)->middleware('EnsureUserRole:admin');
    // Iuran
    Route::get('/iuran-konfirmasi', [IuranController::class, 'index'])->name('iuran-konfirmasi')->middleware('EnsureUserRole:admin');
    Route::post('/iuran-approve', [IuranController::class, 'approval'])->name('iuran-approve')->middleware('EnsureUserRole:admin');
    Route::get('/daftar-iuran', [IuranController::class, 'daftar'])->name('daftar-iuran')->middleware('EnsureUserRole:admin');
    Route::delete('/iuran-delete/{id}', [IuranController::class, 'destroy'])->name('iuran-delete')->middleware('EnsureUserRole:admin');


    //User Dashboard
    Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user-dashboard')->middleware('EnsureUserRole:user');
    Route::get('/user-dashboard/pendaftaran-ketua', [UserDashboardController::class, 'pendaftaran'])->name('user-pendaftaran-ketua')->middleware('EnsureUserRole:user');
    Route::get('/user-dashboard/{id}/edit', [UserDashboardController::class, 'edit'])->name('user-dashboard-edit')->middleware('EnsureUserRole:user');
    Route::put('/user-dashboard/{id}', [UserDashboardController::class, 'update'])->name('user-dashboard-update')->middleware('EnsureUserRole:user');
    //Error 403
    Route::get('/403', function () {
        return view('error.error403');
    })->name('error403');

    // Pendaftaran Alumni After Login
    Route::resource('pendaftaran', AlumniController::class);
});

Auth::routes();
