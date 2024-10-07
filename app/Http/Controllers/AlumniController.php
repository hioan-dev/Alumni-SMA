<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::where('user_id', Auth::user()->id)->first();
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
            'provinsi' => 'required',
            'kota' => 'required',
            'jenkel' => 'required',
            'ukuran_baju' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'pekerjaan' => 'required',
        ]);
        $pendidikan = $request->pendidikan;
        $universitas = $request->universitas;
        $jurusan = $request->jurusan;

        $data_pendidikan = [];
        foreach ($pendidikan as $i => $data) {
            if ($universitas[$i] && $jurusan[$i]) {
                array_push($data_pendidikan, [
                    'pendidikan' => $data,
                    'universitas' => $universitas[$i],
                    'jurusan' => $jurusan[$i],
                ]);
            }
        }

        $alumni = $request->all();
        $alumni['pendidikan'] = json_encode($data_pendidikan);

        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            $alumni['foto'] = $foto->store('public/alumni');
        } else {
            return $request;
            $alumni['foto'] = '';
        }

        $alumni['user_id'] = Auth::id();
        unset($alumni['universitas']);
        unset($alumni['jurusan']);

        Alumni::create($alumni);

        return redirect()->route('pendaftaran-alumni.index')->with('success', 'Berita berhasil ditambahkan');
    }
}