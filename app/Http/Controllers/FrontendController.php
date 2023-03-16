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
        $alumni = Alumni::where('approved', 1)->paginate(10);
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

    public function detail_berita($slug)
    {
        $detail = Berita::where('slug', $slug)->first();
        $categories = Kategori::all();


        return view('detail-berita', [
            'detail' => $detail,
            'categories' => $categories
        ]);
    }

    public function category($categoryName)
    {
        $category = Kategori::where('slug', $categoryName)->first();
        $categories = Kategori::all();

        if (!$category) {
            abort(404);
        }

        $newsByCategory = Berita::where('kategori_id', $category->id)->paginate(6);

        return view('kategori-berita', [
            'news' => $newsByCategory,
            'categories' => $categories,
            'category' => $category
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
