<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $berita = Berita::all();
        $alumni = Alumni::where('approved', '1')->get();
        $user = User::all();

        // Group alumni by graduation year and count each group
        $alumniByYear = Alumni::selectRaw('tahun_lulus, COUNT(*) as jumlah')
            ->groupBy('tahun_lulus')
            ->pluck('jumlah', 'tahun_lulus');
        $alumniByCity = Alumni::selectRaw('kota, COUNT(*) as total')
            ->groupBy('kota')
            ->pluck('total', 'kota');

        return view('admin.dashboard', [
            'kategori' => $kategori,
            'berita' => $berita,
            'alumni' => $alumni,
            'user' => $user,
            'alumniByYear' => $alumniByYear,
            'alumniByCity' => $alumniByCity,
        ]);
    }

}