<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $foto = Foto::all();
        return view('admin.gallery.foto.index', compact('foto'));
    }

    public function create()
    {
        return view('admin.gallery.foto.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
        ]);

        $foto = $request->all();

        if ($request->hasFile('foto')) {
            $foto['foto'] = $request->file('foto')->store('public/foto');
        } else {
            $foto['foto'] = '';
        }

        Foto::create($foto);
        return redirect()->route('gallery-foto.index')->with('success', 'Foto berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $foto = Foto::find($id);
        return view('admin.gallery.foto.edit', compact('foto'));
    }

    public function update(Request $request, $id)
    {
        if(empty($request->file('foto'))){
            $foto = Foto::find($id);
            $foto->update([
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->route('gallery-foto.index')->with('success', 'Foto berhasil diubah');

        }else{
            $foto = Foto::find($id);
            Storage::delete('public/foto' . $foto->foto);

            $foto = $request->file('foto');
            $originalName = $foto->getClientOriginalName();
            $foto->storeAs('public/foto', $originalName);

            $foto->update([
                'deskripsi' => $request->deskripsi,
            ]);
            return redirect()->route('gallery-foto.index')->with('success', 'Foto berhasil diubah');
        }

    }

    public function destroy($id)
    {
        $foto = Foto::find($id);
        Storage::delete('public/foto' . $foto->foto);
        $foto->delete();
        return redirect()->route('gallery-foto.index')->with('success', 'Foto berhasil dihapus');
    }
}
