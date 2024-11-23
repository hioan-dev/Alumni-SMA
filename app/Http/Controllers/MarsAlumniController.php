<?php

namespace App\Http\Controllers;

use App\Models\Lyric;

class MarsAlumniController extends Controller
{
    public function index()
    {
        $data = Lyric::first();
        return view('mars', compact('data'));
    }
}
