<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('created_at', 'DESC')->get();
        return view('admin.Kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.Kategori.tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:4' 
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        return redirect()->route('kategori-berita')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.Kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:4' 
        ]);

        $kategori = Kategori::find($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        return redirect()->route('kategori-berita')->with('success', 'Kategori Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->route('kategori-berita')->with('success', 'Kategori Berhasil Dihapus');
    }


}
