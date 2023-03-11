<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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


// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->name('dashboard');

Route::get('/table-alumni', function () {
    return view('admin.table-alumni');
})->name('table-alumni');

Route::get('/tambah-alumni', function () {
    return view('admin.table-alumni.tambah-alumni');
})->name('tambah-alumni');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Auth::routes();


