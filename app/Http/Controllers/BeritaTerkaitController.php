<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaTerkait;
use Illuminate\Support\Facades\Storage;

class BeritaTerkaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = BeritaTerkait::orderBy('created_at', 'DESC')->get();
        return view('admin.berita-terkait.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita-terkait.tambah');
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
            'url' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = $request->file('banner');
        $originalName = $banner->getClientOriginalName();

        $berita = $request->all();

        $berita['slug'] = \Str::slug($request->title);

        if ($request->hasFile('banner')) {
            $berita['banner'] = $banner->store('public/berita-terkait');;
        } else {
            $berita->banner = '';
        }

        $berita = BeritaTerkait::create($berita);

        return redirect()->route('berita-terkait.index')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeritaTerkait  $beritaTerkait
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaTerkait $beritaTerkait)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeritaTerkait  $beritaTerkait
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = BeritaTerkait::find($id);
        return view('admin.berita-terkait.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeritaTerkait  $beritaTerkait
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = BeritaTerkait::find($id);
        $bannerName = $berita->banner;

        if (request()->hasFile('banner')) {
            $fileCheck = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $fileCheck = 'max:2048|image|mimes:jpeg,png,jpg,gif,svg';
        }

        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'banner' => $fileCheck,
        ]);

        if (request()->hasFile('banner')) {
            if (Storage::exists('public/berita-terkait/' . $berita->banner)) {
                Storage::delete('public/berita-terkait/' . $berita->banner);
            }
            $banner = $request->file('banner');
            $fileName = time() . '.' . $banner->getClientOriginalExtension();
            $bannerName = $banner->storeAs('public/berita', $fileName);
        }


        $berita->update([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'url' => $request->url,
            'banner' => $bannerName,
        ]);

        return redirect()->route('berita-terkait.index')->with('success', 'Berita berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeritaTerkait  $beritaTerkait
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = BeritaTerkait::find($id);
        Storage::delete($berita->banner);

        $berita->delete();
        return redirect()->route('berita-terkait.index')->with('success', 'Berita berhasil dihapus');
    }
}
