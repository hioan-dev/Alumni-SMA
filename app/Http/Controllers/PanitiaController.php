<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panitia;
use Illuminate\Support\Facades\Storage;

class PanitiaController extends Controller
{
    public function index()
    {
        $panitia = Panitia::all();
        return view('admin.panitia-munas.index', compact('panitia'));
    }
    
    public function create()
    {
        return view('admin.panitia-munas.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $panitia = $request->all();

        $foto = $request->file('foto');
        $originalName = $foto->getClientOriginalName();

        if ($request->hasFile('foto')) {
            $alumni['foto'] = $foto->store('public/panitia-munas');
        } else {
            return $request;
            $panitia->foto = '';
        }

        $panitia = Panitia::create($panitia);

        return redirect()->route('panitia-munas.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $panitia = Panitia::find($id);
        return view('admin.panitia-munas.edit', compact('panitia'));
    }

    public function update(Request $request, $id)
    {
        if (empty($request->file('foto'))) {
            $panitia = Panitia::find($id);
            $panitia->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
            ]);
            return redirect()->route('panitia-munas.index')->with('success', 'Data berhasil diubah');
        } else {
            $panitia = Panitia::find($id);
            Storage::delete('public/panitia-munas' . $panitia->foto);

            $foto = $request->file('foto');
            $originalName = $foto->getClientOriginalName();
            $foto->storeAs('public/panitia-munas', $originalName);

            $panitia->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'foto' => $originalName,
            ]);

            return redirect()->route('panitia-munas.index')->with('success', 'Data berhasil diubah');
        }   
    }

    public function destroy($id)
    {
        $panitia = Panitia::find($id);
        Storage::delete('public/panitia-munas' . $panitia->foto);
        $panitia->delete();

        return redirect()->route('panitia-munas.index')->with('success', 'Berita berhasil dihapus');
    }


}
