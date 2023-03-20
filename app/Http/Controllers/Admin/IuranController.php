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
        return view('admin.iuran.iuran-konfirmasi', compact('iuran'));
    } 

    public function approval(Request $request)
    {
        $iuran = iuran::find($request->id);

        $iuran->approved = 1;
        $iuran->save();
        return back();
    }
}
