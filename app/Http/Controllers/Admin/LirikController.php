<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lyric;
use Illuminate\Http\Request;

class LirikController extends Controller
{
    public function index()
    {
        $data = Lyric::first();
        return view('admin.mars.index', compact('data'));
    }

    public function create()
    {
        return view('admin.mars.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'lirik' => 'required',
        ]);
        $data = Lyric::create($request->all());
        $data->save();
        return redirect()->route('mars.index')->with('success', 'Mars Berhasil Dibuat');
    }

    public function edit($id)
    {
        $data = Lyric::findOrFail($id);
        return view('admin.mars.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Lyric::findOrFail($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('mars.index')->with('success', 'Mars Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = Lyric::findOrFail($id);
        $data->delete();
        return redirect()->route('mars.index')->with('success', 'Mars Berhasil Dihapus');
    }
}
