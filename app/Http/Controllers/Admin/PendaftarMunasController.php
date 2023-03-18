<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnggotaMunas;

class PendaftarMunasController extends Controller
{
    public function index()
    {
        $anggota = AnggotaMunas::where('approved', 0)->get();
        return view('admin.anggota-munas.pendaftar', compact('anggota'));
    }

    public function approval(Request $request)
    {
        $anggota = AnggotaMunas::find($request->id);

        $anggota->approved = 1;
        $anggota->save();
        return back();
    }
}
