<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iuran;

class IuranController extends Controller
{
    public function index()
    {
        $iuran = Iuran::where('approved', 0)->get();
        return view('admin.Iuran.iuran-konfirmasi', compact('iuran'));
    }

    public function approval(Request $request)
    {
        $iuran = iuran::find($request->id);

        $iuran->approved = 1;
        $iuran->save();
        return back();
    }

    public function daftar()
    {
        $iuran = Iuran::where('approved', 1)->get();
        return view('admin.Iuran.index', compact('iuran'));
    }

    public function destroy($id)
    {
        $iuran = Iuran::find($id);
        $iuran->delete();
        return back();
    }
}
