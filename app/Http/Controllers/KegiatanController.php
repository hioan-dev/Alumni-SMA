<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Kegiatan;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kegiatan = Kegiatan::orderBy('created_at', 'DESC')->get();
        return view('admin.Kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Kegiatan.tambah');
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
            'informasi' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $thumbnail = $request->file('thumbnail');
        $thumbnailName = '';

        if ($request->hasFile('thumbnail')) {
            $thumbnailName = $thumbnail->store('public/kegiatan');;
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
                $image_name = "public/kegiatan/" . time() . $item . '.png';
                Storage::put($image_name, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', '/storage/' . $image_name);
            }
        }

        $description = $dom->saveHTML();

        $kegiatan = Kegiatan::create([
            'title' => $request->title,
            'informasi' => $request->informasi,
            'slug' => \Str::slug($request->title),
            'deskripsi' => $description,
            'thumbnail' => $thumbnailName,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('admin.Kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);
        $thumbnailName = $kegiatan->thumbnail;

        if (request()->hasFile('thumbnail')) {
            $fileCheck = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $fileCheck = 'max:2048|mimes:jpeg,png,jpg,gif,svg';
        }

        $request->validate([
            'title' => 'required',
            'informasi' => 'required',
            'description' => 'required',
            'thumbnail' => $fileCheck,
        ]);

        if (request()->hasFile('thumbnail')) {
            if (Storage::exists('public/kegiatan/' . $kegiatan->thumbnail)) {
                Storage::delete('public/kegiatan/' . $kegiatan->thumbnail);
            }
            $thumbnail = $request->file('thumbnail');
            $fileName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailName = $thumbnail->storeAs('public/kegiatan', $fileName);
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
                $image_name = "public/kegiatan/" . time() . $item . '.png';
                Storage::put($image_name, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', '/storage/' . $image_name);
            }
        }

        $description = $dom->saveHTML();


        $kegiatan->update([
            'title' => $request->title,
            'informasi' => $request->informasi,
            'slug' => \Str::slug($request->title),
            'deskripsi' => $description,
            'thumbnail' => $thumbnailName,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        Storage::delete($kegiatan->thumbnail);

        $description = $kegiatan->deskripsi;
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

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }
}
