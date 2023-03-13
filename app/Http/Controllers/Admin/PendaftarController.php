<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;

class PendaftarController extends Controller
{
    public function index()
    {
        $alumni = Alumni::all();
        return view('admin.pendaftar-alumni.index', compact('alumni'));
    }

    public function approval(Request $request)
    {
        $alumni = Alumni::find($request->alumniId);
        $approVal = $request->approved;
        if ($approVal == 'on') {
            $approVal = 1;
        } else {
            $approVal = 0;
        }

        $alumni->approved = $approVal;
        $alumni->save();
        return back();
    }
}
