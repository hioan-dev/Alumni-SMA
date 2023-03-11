<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\KategoriBeritaController;


/*
|--------------------------------------------------------------------------
| Web Routes
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


Route::get('/pendaftaran-alumni', function () {
    return view('pendaftaran-alumni');
})->name('pendaftaran-alumni');


Route::get('/table-alumni', function () {
    return view('admin.table-alumni');
})->name('table-alumni');

Route::get('/tambah-alumni', function () {
    return view('admin.table-alumni.tambah-alumni');
})->name('tambah-alumni');

Route::get('/edit-kategori', function () {
    return view('admin.Kategori.edit');
})->name('edit-kategori');



Route::middleware(['auth'])->group(function () {
    //Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard')->middleware('EnsureUserRole:admin');

    // Kategori Berita
    Route::get('/kategori-berita', [KategoriBeritaController::class, 'index'])->name('kategori-berita')->middleware('EnsureUserRole:admin');
    Route::get('/tambah-kategori', [KategoriBeritaController::class, 'create'])->name('tambah-kategori')->middleware('EnsureUserRole:admin');
    Route::post('/kategori-berita', [KategoriBeritaController::class, 'store'])->name('kategori-store')->middleware('EnsureUserRole:admin');
    Route::get('/kategori-berita/{id}/edit', [KategoriBeritaController::class, 'edit'])->name('kategori-edit')->middleware('EnsureUserRole:admin');
    Route::put('/kategori-berita/{id}', [KategoriBeritaController::class, 'update'])->name('kategori-update')->middleware('EnsureUserRole:admin');
    Route::delete('/kategori-berita/{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori-delete')->middleware('EnsureUserRole:admin');

    //User Dashboard
    Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user-dashboard')->middleware('EnsureUserRole:user');
});


Auth::routes();


