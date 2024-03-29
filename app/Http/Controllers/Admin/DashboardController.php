<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Alumni;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $berita = Berita::all();
        $alumni = Alumni::where('approved', '1')->get();
        $user = User::all();
        return view('admin.dashboard',[
            'kategori' => $kategori,
            'berita' => $berita,
            'alumni' => $alumni,
            'user' => $user,
        ]);
    }
}
