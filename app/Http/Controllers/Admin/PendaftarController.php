<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;

class PendaftarController extends Controller
{
    public function index()
    {
        $alumni = Alumni::where('approved', 0)->get();
        return view('admin.pendaftar-alumni.index', compact('alumni'));
    }

    public function approval(Request $request)
    {
        $alumni = Alumni::find($request->id);

        if ($request->approved == "1") {
            $alumni->approved = 1;
            $alumni->save();
        } else {
            $alumni->delete();
        }

        return back();
    }

    public function show($id)
    {
        $data_alumni = Alumni::find($id);
        return view('admin.table-alumni.info-alumni', [
            'data_alumni' => $data_alumni
        ]);
    }
}
