<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;

class FrontendController extends Controller
{
    public function index()
    {
        $news = Berita::orderBy('created_at', 'DESC')->limit('3')->get();
        return view('home', compact('news'));
    }

    public function alumni(Request $request)
    {
        $keyword = $request->get('search');

        if ($keyword) {
            $alumni = Alumni::where('approved', 1)->where(function ($query) use ($keyword) {
                $query->where('tahun_lulus', 'LIKE', "%$keyword%")->orWhere('nama_lengkap', 'LIKE', "%$keyword%")->orWhere('kelas', 'LIKE', "%$keyword%");
            })->paginate(10);
        } else {
            $alumni = Alumni::where('approved', 1)->paginate(10);
        }

        return view('data-alumni', [
            'alumni' => $alumni,
            'keyword' => $keyword
        ]);
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
