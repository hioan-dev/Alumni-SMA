<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Iuran;
use App\Models\Vidio;
use App\Models\Alumni;
use App\Models\Berita;
use App\Models\BeritaTerkait;
use App\Models\Kategori;
use App\Models\Kegiatan;
use App\Models\CalonKetua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $news = Berita::orderBy('created_at', 'DESC')->limit('3')->get();
        $berita_terkait = BeritaTerkait::orderBy('created_at', 'DESC')->limit('3')->get();
        $kegiatan = Kegiatan::orderBy('created_at', 'DESC')->limit('3')->get();

        return view('home', [
            'news' => $news,
            'kegiatan' => $kegiatan,
            'berita_terkait' => $berita_terkait
        ]);
    }

    public function alumni(Request $request)
    {
        $keyword = $request->get('search');

        if ($keyword) {
            $alumni = Alumni::where('approved', 1)->where(function ($query) use ($keyword) {
                $query->where('tahun_lulus', 'LIKE', "%$keyword%")->orWhere('nama_lengkap', 'LIKE', "%$keyword%")->orWhere('kelas', 'LIKE', "%$keyword%");
            })->orderBy('tahun_lulus', 'asc')->paginate(12)->withQueryString();
        } else {
            $alumni = Alumni::where('approved', 1)->orderBy('tahun_lulus', 'asc')->paginate(12)->withQueryString();
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

    public function beritaTerkait()
    {
        $news = BeritaTerkait::paginate(5)->fragment('news');
        $categories = Kategori::all();

        return view('berita-terkait', [
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
        $berita_terkait = BeritaTerkait::orderBy('created_at', 'DESC')->limit('5')->get();
        $categories = Kategori::all();

        if (!$detail) {
            abort(404);
        }

        return view('detail-berita', [
            'detail' => $detail,
            'categories' => $categories,
            'berita_terkait' => $berita_terkait
        ]);
    }

    public function galeri_foto()
    {
        $foto = Foto::all();
        return view('galeri-foto', [
            'foto' => $foto
        ]);
    }

    public function galeri_video()
    {
        $vidio = Vidio::all();
        return view('galeri-video', [
            'vidio' => $vidio
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
            'no_rekening' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $originalName = $bukti_pembayaran->getClientOriginalName();

        $pembayaran = $request->all();

        if ($request->hasFile('bukti_pembayaran')) {
            $pembayaran['bukti_pembayaran'] = $bukti_pembayaran->store('public/pembayaran');;
        } else {
            return $request;
            $pembayaran['bukti_pembayaran'] = '';
        }

        $pembayaran['user_id'] = Auth::id();
        $pembayaran = Iuran::create($pembayaran);

        return redirect()->route('pembayaran-iuran')->with('success', 'Pembayaran berhasil dikirim');
    }

    public function pendaftaran_ketua()
    {
        if (auth()->user()) {
            $ketua = CalonKetua::where('user_id', Auth::id())->first();
            $alumni = Alumni::where('user_id', Auth::id())->where('approved', '1')->first();

            return view('pendaftaran-ketua', [
                'ketua' => $ketua,
                'alumni' => $alumni
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function calonKetua()
    {
        $ketua = DB::table('calon_ketuas')
            ->join('alumnis', 'calon_ketuas.user_id', '=', 'alumnis.user_id')
            ->select('calon_ketuas.*', 'alumnis.kelas', 'alumnis.tahun_lulus', 'alumnis.pekerjaan')
            ->distinct()
            ->get()->filter(function ($ketua) {
                return $ketua->approved == 1;
            });

        return view('data-calon-ketua', [
            'ketua' => $ketua
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'pas_foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'nik' => 'required',
            'alamat' => 'required',
            'no_ijazah' => 'required',
            'ijazah' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
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
            $calon_ketua['foto_ktp'] = '';
        }

        if ($request->hasFile('pas_foto')) {
            $calon_ketua['pas_foto'] = $pas_foto->store('public/pas_foto');
        } else {
            return $request;
            $calon_ketua['pas_foto'] = '';
        }

        if ($request->hasFile('ijazah')) {
            $calon_ketua['ijazah'] = $ijazah->store('public/ijazah');
        } else {
            return $request;
            $calon_ketua['ijazah'] = '';
        }

        $calon_ketua['user_id'] = Auth::id();
        $calon_ketua = CalonKetua::create($calon_ketua);

        return redirect()->route('pendaftaran-ketua')->with('success', 'Data berhasil dikirim');
    }
}
