<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $news = Berita::orderBy('created_at', 'DESC')->limit('3')->get();
        return view('home', compact('news'));
    }

    public function alumni()
    {
        $alumni = Alumni::where('approved', 1)->get();
        return view('data-alumni', compact('alumni'));
    }

    public function berita()
    {
        $news = Berita::paginate(5)->fragment('news');
        $categories = Kategori::all();
        return view('berita', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    public function iuran()
    {
        return view('daftar-iuran');
    }

    public function pembayaran()
    {
        return view('pembayaran-iuran');
    }
}
