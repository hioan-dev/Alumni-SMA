<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaMunas;
use Illuminate\Support\Facades\Storage;

class AnggotaMunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $anggota = AnggotaMunas::where('approved', '1')->get();
        return view('admin.anggota-munas.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota = AnggotaMunas::all();
        return view('admin.anggota-munas.tambah', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $anggota = $request->all();

        $foto = $request->file('foto');
        $originalName = $foto->getClientOriginalName();

        if ($request->hasFile('foto')) {
            $anggota['foto'] = $foto->store('public/anggota-munas');
        } else {
            return $request;
            $anggota->foto = '';
        }

        $anggota = AnggotaMunas::create($anggota);

        return redirect()->route('anggota-munas.index')->with('success', 'Berita berhasil ditambahkan');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = AnggotaMunas::find($id);
        return view('admin.anggota-munas.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('foto'))) {
            $anggota = AnggotaMunas::find($id);
            $anggota->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
            ]);
            return redirect()->route('anggota-munas.index')->with('success', 'Data berhasil diubah');
        } else {
            $anggota = AnggotaMunas::find($id);
            Storage::delete('public/anggota-munas' . $anggota->foto);

            $foto = $request->file('foto');
            $originalName = $foto->getClientOriginalName();
            $foto->storeAs('public/anggota-munas', $originalName);

            $anggota->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'foto' => $originalName,
            ]);

            return redirect()->route('anggota-munas.index')->with('success', 'Data berhasil diubah');
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = AnggotaMunas::find($id);
        Storage::delete('public/anggota-munas' . $anggota->foto);
        $anggota->delete();

        return redirect()->route('anggota-munas.index')->with('success', 'Berita berhasil dihapus');
    }
}
