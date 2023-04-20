<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonKetua;
use Illuminate\Support\Facades\Storage;

class CalonKetuaController extends Controller
{
    public function index()
    {
        $calon_ketua = CalonKetua::all();
        return view('admin.calon-ketua.index', [
            'calon_ketua' => $calon_ketua
        ]);
    }

    public function approval(Request $request)
    {
        $calon_ketua = CalonKetua::find($request->id);

        $calon_ketua->approved = 1;
        $calon_ketua->save();
        return redirect()->route('calon-ketua.index');
    }

    public function show($id)
    {
        $calon_ketua = CalonKetua::find($id);
        return view('admin.calon-ketua.lihat', [
            'calon_ketua' => $calon_ketua
        ]);
    }

    public function edit($id)
    {
        $calon_ketua = CalonKetua::find($id);
        return view('admin.calon-ketua.edit', [
            'calon_ketua' => $calon_ketua
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'foto_ktp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'pas_foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'nik' => 'required',
            'alamat' => 'required',
            'no_ijazah' => 'required',
            'ijazah' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'pekerjaan' => 'required',
            'visi_misi' => 'required',
            'rencana_program' => 'required',
        ]);

        $foto_ktp = $request->file('foto_ktp');
        $pas_foto = $request->file('pas_foto');
        $ijazah = $request->file('ijazah');
        $ketua = CalonKetua::find($id);
        $calon_ketua = $request->all();

        if ($request->hasFile('foto_ktp')) {
            Storage::delete($ketua->foto_ktp);
            $calon_ketua['foto_ktp'] = $foto_ktp->store('public/foto_ktp');
        }

        if ($request->hasFile('pas_foto')) {
            Storage::delete($ketua->pas_foto);
            $calon_ketua['pas_foto'] = $pas_foto->store('public/pas_foto');
        }

        if ($request->hasFile('ijazah')) {
            Storage::delete($ketua->ijazah);
            $calon_ketua['ijazah'] = $ijazah->store('public/ijazah');
        }

        $ketua->update($calon_ketua);
        return redirect()->route('calon-ketua.index');
    }

    public function destroy($id)
    {
        $calon_ketua = CalonKetua::find($id);
        Storage::delete($calon_ketua->foto_ktp);
        Storage::delete($calon_ketua->pas_foto);
        Storage::delete($calon_ketua->ijazah);

        $calon_ketua->delete();
        return redirect()->route('calon-ketua.index');
    }
}
