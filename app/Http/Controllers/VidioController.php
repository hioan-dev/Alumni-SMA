<?php

namespace App\Http\Controllers;

use App\Models\Vidio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VidioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vidio = Vidio::all();
        return view('admin.gallery.vidio.index', compact('vidio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.vidio.tambah');
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
            'image' => 'required',
        ]);

        $vidio = $request->all();
        $vidio['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $vidio['image'] = $request->file('image')->store('public/vidio');
        } else {
            $vidio['image'] = '';
        } 

        Vidio::create($vidio);
        return redirect()->route('gallery-vidio.index')->with('success', 'Vidio berhasil ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vidio  $vidio
     * @return \Illuminate\Http\Response
     */
    public function show(Vidio $vidio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vidio  $vidio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vidio = Vidio::find($id);
        return view('admin.gallery.vidio.edit', compact('vidio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vidio  $vidio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(empty($request->file('image'))){
            $vidio = Vidio::find($id);
            $vidio->update([
                'title' => $request->title,
                'url' => $request->url,
                'slug' => Str::slug($request->title),
            ]);

            return redirect()->route('gallery-vidio.index')->with('success', 'Vidio berhasil diubah');
        } else {
            $vidio = Vidio::find($id);
            $vidio->update([
                'title' => $request->title,
                'url' => $request->url,
                'slug' => Str::slug($request->title),
                'image' => $request->file('image')->store('public/vidio'),
            ]);

            return redirect()->route('gallery-vidio.index')->with('success', 'Vidio berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vidio  $vidio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vidio = Vidio::find($id);
        Storage::delete($vidio->image);
        $vidio->delete();

        return redirect()->route('gallery-vidio.index')->with('success', 'Vidio berhasil dihapus');
    }
}
