<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Models\Iuran;
use App\Models\Foto;

class FrontendController extends Controller
{
    public function index()
    {
        $news = Berita::orderBy('created_at', 'DESC')->limit('3')->get();
        $kegiatan = Kegiatan::orderBy('created_at', 'DESC')->limit('3')->get();

        return view('home', [
            'news' => $news,
            'kegiatan' => $kegiatan
        ]);
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

    public function kegiatan()
    {
        $kegiatan = Kegiatan::paginate(5)->fragment('kegiatan');

        return view('kegiatan', [
            'kegiatan' => $kegiatan,
        ]);
    }

    public function detail_kegiatan($slug)
    {
        $detail = Kegiatan::where('slug', $slug)->first();

        if (!$detail) {
            abort(404);
        }

        return view('detail-kegiatan', [
            'detail' => $detail,
        ]);
    }

    public function detail_berita($slug)
    {
        $detail = Berita::where('slug', $slug)->first();
        $categories = Kategori::all();

        if (!$detail) {
            abort(404);
        }

        return view('detail-berita', [
            'detail' => $detail,
            'categories' => $categories
        ]);
    }

    public function galeri_foto()
    {
        $foto = Foto::all();
        return view('galeri-foto', [
            'foto' => $foto
        ]);
    }

    public function visimisi_sekolah()
    {
        return view('visimisi-sekolah');
    }

    public function sejarah_sekolah()
    {
        return view('sejarah-sekolah');
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
        $iuran = Iuran::where('approved', 1)->get();
        return view('daftar-iuran', [
            'iuran' => $iuran
        ]);
    
    }

    public function pembayaran()
    {
        if (auth()->user()) {
            return view('pembayaran-iuran');
        } else {
            return redirect()->route('login');
        }
    }

    public function storei(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'tanggal_pembayaran' => 'required',
            'nominal' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $originalName = $bukti_pembayaran->getClientOriginalName();

        $pembayaran = $request->all();
        
        if ($request->hasFile('bukti_pembayaran')) {
            $pembayaran['bukti_pembayaran'] = $bukti_pembayaran->store('public/pembayaran');;
        } else {
            return $request;
            $pembayaran->bukti_pembayaran = '';
        }

        $pembayaran = Iuran::create($pembayaran);

        return redirect()->route('pembayaran-iuran')->with('success', 'Pembayaran berhasil dikirim');
    }
}
