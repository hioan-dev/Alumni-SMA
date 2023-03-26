<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;

class TabelAlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::where('approved', 1)->get();
        return view('admin.table-alumni.table-alumni', compact('alumni'));
    }

    public function create()
    {
        return view('admin.table-alumni.tambah-alumni');
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
            'approved' => 'required',

        ]);

        $alumni = $request->all();
        $foto = $request->file('foto');
        $originalName = $foto->getClientOriginalName();

        if ($request->hasFile('foto')) {
            $foto->storeAs('public/alumni', $originalName);
        } else {
            return $request;
            $alumni->foto = '';
        }

        $alumni = Alumni::create($alumni);
        return redirect()->route('table-alumni.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function show($id)
    {
        $data_alumni = Alumni::find($id);
        return view('admin.table-alumni.info-alumni', [
            'data_alumni' => $data_alumni
        ]);
    }
}
