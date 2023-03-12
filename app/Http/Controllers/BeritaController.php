<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Kategori;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'DESC')->get();
        return view('admin.Berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.Berita.tambah', compact('kategori'));
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
            'title' => 'required',
            'author' => 'required',
            'kategori_id' => 'required',
            'description' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = $request->file('banner');
        $originalName = $banner->getClientOriginalName();

        $berita = $request->all();
        $berita['slug']= \Str::slug($request->title);
        $berita['user_id'] = \Auth::user()->id;
        $berita['is_active'] = $request->has('is_active') ? 1 : 0;
        $berita['banner'] = $originalName;

        if ($request->hasFile('banner')) {
            $banner->storeAs('public/berita', $originalName);
        } else {
            return $request;
            $berita->banner = '';
        }

        $berita = Berita::create($berita);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        $kategori = Kategori::all();
        return view('admin.Berita.edit', compact('berita', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('banner'))) {
            $berita = Berita::find($id);
            $berita->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'author' => $request->author,
                'kategori_id' => $request->kategori_id,
                'description' => $request->description,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'user_id' => \Auth::user()->id,
            ]);

            return redirect()->route('berita.index')->with('success', 'Berita berhasil diubah');

        } else {
            $berita = Berita::find($id);
            Storage::delete('public/berita' . $berita->banner);
            
            $banner = $request->file('banner');
            $originalName = $banner->getClientOriginalName();
            $banner->storeAs('public/berita', $originalName);

            $berita->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'author' => $request->author,
                'kategori_id' => $request->kategori_id,
                'description' => $request->description,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'user_id' => \Auth::user()->id,
                'banner' => $originalName,
            ]);

            return redirect()->route('berita.index')->with('success', 'Berita berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        Storage::delete('public/berita' . $berita->banner);
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
