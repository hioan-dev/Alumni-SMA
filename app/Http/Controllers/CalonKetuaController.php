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
        return view('admin.calon-ketua.index',[
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
        return view('admin.calon-ketua.lihat',[
            'calon_ketua' => $calon_ketua
        ]);
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
