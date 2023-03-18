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
Route::get('/info-berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/info-berita/{slug}', [FrontendController::class, 'detail_berita'])->name('detail-berita');
Route::get('/kategori/{slug}', [FrontendController::class, 'category'])->name('kategori-berita');
Route::get('/iuran', [FrontendController::class, 'iuran'])->name('iuran');
Route::get('/pembayaran-iuran', [FrontendController::class, 'pembayaran'])->name('pembayaran-iuran');
Route::get('/tentang-sekolah/visi-misi', [FrontendController::class, 'visimisi_sekolah'])->name('visimisi-sekolah');
Route::get('/tentang-sekolah/sejarah', [FrontendController::class, 'sejarah_sekolah'])->name('sejarah-sekolah');
Route::get('/galeri-foto', [FrontendController::class, 'galeri_foto'])->name('galeri-foto');
Route::view('tentang-alumni/anggaran-rumah-tangga', 'art-alumni')->name('anggaran-rumah-tangga');



// Pendaftaran Alumni Before Login
Route::get('/pendaftaran-alumni', function () {
    return view('pendaftaran-alumni');
})->name('pendaftaran-alumni');

Route::middleware(['auth'])->group(function () {
    //Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard')->middleware('EnsureUserRole:admin');

    // Kategori Berita
    Route::resource('kategori-berita', KategoriBeritaController::class)->middleware('EnsureUserRole:admin');
    // Berita
    Route::resource('berita', BeritaController::class)->middleware('EnsureUserRole:admin');
    // Pendafatar Alumni
    Route::get('/pendaftar-alumni', [PendaftarController::class, 'index'])->name('pendaftar-alumni')->middleware('EnsureUserRole:admin');
    Route::post('/pendaftar-approve', [PendaftarController::class, 'approval'])->name('pendaftar-approve')->middleware('EnsureUserRole:admin');
    // Tabel Alumni
    Route::resource('table-alumni', TabelAlumniController::class)->middleware('EnsureUserRole:admin');
    // Anggota Munas Validation
    Route::get('/anggota-pendaftar', [PendaftarMunasController::class, 'index'])->name('anggota-pendaftar')->middleware('EnsureUserRole:admin');
    Route::post('/anggota-approve', [PendaftarMunasController::class, 'approval'])->name('anggota-approve')->middleware('EnsureUserRole:admin');
    // Anggota Munas
    Route::resource('anggota-munas', AnggotaMunasController::class)->middleware('EnsureUserRole:admin');

    //User Dashboard
    Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user-dashboard')->middleware('EnsureUserRole:user');

    //Error 403
    Route::get('/403', function () {
        return view('error.error403');
    })->name('error403');

    // Pendaftaran Alumni After Login
    Route::resource('pendaftaran', AlumniController::class);
});

Auth::routes();
