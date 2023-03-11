<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.dashboard',[
            'kategori' => $kategori
        ]);
    }
}
