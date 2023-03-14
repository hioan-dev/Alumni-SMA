<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::all();
        if (Auth::check()) {
            return view('pendaftaran-alumni', compact('alumni'));
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required',
            'tahun_lulus' => 'required',
            'kelas' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'teman_sebangku' => 'required',
            'alamat' => 'required',
            'jenkel' => 'required',
            'ukuran_baju' => 'required',
            'pendidikan_terakhir' => 'required',
            'universitas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'pekerjaan' => 'required',
        ]);

        $alumni = $request->all();

        $foto = $request->file('foto');
        $originalName = $foto->getClientOriginalName();

        if ($request->hasFile('foto')) {
            $alumni['foto'] = $foto->store('public/alumni');
        } else {
            return $request;
            $alumni->foto = '';
        }

        $alumni = Alumni::create($alumni);

        return redirect()->route('pendaftaran.index')->with('success', 'Berita berhasil ditambahkan');
    }
}
