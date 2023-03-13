<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\Admin\PendaftarController;


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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/data-alumni', function () {
    return view('data-alumni');
})->name('data-alumni');

Route::get('/info-berita', function () {
    return view('berita');
})->name('berita');

Route::get('/iuran', function () {
    return view('daftar-iuran');
})->name('iuran');

Route::get('/pembayaran-iuran', function () {
    return view('pembayaran-iuran');
})->name('pembayaran-iuran');

Route::get('/table-alumni', function () {
    return view('admin.table-alumni.table-alumni');
})->name('table-alumni');

Route::get('/tambah-alumni', function () {
    return view('admin.table-alumni.tambah-alumni');
})->name('tambah-alumni');

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