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
use App\Models\CalonKetua;

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

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pas_foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nik' => 'required',
            'alamat' => 'required',
            'no_ijazah' => 'required',
            'ijazah' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pekerjaan' => 'required',
            'visi_misi' => 'required',
            'rencana_program' => 'required',
        ]);

        $foto_ktp = $request->file('foto_ktp');
        $originalName = $foto_ktp->getClientOriginalName();

        $pas_foto = $request->file('pas_foto');
        $originalName = $pas_foto->getClientOriginalName();

        $ijazah = $request->file('ijazah');
        $originalName = $ijazah->getClientOriginalName();

        $calon_ketua = $request->all();

        if ($request->hasFile('foto_ktp')) {
            $calon_ketua['foto_ktp'] = $foto_ktp->store('public/foto_ktp');
        } else {
            return $request;
            $calon_ketua->foto_ktp = '';
        }

        if ($request->hasFile('pas_foto')) {
            $calon_ketua['pas_foto'] = $pas_foto->store('public/pas_foto');
        } else {
            return $request;
            $calon_ketua->pas_foto = '';
        }

        if ($request->hasFile('ijazah')) {
            $calon_ketua['ijazah'] = $ijazah->store('public/ijazah');
        } else {
            return $request;
            $calon_ketua->ijazah = '';
        }

        $calon_ketua = CalonKetua::create($calon_ketua);

        return redirect()->route('pendaftaran-ketua')->with('success', 'Data berhasil dikirim');
    }
}
