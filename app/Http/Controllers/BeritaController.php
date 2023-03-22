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
        $berita['slug'] = \Str::slug($request->title);
        $berita['user_id'] = \Auth::user()->id;
        $berita['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('banner')) {
            $berita['banner'] = $banner->store('public/berita');;
        } else {
            return $request;
            $berita->banner = '';
        }

        $description = $request->description;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');

            if (preg_match('/data:image/', $data)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $data, $groups);

                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name = "public/berita/" . time() . $item . '.png';
                Storage::put($image_name, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', '/storage/' . $image_name);
            }
        }

        $description = $dom->saveHTML();

        $berita['description'] = $description;
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
        $berita = Berita::find($id);
        $bannerName = $berita->banner;

        if (request()->hasFile('banner')) {
            $fileCheck = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $fileCheck = 'max:2048|image|mimes:jpeg,png,jpg,gif,svg';
        }
        
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'banner' => $fileCheck,
        ]);

        if (request()->hasFile('banner')) {
            if (Storage::exists('public/berita/' . $berita->banner)) {
                Storage::delete('public/berita/' . $berita->banner);
            }
            $banner = $request->file('banner');
            $fileName = time() . '.' . $banner->getClientOriginalExtension();
            $bannerName = $banner->storeAs('public/berita', $fileName);
        }

        $description = $request->description;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');

            if (preg_match('/data:image/', $data)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $data, $groups);

                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name = "public/berita/" . time() . $item . '.png';
                Storage::put($image_name, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', '/storage/' . $image_name);
            }
        }

        $description = $dom->saveHTML();

        $berita->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'author' => $request->author,
            'kategori_id' => $request->kategori_id,
            'description' => $description,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'user_id' => \Auth::user()->id,
            'banner' => $bannerName,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diubah');
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
        Storage::delete($berita->banner);

        $description = $berita->description;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            //delete image
            $path =  explode('/', $data);
            $fileName = join('/', array_slice($path, 2));

            Storage::delete($fileName);
        }

        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
