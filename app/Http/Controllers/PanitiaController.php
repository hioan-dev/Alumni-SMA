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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'angkatan' => 'required',
            'pekerjaan' => 'required',
        ]);

        $panitia = $request->all();

        $foto = $request->file('foto');
        $originalName = $foto->getClientOriginalName();

        if ($request->hasFile('foto')) {
            $panitia['foto'] = $foto->store('public/panitia-munas');
        } else {
            return $request;
            $panitia['foto'] = '';
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
        $oldPanitia = Panitia::find($id);
        $panitia = $request->all();
        $fotoName = $oldPanitia->foto;

        if (request()->hasFile('foto')) {
            $fileCheck = 'required|image|mimes:jpeg,png,jpg,gif,svg';
        } else {
            $fileCheck = 'image|mimes:jpeg,png,jpg,gif,svg';
        }

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => $fileCheck,
            'angkatan' => 'required',
            'pekerjaan' => 'required',
        ]);

        if (request()->hasFile('foto')) {
            if (Storage::exists('public/panitia-munas/' . $oldPanitia->foto)) {
                Storage::delete('public/panitia-munas/' . $oldPanitia->foto);
            }
            $foto = $request->file('foto');
            $fileName = time() . '.' . $foto->getClientOriginalExtension();
            $fotoName = $foto->storeAs('public/panitia-munas', $fileName);
        }

        $panitia['foto'] = $fotoName;

        $oldPanitia->update($panitia);

        return redirect()->route('panitia-munas.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $panitia = Panitia::find($id);
        Storage::delete('public/panitia-munas' . $panitia->foto);
        $panitia->delete();

        return redirect()->route('panitia-munas.index')->with('success', 'Berita berhasil dihapus');
    }
}
